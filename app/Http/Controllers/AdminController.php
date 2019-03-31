<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Hash;
use Mail;
use Excel;
use DateTime;

use App\User;
use App\Category;
use App\Product;
use App\Kieuday;
use App\Order;
use App\Order_Status;
use App\Charm;
use App\Payment_Method;
use App\Estimated_Delivery;
use App\City;
use App\Size_Vong;
use App\Size_Hat;
use App\Piece;
use App\Topic;
use App\Blog;

class AdminController extends Controller
{
 	  public function loginView()
    {
    	if(!Auth::check()){
		      return view('admin.login');
      } else {
			     return redirect('admin/order');
		  }
    }

    public function login(Request $request)
    {
    		$this->validate($request,['Email'=>'required', 'Password'=>'required', 'OTPCode'=>'required'],[
    			'Email.required'=>'Bạn chưa nhập email',
    			'Password.required'=>'Bạn chưa nhập mật khẩu',
          'OTPCode.required'=>'Bạn chưa nhập mã xác thực',
    		]);

        	$user = User::where('email',$request->Email)->first();
          if($user !== null && $user->otp === $request->OTPCode){
            if(Auth::attempt(['email'=>$request->Email,'password'=>$request->Password]))
            {
                $user->otp = null;
                $user->is_get_otp = true;
                $user->save();
                return response()->json(['IsSuccess'=>true]);
            }
          }
    		else
    		{
    	    return response()->json(['IsSuccess'=>false]);
    		}
    }

    public function getotp(Request $request)
    {
        $this->validate($request,['Email'=>'required'],[
          'Email.required'=>'Bạn chưa nhập email'
        ]);

      	$CustomerEmail = $request->Email;

      	$user = User::where('email',$CustomerEmail)->first();

        if($user !== null){
             $user->otp = str_random(6);
             $user->save();
             $contentEmail = [ 'toEmail'=>$CustomerEmail, 'user'=>$user ];

             Mail::send('page2.layout.template.otp_info', ['contentEmail' => $contentEmail], function($message) use ($CustomerEmail){
                $message->to($CustomerEmail, 'Customer')->subject('Thông tin mã xác thực');
        });
        return response()->json(['IsSuccess'=>true]);
      }
    }

    public function logout()
    {
      Auth::user()->is_get_otp = false;
      Auth::user()->save();
  		Auth::logout();
  		return redirect('admin/login');
    }

 	  public function getAllCategories()
    {
  		$result = Category::where('is_deleted',0)->get();
  		return view('admin.category.index',['categories'=>$result]);
    }

    public function createCategoryView()
    {
        return view('admin.category.create');
    }

    public function createCategory(Request $request)
    {
        $this->validate($request, ['name'=>'required|max:100'],[
                                  'name.required'=>'Bạn chưa nhập tên danh mục',
                                  'name.max'=>'Tên danh mục phải ít hơn 100 ký tự',
                              ]);

        $model = $request;
        $category =  new Category;
        $category->name = $model->name;
        $category->alias = $this->changeTitle($model->name);
        $category->is_active = $model->is_active;
        $category->is_custom = $model->is_custom;

        $category->sizevongs = $model->sizevongs;
        $category->image = $model->image;

        $category->size_hat_name = $model->size_hat_name;
        $category->sizevong_name = $model->sizevong_name;
        $category->kieuday_name = $model->kieuday_name;

        $category->save();

        if($model->sizehats){
            foreach($model->sizehats as $key => $item)
            {
                $obj = new Size_Hat;
                $obj->name = $item['name'];
                $obj->value = $item['value'];
                $obj->category_id = $category->id;
                $obj->save();
              }
          }

          if($model->kieudays){
              foreach($model->kieudays as $key => $item)
              {
                  $obj = new Kieuday;
                  $obj->name = $item['name'];
                  $obj->value = $item['value'];
                  $obj->category_id = $category->id;
                  $obj->save();
                }
            }

         return response()->json(['IsSuccess' => true]);
    }

    public function editCategoryView($Id)
    {
        $category = Category::find($Id);
        $category->sizeHats = Size_Hat::where('category_id', $Id)->get();
        $category->kieudays = Kieuday::where('category_id', $Id)->get();

        return view('admin.category.edit',['category'=>$category]);
    }

 	  public function editCategory(Request $request)
    {
    	 $this->validate($request, ['name'=>'required|max:100'],[
                          			'name.required'=>'Bạn chưa nhập tên danh mục',
                          			'name.max'=>'Tên danh mục phải ít hơn 100 ký tự',
                                ]);

        $model = $request;
		    $category = Category::find($model->id);

		    $category->name = $model->name;
        $category->alias = $this->changeTitle($model->name);
	      $category->is_active = $model->is_active;
        $category->is_custom = $model->is_custom;

        $category->sizevongs = $model->sizevongs;

        $category->size_hat_name = $model->size_hat_name;
        $category->sizevong_name = $model->sizevong_name;
        $category->kieuday_name = $model->kieuday_name;

        $Size_Hats =   Size_Hat::where('category_id',$model->id)->get();
        foreach($Size_Hats as $item)
        {
          $item->delete();
        }

        $Kieudays =   Kieuday::where('category_id',$model->id)->get();
        foreach($Kieudays as $item)
        {
          $item->delete();
        }


        if($model->sizehats){
            foreach($model->sizehats as $key => $item)
            {
              	$obj = new Size_Hat;
				        $obj->name = $item['name'];
                $obj->value = $item['value'];
		            $obj->category_id = $model->id;
				        $obj->save();
              }
          }

          if($model->kieudays){
              foreach($model->kieudays as $key => $item)
              {
                  $obj = new Kieuday;
                  $obj->name = $item['name'];
                  $obj->value = $item['value'];
                  $obj->category_id = $model->id;
                  $obj->save();
                }
            }

    		$category->save();
    		return response()->json(['IsSuccess' => true]);
		// return redirect('admin/category/edit/'.$Id)->with('message','Sửa thành công');
    }


     public function getAllProducts()
    {
        $Products = Product::with('category')->where('is_deleted',0)->get();
        $Categories = Category::where('is_deleted',0)->get();

        return view('admin.product.index',['Products'=>$Products, 'Categories'=>$Categories ]);
    }

    public function searchProduct(Request $request)
    {
        $result = Product::with('category')->where('is_deleted',0);
        if($request->sKeyword){
            $result = $result->where('name','like','%'.$request->sKeyword.'%')->orwhere('alias','like','%'.$request->sKeyword.'%');
        }

        if($request->sCategoryId){
            $result = $result->where('category_id',$request->sCategoryId);
        }
        if($request->sIsActive != null){
            $result = $result->where('is_active',$request->sIsActive);
        }

        $result = $result->orderBy('created_at', 'desc')->get();

        return response()->json(['result' => $result]);
    }

     public function editProductView($Id)
    {
        $Product = Product::find($Id);
        $Categories = Category::where('is_deleted',0)->get();
        $Pieces = Piece::where('is_deleted',0)->get();

        return view('admin.product.edit',['Product'=>$Product,'Categories'=>$Categories, 'Pieces'=>$Pieces]);
    }

    public function editProduct(Request $request)
    {
      try {
        $this->validate($request,[
                                    'name'=>'required|max:100',
                                    'price'=>'required|numeric|min:1000',
                                    'category_id'=>'required',
                                    'piece_id'=>'required',
                                    'description'=>'max:1990'
                                ],
            [
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                'name.max'=>'Tên sản phẩm phải ít hơn 100 ký tự',
                'price.required'=>'Bạn chưa nhập giá sản phẩm',
                'price.min'=>'Giá sản phẩm phải lớn hơn 1000 (một ngàn)',
                'category_id.required'=>'Bạn chưa chọn danh mục',
                'piece_id.required'=>'Bạn chưa chọn hạt',
                'description.max'=>'Mô tả phải ít hơn 1990 ký tự'
            ]);

        $model = Product::find($request->id);
        $model->name = $request->name;
        $model->alias = $this->changeTitle($request->name);
        $model->price = $request->price;
        $model->tags = $request->tags;
        $model->description = $request->description;
        $model->meta_description=$request->meta_description;
        $model->category_id = $request->category_id;

        $model->piece_id = $request->piece_id;
        $model->quantity_of_pieces = $request->quantity_of_pieces;

        $model->images = $request->images;

        if($request->is_active)
            $model->is_active = 1;
        else
            $model->is_active = 0;

        if($request->is_hot)
            $model->is_hot = 1;
        else
            $model->is_hot = 0;

        //images
        if($request->removeImages){
            foreach($request->removeImages as $key => $item)
            {
                $image_path = public_path().'/images/'.$item;
                unlink($image_path);
            }
        }

        $model->save();

        return response()->json(['IsSuccess' => true]);
      } catch (Exception $e) {
        return response()->json(['IsSuccess' => false]);
      }
    }

    public function createProductView()
    {
        $Categories = Category::where('is_deleted',0)->get();
        $Pieces = Piece::where('is_deleted',0)->get();

        return view('admin.product.create',['Categories'=>$Categories, 'Pieces'=>$Pieces]);
    }

   public function createProduct(Request $request)
    {
        $this->validate($request,[
                                    'name'=>'required|max:100',
                                    'price'=>'required|numeric|min:1000',
                                    'category_id'=>'required',
                                    'piece_id'=>'required',
                                    'description'=>'max:1990'
                                ],
            [
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                'name.max'=>'Tên sản phẩm phải ít hơn 100 ký tự',
                'price.required'=>'Bạn chưa nhập giá sản phẩm',
                'price.min'=>'Giá sản phẩm phải lớn hơn 1000 (một ngàn)',
                'category_id.required'=>'Bạn chưa chọn danh mục',
                'piece_id.required'=>'Bạn chưa chọn hạt',
                'description.max'=>'Mô tả phải ít hơn 1990 ký tự'
            ]);

        $model = new Product;
        $model->name = $request->name;
        $model->alias = $this->changeTitle($request->name);
        $model->price = $request->price;
        $model->tags = $request->tags;
        $model->description = $request->description;
        $model->meta_description=$request->meta_description;
        $model->category_id = $request->category_id;

        $model->piece_id = $request->piece_id;
        $model->quantity_of_pieces = $request->quantity_of_pieces;

        $model->images = $request->images;

        if($request->is_active)
            $model->is_active = 1;
        else
            $model->is_active = 0;

        if($request->is_hot)
            $model->is_hot = 1;
        else
            $model->is_hot = 0;

        $model->save();

        return response()->json(['IsSuccess' => true]);
    }

    //change to common
    public function uploadProductImage(Request $request)
    {
        $imageName = time() . '.' . $request->uploadFile->getClientOriginalExtension();
        $request->uploadFile->move(public_path().'/images/', $imageName);
        return $imageName;
    }

    //change to common
    public function deleteProductImage(Request $request)
    {
        $image_path = public_path().'/images/'.$request->deleteFile;
        unlink($image_path);
    }


    public function uploadCategoryImage(Request $request)
    {
        $imageName = time() . '.' . $request->uploadFile->getClientOriginalExtension();
        $request->uploadFile->move(public_path().'/images/', $imageName);
        $response = $imageName;

        if($request->categoryId)
        {
            $category = Category::find($request->categoryId);
            if($category->image){
                $image_path = public_path().'/images/'.$category->image;
                unlink($image_path);
            }

            $category->image = $imageName;
            $category->save();
        }
        return $response;
    }

    public function getAllOrders()
    {
        $Orders = Order::where('order_status_id',1)
                        ->with('order_status')
                        ->with('order_details')
                        ->orderBy('created_at', 'desc')
                        ->get();

        $OrderStatues = Order_Status::all();
        $Cities = City::all();

        return view('admin.order.index',['Orders'=>$Orders,
                                        'OrderStatues'=>$OrderStatues,
                                        'Cities'=>$Cities,
                                        ]);
    }

    public function searchOrder(Request $request)
    {
    		$result = Order::with('order_status')->with('order_details')->orderBy('created_at', 'desc');

    		if($request->Keyword){
                $result = $result->where('customer_name','like','%'.$request->Keyword.'%')
                                ->orwhere('customer_email','like','%'.$request->Keyword.'%')
                                ->orwhere('customer_phone','like','%'.$request->Keyword.'%');

            }

            if($request->Id){
                $result = $result->where('id',$request->Id);
    		}


    		if($request->OrderStatusId){
    			$result = $result->where('order_status_id',$request->OrderStatusId);
    		}
    		if($request->Fromdate != null){
    			$result = $result->whereDate('created_at','>=', new DateTime($request->Fromdate));
    		}
    		if($request->Todate != null){
    			$result = $result->whereDate('created_at','<=', new DateTime($request->Todate));
            }
            if($request->CityId){
                $result = $result->where('customer_city_id',$request->CityId);
    		}

    		$result = $result->get();

    		return response()->json(['Orders' => $result]);
    }

    public function viewExpiredOrder(Request $request){
        $days_ago = date('Y-m-d', strtotime('-14 days'));

        $Orders = Order::where('is_paid',0)
                        ->where('order_status_id','<',7)
                        ->where('payment_method_id',2)
                        ->where('is_remind',1)
                        ->whereDate('created_at', '<', $days_ago)
                        ->with('order_status')
                        ->with('order_details')
                        ->orderBy('created_at', 'desc')
                        ->get();


        return response()->json(['Orders' => $Orders]);
    }


    public function viewRemindOrder(Request $request){
        $days_ago = date('Y-m-d', strtotime('-7 days'));

        $Orders = Order::where('payment_method_id',2)
                        ->where('is_paid',0)
                        ->where('is_remind',0)
                        ->whereDate('created_at', '<', $days_ago)
                        ->with('order_status')
                        ->with('order_details')
                        ->orderBy('created_at', 'desc')
                        ->get();


      	return response()->json(['Orders' => $Orders]);
    }

    public function sendEmailRemindOrder(Request $request){
      $order = Order::where('id',$request->Id)
                    ->with('order_details')
                    ->first();

      $orderId = $order->id;
      $CustomerEmail = $order->customer_email;
      $created_at = $order->created_at;

      $contentEmail = [ 'order' => $order ];

      Mail::send('page2.layout.template.remind_order', ['contentEmail' => $contentEmail], function($message) use ($CustomerEmail, $orderId, $created_at){
            $message->to($CustomerEmail, 'Customer')->subject('SaggitB - (Nhắc lại) Thanh toán đơn hàng số: '.$orderId.' '.' đặt vào '.$created_at);
          });

      $order->is_remind = 1;
      $order->save();

      return response()->json(['IsSuccess' => true]);
    }

    public function orderDetailView(Request $request, $Id)
    {
        $Order = Order::with(['order_details'=>function($q){ return $q->with('sub_order_details'); }])
                        ->with('payment_method')
                        ->where('id',$Id)
                        ->first();
        $OrderStatues = Order_Status::all();
        $PaymentMethods = Payment_Method::all();
        $EstimatedDeliveries = Estimated_Delivery::all();
        $Pieces = Piece::all();

        return view('admin.order.edit',['Order'=>$Order,
                                        'OrderStatues'=>$OrderStatues,
                                        'PaymentMethods'=>$PaymentMethods,
                                        'Pieces'=>$Pieces,
                                        'EstimatedDeliveries'=>$EstimatedDeliveries ]);
    }

    public function editOrder(Request $request)
    {
        $model = Order::find($request->orderId);

        $model->payment_method_id = $request->paymentMethodId;
        $model->order_status_id = $request->orderStatusId;
        $model->is_paid = $request->isPaid;
        $model->estimated_delivery_id = $request->estimatedDeliveryId;

        $model->save();

        return response()->json(['IsSuccess' => true]);
    }
    //end shop trang suc



    public function register(Request $request)
    {
    		$this->validate($request,[
    			'Name'=>'required|min:3|max:100',
    			'Email'=>'required|unique:users',
    			'Password'=>'required|min:6',
    			'Password_confirmation'=>'required|same:Password',
    		],[
    			'Name.required'=>'Bạn chưa nhập họ tên',
    			'Name.min'=>'Họ tên phải nhiều hơn 3 ký tự',
    			'Name.max'=>'Họ tên phải ít hơn 100 ký tự',
    			'Email.required'=>'Bạn chưa nhập email',
    			'Email.unique'=>'Email đã tồn tại',
    			'Password.required'=>'Bạn chưa nhập mật khẩu',
    			'Password_confirmation.required'=>'Bạn chưa nhập xác nhận mật khẩu',
    			'Password_confirmation.same' => 'Mật khẩu không trùng nhau'
    		]);
    		////

    		$model = new User;
    		$model->name = $request->Name;
    		$model->email = $request->Email;
    		$model->password = bcrypt($request->Password);
    		$model->PhoneNumber = $request->PhoneNumber;
    		$model->IsAdmin = 0;
    		$model->Gender = 0;
    		$model->save();
    }

 	  public function create(Request $request)
    {
  		$this->validate($request,[
  			'Name'=>'required|min:3|max:100',
  			'Email'=>'required|unique:users',
  			'Password'=>'required|min:6',
  			'Password_confirmation'=>'required|same:Password',
  		],[
  			'Name.required'=>'Bạn chưa nhập họ tên',
  			'Name.min'=>'Họ tên phải nhiều hơn 3 ký tự',
  			'Name.max'=>'Họ tên phải ít hơn 100 ký tự',
  			'Email.required'=>'Bạn chưa nhập email',
  			'Email.unique'=>'Email đã tồn tại',
  			'Password.required'=>'Bạn chưa nhập mật khẩu',
  			'Password_confirmation.required'=>'Bạn chưa nhập xác nhận mật khẩu',
  			'Password_confirmation.same' => 'Mật khẩu không trùng nhau'
  		]);
  		$model=new User;
  		$model->Name=$request->Name;
  		$model->email=$request->Email;
  		$model->password=bcrypt($request->Password);
  		$model->PhoneNumber=$request->PhoneNumber;

  		$model->IsAdmin = $request->IsAdmin;
  		$model->Gender = 0;

  		$model->save();

  		return redirect('admin/user/create')->with('message','Thêm thành công');
    }


    //

    public function loginPageView(){
    	if(!Auth::check()){
   		   return view('page.login');
     	} else {
   		   return redirect('');
     	}
    }

     public function loginPage(Request $request){
   		$this->validate($request,['Email'=>'required', 'Password'=>'required'],[
			'Email.required'=>'Bạn chưa nhập email',
			'Password.required'=>'Bạn chưa nhập mật khẩu',
		]);
		if(Auth::attempt(['email'=>$request->Email,'password'=>$request->Password]))
		{
			return redirect('');
		}
		else
		{
			return redirect('login')->with(['message'=>'Đăng nhập không thành công. Sai địa chỉ email hoặc mật khẩu','failed'=>'false']);
		}

    }

    public function logoutPage()
    {
		Auth::logout();
		return redirect('');
    }



	   public function profilePageView()
    {
    	$cities = Cities::all();
    	$user = Auth::user()->load('District');

		return view('page.user',['cities'=>$cities,'user'=>$user]);
    }

    public function updateUserInfo(Request $request){
    	$model = User::find(Auth::User()->id);
    	$this->validate($request,[
			'Name'=>'required|min:3|max:100',
			'PhoneNumber'=>'required|max:12',
		],[
			'Name.required'=>'Bạn chưa nhập họ tên',
			'Name.min'=>'Họ tên phải nhiều hơn 3 ký tự',
			'Name.max'=>'Họ tên phải ít hơn 100 ký tự',
			'PhoneNumber.required'=>'Bạn chưa nhập số điện thoại',
			'PhoneNumber.max'=>'Số điện thoại không hợp lệ',
		]);

		$model->Name=$request->Name;
		$model->PhoneNumber=str_replace(' ', '', $request->PhoneNumber);
		$model->Address=$request->Address;
		$model->Gender = 0;
		$model->DistrictId = $request->DistrictId;

		$model->save();

		return response()->json(['message' => 'Cập nhật thông tin thành công']);
    }

    public function changePassWord(Request $request)
    {
		 $this->validate($request, [
            'OldPassword' => 'required',
            'NewPassword' => 'required|min:6',
            'NewPassword_Confirmation' => 'required|same:NewPassword',
        ],[
            'OldPassword.required' => 'Bạn chưa nhập mật khẩu cũ',
            'NewPassword.required' => 'Bạn chưa nhập mật khẩu mới',
            'NewPassword.min' => 'Mật khẩu mới phải lớn hơn hoặc bằng 6 ký tự',
            'NewPassword_Confirmation.required' => 'Bạn chưa nhập xác nhận mật khẩu mới',
            'NewPassword_Confirmation.same' => 'Mật khẩu mới không trùng nhau'
        ]);
		// bcrypt($request->Password);
		  $current_password = Auth::User()->password;
        if(Hash::check($request->OldPassword, $current_password))
        {
          $user_id = Auth::User()->id;
          $obj_user = User::find($user_id);
          $obj_user->password = bcrypt($request->NewPassword);
          $obj_user->save();
          return
           response()->json(['message' => 'Cập nhật mật khẩu thành công','isSuccess'=>true]);
        }else{
        	return response()->json(['message' => 'Mật khẩu cũ không đúng','isSuccess'=>false]);
        }
    }


    //common function
    function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
        $str=trim($str);
        if ($str=="") return "";
        $str =str_replace('"','',$str);
        $str =str_replace("'",'',$str);
        $str = $this->stripUnicode($str);
        $str = mb_convert_case($str,$case,'utf-8');
        $str = preg_replace('/[\W|_]+/',$strSymbol,$str);
        return $str;
    }

    function stripUnicode($str){
        if(!$str) return '';
        //$str = str_replace($a, $b, $str);
            $unicode = array(
                'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
                'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
                'ae'=>'ǽ',
                'AE'=>'Ǽ',
                'c'=>'ć|ç|ĉ|ċ|č',
                'C'=>'Ć|Ĉ|Ĉ|Ċ|Č',
                'd'=>'đ|ď',
                'D'=>'Đ|Ď',
                'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
                'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
                'f'=>'ƒ',
                'F'=>'',
                'g'=>'ĝ|ğ|ġ|ģ',
                'G'=>'Ĝ|Ğ|Ġ|Ģ',
                'h'=>'ĥ|ħ',
                'H'=>'Ĥ|Ħ',
                'i'=>'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',
                'I'=>'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
                'ij'=>'ĳ',
                'IJ'=>'Ĳ',
                'j'=>'ĵ',
                'J'=>'Ĵ',
                'k'=>'ķ',
                'K'=>'Ķ',
                'l'=>'ĺ|ļ|ľ|ŀ|ł',
                'L'=>'Ĺ|Ļ|Ľ|Ŀ|Ł',
                'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
                'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
                'Oe'=>'œ',
                'OE'=>'Œ',
                'n'=>'ñ|ń|ņ|ň|ŉ',
                'N'=>'Ñ|Ń|Ņ|Ň',
                'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
                'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
                's'=>'ŕ|ŗ|ř',
                'R'=>'Ŕ|Ŗ|Ř',
                's'=>'ß|ſ|ś|ŝ|ş|š',
                'S'=>'Ś|Ŝ|Ş|Š',
                't'=>'ţ|ť|ŧ',
                'T'=>'Ţ|Ť|Ŧ',
                'w'=>'ŵ',
                'W'=>'Ŵ',
                'y'=>'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
                'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
                'z'=>'ź|ż|ž',
                'Z'=>'Ź|Ż|Ž'
            );
            foreach($unicode as $khongdau=>$codau) {
                $arr=explode("|",$codau);
                $str = str_replace($arr,$khongdau,$str);
            }
            return $str;
    }



    public function getAllUsers(){
        $Users = User::with('city')->orderBy('name', 'desc')->get();
        $Cities = City::all();
    	return view('admin.user.index',['Users' => $Users, 'Cities' => $Cities]);
    }

    public function searchUser(Request $request)
    {
  		$result = User::with('city')->orderBy('name', 'desc');
  		if($request->Keyword){
              $result = $result->where('name','like','%'.$request->Keyword.'%')
                              ->orwhere('email','like','%'.$request->Keyword.'%')
                              ->orwhere('phone','like','%'.$request->Keyword.'%');

  		}

  		if($request->IsAdmin != null){
  			$result = $result->where('is_admin',$request->IsAdmin);
          }

          if($request->CityId){
  			$result = $result->where('city_id',$request->CityId);
  		}

  		// $result=$result->skip(0)->take(10)->get();
  		$result = $result->get();
  		return response()->json(['Users' => $result]);

    }


    public function editUserView($Id){
    	$User = User::find($Id);
    	return view('admin.user.edit',['user'=> $User]);
    }

    public function editUserPost(Request $request, $Id){
    	$this->validate($request,[
			'Name'=>'required|max:50',
			'Phone'=>'required|max:12',
		],[
			'Name.required'=>'Bạn chưa nhập họ tên',
			'Name.max'=>'Họ tên phải ít hơn 50 ký tự',
            'Phone.required'=>'Bạn chưa nhập số điện thoại',
			'Phone.max'=>'Số điện thoại không hợp lệ',
        ]);

        $model = User::find($Id);
		$model->name = $request->Name;
		$model->phone = $request->Phone;
		$model->is_admin = $request->IsAdmin;
		$model->is_active = $request->IsActive;

		$model->save();

		return redirect('admin/user/edit/'.$Id)->with('message','Cập nhật thành công');
    }

    public function changePasswordPost(Request $request, $Id)
    {
		 $this->validate($request, [
            'OldPassword' => 'required',
            'NewPassword' => 'required|min:6|max:20',
            'NewPasswordx2' => 'required|same:NewPassword',
        ],[
            'OldPassword.required' => 'Bạn chưa nhập mật khẩu cũ',
            'NewPassword.required' => 'Bạn chưa nhập mật khẩu mới',
            'NewPassword.min' => 'Mật khẩu mới phải lớn hơn hoặc bằng 6 ký tự',
            'NewPassword.max' => 'Mật khẩu mới phải ít hơn hoặc bằng 20 ký tự',
            'NewPasswordx2.required' => 'Bạn chưa nhập xác nhận mật khẩu mới',
            'NewPasswordx2.same' => 'Mật khẩu mới không trùng nhau'
        ]);
		    // bcrypt($request->Password);
		  $current_password = Auth::User()->password;
        if(Hash::check($request->OldPassword, $current_password))
        {
          $user_id = Auth::User()->id;
          $obj_user = User::find($user_id);
          $obj_user->password = bcrypt($request->NewPassword);
          $obj_user->save();
          return redirect('admin/user/edit/'.$Id)->with('message','Đổi mật khẩu thành công');

        }else{
        	 return redirect('admin/user/edit/'.$Id)->with('errorMessage','Mật khẩu cũ không đúng');

        }
    }

    //end common function

    //Blog
    public function getAllBlogs()
    {
      $result = Blog::where('is_deleted',0)->get();
      return view('admin.blog.index',['blogs'=>$result]);
    }

    public function editBlogView($Id)
    {
       $blog = Blog::find($Id);

       return view('admin.blog.edit',['blog'=>$blog]);
    }

    public function createBlogView()
    {
      return view('admin.blog.create');
    }

    public function createBlog(Request $request)
    {
        $this->validate($request,[
                                    'name'=>'required|max:100',
                                    'content'=>'required',
                                    'image'=>'required'
                                ],
            [
                'name.required'=>'Bạn chưa nhập tên bài viết',
                'name.max'=>'Tên bài viết phải ít hơn 100 ký tự',
                'content.required'=>'Nội dung bài viết phải không được để trống',
                'image.required'=>'Hình ảnh không được để trống',
            ]);

        $model = new Blog;
        $model->name = $request->name;
        $model->alias = $this->changeTitle($request->name);
        $model->tags = $request->tags;
        $model->description = $request->description;
        $model->meta_description=$request->meta_description;
        $model->image = $request->image;
        $model->is_active = $request->is_active;
        $model->content = $request->content;

        $model->save();

        return response()->json(['IsSuccess' => true]);
    }

    public function editBlog(Request $request)
    {
      try {
        $this->validate($request,[
                                    'name'=>'required|max:100',
                                    'content'=>'required',
                                    'image'=>'required'
                                ],
            [
                'name.required'=>'Bạn chưa nhập tên bài viết',
                'name.max'=>'Tên bài viết phải ít hơn 100 ký tự',
                'content.required'=>'Nội dung bài viết phải không được để trống',
                'image.required'=>'Hình ảnh không được để trống',
            ]);

        $model = Blog::find($request->id);
        $model->name = $request->name;
        $model->alias = $this->changeTitle($request->name);
        $model->tags = $request->tags;
        $model->description = $request->description;
        $model->meta_description=$request->meta_description;

        $model->is_active = $request->is_active;
        $model->content = $request->content;

        //images
        // if($model->image){
        //         $image_path = public_path().'/images/'.$model->image;
        //         unlink($image_path);
        // }
        $model->image = $request->image;
        $model->save();

        return response()->json(['IsSuccess' => true]);
      } catch (Exception $e) {
        return response()->json(['IsSuccess' => false]);
      }
    }
    //End BLog

    //Topics

    public function getAllTopics()
    {
      $result = Topic::where('is_deleted',0)->get();
      return view('admin.topic.index',['topics'=>$result]);
    }


      public function createTopicView()
      {
        return view('admin.topic.create');
      }

      public function createTopic(Request $request)
      {
          $this->validate($request,[
                                      'image'=>'required'
                                  ],
              [
                  'image.required'=>'Bạn chưa chọn Hình ảnh'
              ]);

          $model = new Topic;
          $model->line1 = $request->line1;
          $model->line2 = $request->line2;
          $model->line3 = $request->line3;
          $model->url = $request->url;
          $model->image = $request->image;
          $model->is_active = $request->is_active;
          $model->save();

          return response()->json(['IsSuccess' => true]);
      }


      public function editTopicView($Id)
      {
        $blog = Topic::find($Id);

        return view('admin.topic.edit',['Topic'=>$blog]);
      }

      public function editTopic(Request $request)
      {
          $this->validate($request,[
                                      'image'=>'required'
                                  ],
              [
                  'image.required'=>'Bạn chưa chọn Hình ảnh'
              ]);

          $model = Topic::find($request->id);
          $model->line1 = $request->line1;
          $model->line2 = $request->line2;
          $model->line3 = $request->line3;
          $model->url = $request->url;
          $model->image = $request->image;
          $model->is_active = $request->is_active;
          $model->save();

          return response()->json(['IsSuccess' => true]);
      }

    //EndTopic
}
