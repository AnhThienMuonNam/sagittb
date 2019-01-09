<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Mail;
use App\Order;
use App\Order_Detail;
use App\Charm;
use App\Order_Status;
use App\Category;
use App\Product;
use App\Wish_List;
use App\City;
use App\Bank;
use App\Piece;
use App\Size_Hat;

use Hash;

class UserController extends Controller
{
    //shop trang suc
    public function ordersView()
    {
  		$OrderStatues = Order_Status::all();
  		return view('page2.user.order',['OrderStatues'=>$OrderStatues]);
   }

	  public function getOrders(Request $request)
    {
  		$Orders = Order::with('order_status')->where('order_status_id',$request->orderStatusId)
  						->where('customer_email',Auth::user()->email)
  						->orderBy('created_at','desc')
  						->get();
  		return response()->json(['Orders' => $Orders,'isSuccess'=>true]);
    }

 	  public function getOrderDetail($orderId)
    {
      if(Auth::check()) {
      		$Order = Order::with(['order_details'=>function($q){ return $q->with('sub_order_details'); }])
      						->with('payment_method')
      						->with('estimated_delivery')
      						->where('id',$orderId)
                	->where('customer_email',Auth::User()->email)
      						->first();
          if(!$Order)
              return;

        	$OrderStatues = Order_Status::all();

          $Charms = Charm::all();
          $Pieces = Piece::all();
          $SizeHats = Size_Hat::all();
          $Banks = Bank::where('is_active',1)->get();

  		    return view('page2.user.order_detail',[	'Order'=>$Order,
                          												'OrderStatues'=>$OrderStatues,
                          												'Charms'=>$Charms,
                                                	'Banks'=>$Banks,
                                                	'Pieces'=>$Pieces,
                                                  'SizeHats'=>$SizeHats,
                          											]);
        }
    }

    public function getOrderDetailByCode($orderCode)
    {

      $Order = Order::with(['order_details'=>function($q){ return $q->with('sub_order_details'); }])
                    ->with('payment_method')
                    ->with('estimated_delivery')
                    ->where('random_code',$orderCode)
                    ->first();
      if(!$Order)
        return;
      $OrderStatues = Order_Status::all();
      $Pieces = Piece::all();
      $SizeHats = Size_Hat::all();
      $Banks = Bank::where('is_active',1)->get();

      return view('page2.user.order_detail',[	'Order'=>$Order,
                        'OrderStatues'=>$OrderStatues,
                        'Banks'=>$Banks,
                        'Pieces'=>$Pieces,
                        'SizeHats'=>$SizeHats,
                      ]);
    }


	public function getProfile()
  {
    if(Auth::check()){
	      $User = Auth::user()->load('city');
	   	  $Cities = City::all();
        return view('page2.user.profile',['Cities'=>$Cities, 'User'=>$User]);
      }
	}

  public function getWishList()
  {
      $productIds = Wish_List::where('user_id',Auth::User()->id)->select('product_id')->get();
      $Products = Product::with('piece')->with('category')
                           ->whereIn('id',$productIds)->orderBy('name','desc')
                           ->where('is_deleted',0)->get();

      $Categories = Category::where('is_deleted',0)->get();


      return view('page2.user.wish_list',['Products'=>$Products,'Categories'=>$Categories]);
    }

   public function filterWishList(Request $request)
    {
     	$productIds = Wish_List::where('user_id',Auth::User()->id)->select('product_id')->get();
		$Products = Product::with('piece')->with('category')
							->whereIn('id',$productIds)
							->where('is_deleted',0)->orderBy('name','desc');
		if($request->listCategories){
			$Products=$Products	->whereIn('category_id',$request->listCategories)->get();
		}else{
			$Products = [];
		}

		return response()->json(['Products' => $Products,'isSuccess'=>true]);
	}

	public function updateUser(Request $request){
    	$this->validate($request,[
			'Name'=>'required|max:100',
			'Phone'=>'required|max:12',
		],[
			'Name.required'=>'Bạn chưa nhập họ tên',
			'Name.max'=>'Họ tên phải ít hơn 100 ký tự',
			'Phone.required'=>'Bạn chưa nhập số điện thoại',
			'Phone.max'=>'Số điện thoại không hợp lệ',
		]);

		$model = User::find(Auth::User()->id);

		$model->name = $request->Name;
		$model->phone = str_replace(' ', '', $request->Phone);
		$model->address = $request->Address;
		$model->district = $request->District;
		$model->city = $request->City;
		$model->city_id = $request->CityId;

    $model->year_ob = $request->YearOb;
    $model->month_ob = $request->MonthOb;
    $model->day_ob = $request->DayOb;
    $model->hour_ob = $request->HourOb;
    $model->minute_ob = $request->MinuteOb;

    $model->gender = $request->Gender;

		$model->save();

		return response()->json(['IsSuccess' => true]);
	}

	public function changePassWord(Request $request)
    {
		 $this->validate($request, [
            'OldPassword' => 'required',
            'NewPassword' => 'required|min:6|max:20',
            'NewPasswordx2' => 'required|same:NewPassword',
        ],[
            'OldPassword.required' => 'Bạn chưa nhập mật khẩu cũ',
            'NewPassword.required' => 'Bạn chưa nhập mật khẩu mới',
			'NewPassword.min' => 'Mật khẩu mới phải lớn hơn hoặc bằng 6 ký tự',
			'NewPassword.max' => 'Mật khẩu mới phải nhỏ hơn hoặc bằng 20 ký tự',
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
          return response()->json(['IsSuccess'=>true]);
        }else{
        	return response()->json(['message' => 'Mật khẩu cũ không đúng','IsSuccess'=>false]);
        }
	}

	public function createUser(Request $request)
    {
		$this->validate($request,[
			'Email'=>'required|unique:users',
			'Password'=>'required|min:6|max:20',
		],[
			'Email.required'=>'Bạn chưa nhập email',
			'Email.unique'=>'Email đã tồn tại',
			'Password.required'=>'Bạn chưa nhập mật khẩu',
			'Password.min' => 'Mật khẩu mới phải lớn hơn hoặc bằng 6 ký tự',
			'Password.max' => 'Mật khẩu mới phải nhỏ hơn hoặc bằng 20 ký tự',
		]);

		$model = new User;
		$model->name = $request->Email;
		$model->email = $request->Email;
		$model->phone = $request->Phone == null ? 0 : $request->Phone;
		$model->password = bcrypt($request->Password);
		$model->save();

		return response()->json(['IsSuccess'=>true]);
	}


	public function sendEmailResetPassword(Request $request)
    {
    	$this->validate($request,
                ['Email'=>'required',],
								['Email.required'=>'Bạn chưa nhập email',]);

    	$CustomerEmail = $request->Email;

    	$user = User::where('email',$CustomerEmail)->first();

    	if($user !== null){
		       $user->remember_token = str_random(90);
  		     $user->save();
		       $contentEmail = [ 'toEmail'=>$CustomerEmail, 'token'=>$user->remember_token ];

	 	       Mail::send('page2.layout.template.reset_password', ['contentEmail' => $contentEmail], function($message) use ($CustomerEmail){
	            $message->to($CustomerEmail, 'Customer')->subject('Khôi phục mật khẩu');
			});
			return response()->json(['IsSuccess'=>true]);
		}
		return response()->json(['IsSuccess'=>false]);
    }


	public function resetPasswordPageGet($token)
    {
    	$user = User::where('remember_token',$token)->first();
    	if($user === null){
    		return redirect('');
    	}else{
    		return view('page2.user.reset_password',['Token'=>$token]);
    	}
    }

    public function resetPasswordPagePost(Request $request)
    {
    	$this->validate($request,[
			'Password'=>'required|min:6|max:20',
			'Passwordx2'=>'required|same:Password',
		],[
			'Password.required'=>'Bạn chưa nhập mật khẩu',
			'Password.min' => 'Mật khẩu mới phải lớn hơn hoặc bằng 6 ký tự',
			'Password.max' => 'Mật khẩu mới phải nhỏ hơn hoặc bằng 20 ký tự',
			'Passwordx2.required'=>'Bạn chưa nhập xác nhận mật khẩu',
			'Passwordx2.same' => 'Mật khẩu không trùng nhau'
		]);

		$user = User::where('remember_token',$request->Token)->first();
    	if($user === null){
    		return redirect('');
    	}else{
    		$user->password = bcrypt($request->Password);
    		$user->remember_token = '';
    		$user->save();
    		return response()->json(['IsSuccess'=>true]);
    	}
    }

    //end shop trang suc

}
