<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Hash;
use Mail;

use App\Category;
use App\Product;
use App\Size;

use App\Kieuday;
use App\Order;
use App\Order_Detail;
use App\Sub_Order_Detail;

use App\Charm;
use App\Wish_List;
use App\City;
use App\Payment_Method;
use App\Phong_Thuy;
use App\Nam_Phong_Thuy;
use App\Topic;
use App\Bank;
use App\Piece;
use App\Size_Hat;



use Session;


class HomeController extends Controller
{
   private $pageSize = 2;


    //shop trang suc
    public function page02()
    {
        $HotProducts = Product::with('category')
                                ->where('is_hot',1)
                                ->where('is_deleted',0)
                                ->where('is_active',1)->inRandomOrder()
                                ->skip(0)->take(8)->get();

        $BestProducts = Product::with('category')
                                ->withCount('order_details')
                                ->where('is_deleted',0)
                                ->where('is_active',1)
                                ->orderBy('order_details_count', 'desc')
                                ->skip(0)->take(8)->get();

        $productIdsInWishlist = Auth::check() ? Wish_List::where('user_id',Auth::User()->id)->select('product_id')->get() : [];
        $ProductsInWistlist = Product::with('piece')->with('category')
                                    ->whereIn('id',$productIdsInWishlist)->orderBy('name','desc')
                                    ->where('is_deleted',0)
                                    ->skip(0)->take(8)->get();

        $Topics = Topic::all();

        return view('page2.index',[ 'HotProducts'=>$HotProducts,
                                    'BestProducts'=>$BestProducts,
                                    'Topics'=>$Topics,
                                    'ProductsInWistlist'=>$ProductsInWistlist
                                    ]);
    }

    public function categoryView($Alias, $Id)
    {
        $Category = Category::find($Id);
        $Products = Product::with('piece')
                            ->where('category_id',$Id)
                            ->where('is_deleted',0)
                            ->where('is_active',1)
                            ->orderBy('name', 'asc')
                            ->skip(0)
                            ->take($this->pageSize)
                            ->get();


        $Pieces = Piece::where('is_deleted',0)->where('is_active',1)->get();

        return view('page2.category',['Category'=>$Category,'Products'=>$Products, 'Pieces'=>$Pieces]);
    }


    public function filterProducts(Request $request)
    {
      if(!$request->categoryId){
        return response()->json(['Products'=>[]]);
      }
        $Products = Product::with('piece')
                            ->where('category_id',$request->categoryId)
                            ->where('is_deleted',0)
                            ->where('is_active',1)
                            ->whereIn('piece_id', $request->listPieces)
                            ->orderBy('name', 'asc')
                            ->skip(0)
                            ->take($this->pageSize);
        if($request->optionSortId == 1){
            $Products = $Products->orderBy('name', 'asc')->get();
        } else if($request->optionSortId == 2){
            $Products = $Products->orderBy('name', 'desc')->get();
        } else if($request->optionSortId == 3){
            $Products = $Products->orderBy('price', 'asc')->get();
        } else if($request->optionSortId == 4){
            $Products = $Products->orderBy('price', 'desc')->get();
        }

        return response()->json(['Products'=>$Products]);
    }

    function seeMoreProducts(Request $request)
    {

        $currentPage = $request->CurrentPage ? $request->CurrentPage : 1;
        $MoreProducts = Product::with('piece')
                            ->where('category_id',$request->categoryId)
                            ->where('is_deleted',0)->where('is_active',1)
                            ->whereIn('piece_id', $request->listPieces)
                            ->orderBy('name', 'asc')
                            ->skip($this->pageSize*$currentPage)->take($this->pageSize);

        if($request->optionSortId == 1){
            $MoreProducts = $MoreProducts->orderBy('name', 'asc')->get();
        } else if($request->optionSortId == 2){
            $MoreProducts = $MoreProducts->orderBy('name', 'desc')->get();
        } else if($request->optionSortId == 3){
            $MoreProducts = $MoreProducts->orderBy('price', 'asc')->get();
        } else if($request->optionSortId == 4){
            $MoreProducts = $MoreProducts->orderBy('price', 'desc')->get();
        }


      // $category=Categories::find($Id);

      return response()->json(['MoreProducts'=>$MoreProducts]);
    }


     public function product_detail($Alias, $Id)
     {
         $Product = Product::with('category')->with('piece')->where('id',$Id)->first();
         $Product->category->size_hats = Size_Hat::where('is_deleted', 0)->where('is_active', 1)->where('category_id', $Product->category_id)->get();
         $Charms = Charm::all();
         $Pieces = Piece::where('is_deleted', 0)->where('is_active', 1)->get();

         $IsInWishList = false;
         if(Auth::check() && Wish_List::where('product_id',$Id)->where('user_id', Auth::user()->id)->count()>0){
           $IsInWishList = true;
         }

         $Images = explode(',', $Product->images);

         $RelatedProducts = Product::where('id','!=',$Product->id)
                                    ->where('category_id',$Product->category_id)
                                    ->inRandomOrder()
                                    ->skip(0)->take(3)->get();

        // if(count($ProductSameColors) == 0){
        //     $ProductSameColors = Product::with(['category'=>function($q){ return $q->with('sizes');}])
        //                                 ->with('piece')
        //                                 ->where('id','!=',$Product->id)
        //                                 ->where('category_id',$Product->category_id)
        //                                 ->inRandomOrder()
        //                                 ->skip(0)->take(3)->get();
        // }



        return view('page2.product_detail',['Product'=>$Product,
                                            'Images'=>$Images,
                                            'Charms'  =>  $Charms,
                                            'Pieces'  =>  $Pieces,
                                            'IsInWishList' => $IsInWishList,
                                            'RelatedProducts' => $RelatedProducts,
                                            'ProductSameMaterials'=>[] ]);
    }

    function addToCart(Request $request)
    {
       // $request->session()->forget('myCart');

        $oldCart = Session::has('myCart') ? Session::get('myCart') : null;

        $newCart = $this->addItem($oldCart, $request);

        $request->session()->put('myCart',$newCart);

        return $newCart;
    }


    function addItem($oldCart, $newItem)
    {
        $storedItem = [ 'cartId'=>uniqid(),
                        'id'=>$newItem->id,
                        'name'=>$newItem->name,
                        'sizehat'=>$newItem->sizehat,
                        'kieuday'=>$newItem->kieuday,
                        'sizevong'=>$newItem->sizevong,
                        'quanlity'=> 1,
                        'price'=>(int)$newItem->price,
                        'image'=>$newItem->image,
                        'is_custom'=>$newItem->is_custom,
                        'details'=>$newItem->details,
                        'alias'=>$newItem->alias,
                    ];

        if($oldCart)
        {
            foreach($oldCart as $key => $oldItem)
            {
                $newItemDetails = $newItem->details;
                $oldItemDetails = $oldItem['details'];

                if ($newItem->id == $oldItem['id'] &&
                    $newItem->is_custom == 0 &&
                    $this->compareSizeHat($oldItem, $newItem) &&
                    $this->compareSizeVong($oldItem, $newItem) &&
                    $this->compareKieuday($oldItem, $newItem)) {

                      $oldCart[$key]['quanlity']++;
                      (int)$oldCart[$key]['price'] += (int)$newItem->price;
                      return $oldCart;

                } else if ($newItem->is_custom != 0 &&
                          $this->compareKieuday($oldItem, $newItem) &&
                          $this->compareSizeVong($oldItem, $newItem) &&
                          $this->compareDetails($oldItemDetails, $newItemDetails)){

                            $oldCart[$key]['quanlity']++;
                            (int)$oldCart[$key]['price'] += (int)$newItem->price;
                            return $oldCart;
                }
            }
            array_push($oldCart, $storedItem);
        }
        else
        {
            $oldCart = array($storedItem);
        }

        return $oldCart;
   }

    function plusItem(Request $request)
    {
      $cart = Session::has('myCart') ? Session::get('myCart') : null;
      if($cart){
        foreach($cart as $key => $struct){
         if ($request->cartId == $struct['cartId']) {

              $singlePrice = (int)$cart[$key]['price']/(int)$cart[$key]['quanlity'];

              $cart[$key]['quanlity']++;

              (int)$cart[$key]['price']+=(int)$singlePrice;
              $request->session()->put('myCart',$cart);
              return $cart[$key];
              }
          }
      }
    }

    function minusItem(Request $request)
    {
      $cart = Session::has('myCart') ? Session::get('myCart') : null;
      if($cart){
        foreach($cart as $key => $struct){
         if ($request->cartId == $struct['cartId']) {
              if($cart[$key]['quanlity'] > 1){
                $singlePrice = (int)$cart[$key]['price']/(int)$cart[$key]['quanlity'];

                $cart[$key]['quanlity']--;

                (int)$cart[$key]['price']-=(int)$singlePrice;
                $request->session()->put('myCart',$cart);
                return $cart[$key];
              }
              return false;
              }
          }
      }
    }

    function removeItem(Request $request)
    {
      $cart = Session::has('myCart') ? Session::get('myCart') : null;
      $newCart = [];
      if($cart){
        foreach($cart as $key => $struct){
          if ($request->cartId != $struct['cartId']) {
              array_push($newCart, $struct);
          }
        }
        $request->session()->put('myCart',$newCart);
        return 1;
      }
      return 0;
   }


    function compareSizeHat($oldItem, $newItem){
      if($oldItem['sizehat'] == $newItem->sizehat){
        return true;
      }
      else {
        return false;
      }
    }

    function compareKieuday($oldItem, $newItem){
      if($oldItem['kieuday'] == $newItem->kieuday){
        return true;
      }
      else {
        return false;
      }
    }

    function compareSizeVong($oldItem, $newItem){
      if($oldItem['sizevong'] == $newItem->sizevong){
        return true;
      }
      else {
        return false;
      }
    }

    function compareDetails($oldItemDetail, $newItemDetail)
    {
      if(!$oldItemDetail || !$newItemDetail)
          return false;

        $_newItemDetail = $newItemDetail;
        if(count($oldItemDetail) == count($_newItemDetail)){
            foreach($oldItemDetail as $keyOld => $strOld)
            {
                foreach($_newItemDetail as $keyNew => $strNew){
                    if($strOld['itemId'] == $strNew['itemId'] &&
                        $strOld['itemSize'] == $strNew['itemSize']){

                        unset($_newItemDetail[$keyNew]);
                        continue 2;
                    }
                }
            }
            if(count($_newItemDetail) == 0)
                return true;
            else
                return false;
        }
        return false;
    }

    public function cart()
    {
        $Carts = Session::has('myCart') ? Session::get('myCart') : null;

        $Charms = Charm::all();
        $SizeHats = Size_Hat::all();

        $Banks = Bank::where('is_active',1)->get();
        $Cities = City::orderBy('display_order','desc')->get();
        $PaymentMethods = Payment_Method::orderBy('display_order','desc')
                                        ->where('is_active',1)
                                        ->where('is_deleted',0)
                                        ->get();

        return view('page2.cart',['Carts'=>$Carts,
                                'Charms'=>$Charms,
                                'Cities'=>$Cities,
                                'Banks'=>$Banks,
                                'SizeHats'=>$SizeHats,
                                'PaymentMethods'=>$PaymentMethods ]);
    }


    public function checkoutView()
    {
        $Carts = Session::has('myCart') ? Session::get('myCart') : null;

        $Sizes = Size::all();
        return view('page2.checkout',['Carts'=>$Carts,'Sizes'=>$Sizes ]);
    }


    public function loginPage(Request $request)
    {
        $this->validate($request,['email'=>'required', 'password'=>'required'],[
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
          	// $user = User::where('email',$request->email)->first();
            // $user->ip = long2ip(request()->ip());
            // $user->save();
            return response()->json(['IsSuccess'=>true]);
        }
        else
        {
            return response()->json(['IsSuccess'=>false]);
        }
    }




    public function logoutPage()
    {
        Auth::logout();
        return 1;
    }


    public function addToWishList(Request $request)
    {
        if($request->productId && Auth::check()){
          if($request->isInWishList == 0){
            $model = new Wish_List;
            $model->product_id = $request->productId;
            $model->user_id =  Auth::user()->id;
            $model->save();
            return response()->json(['isInWishList' => true]);
          } else {
             $model = Wish_List::where('product_id',$request->productId)->where('user_id',Auth::user()->id);

            $model->delete();
            return response()->json(['isInWishList' => false]);
          }
        }
         return response()->json(['isInWishList' => false]);
    }

    public function checkoutPost(Request $request)
    {
        $cart = Session::has('myCart') ? Session::get('myCart') : null;
        if($cart == null)
          return;

        $CustomerName = $request->CustomerName;
        $CustomerEmail = $request->CustomerEmail;
        $CustomerPhone = $request->CustomerPhone;
        $CustomerNote = $request->CustomerNote;
        $CustomerAddress = $request->CustomerAddress;
        $CustomerDistrict = $request->CustomerDistrict;
        $CustomerCity = $request->CustomerCity;
        $CustomerCityId = $request->CustomerCityId;
        $CustomerPaymentMethodId = $request->CustomerPaymentMethodId;


        $model = new Order;
        $model->customer_name = $CustomerName;
        $model->customer_email = $CustomerEmail;
        $model->customer_phone = $CustomerPhone;
        $model->customer_note = $CustomerNote;
        $model->customer_address = $CustomerAddress;
        $model->customer_city = $CustomerCity;
        $model->customer_district = $CustomerDistrict;
        $model->customer_city_id = $CustomerCityId;
        $model->payment_method_id = $CustomerPaymentMethodId;

        $model->random_code = str_random(90);

        $model->original_price = 0;

        $model->order_status_id = 1; //to do
        if(Auth::check()){
          $model->customer_id = Auth::user()->id; //to do
        }

        $model->save();
        $this->createOrderDetails($cart, $model);

        $model->save();

        $orderId = $model->id;
        $created_at = $model->created_at;

        $contentEmail = [ 'order' => $model,
                          'toEmail' => $CustomerEmail,
                          'customerName' => $CustomerName,
                          'cart' => $cart,
                          'totalPrice' => $model->original_price
                        ];

        Mail::send('page2.layout.template.order_info', ['contentEmail' => $contentEmail], function($message) use ($CustomerEmail, $orderId, $created_at){
              $message->to($CustomerEmail, 'Customer')->subject('Đặt hàng thành công đơn hàng số: '.$orderId.' '.' vào '.$created_at);
        });

        $request->session()->forget('myCart');
        return response()->json(['OrderId' => $model->id, 'IsSuccess'=>true]);
    }
         //end shop trang suc
     function createOrderDetails($cart, $order){

       // 'cartId'=>uniqid(),
       //                 'id'=>$newItem->id,
       //                 'name'=>$newItem->name,
       //                 'sizehat'=>$newItem->sizehat,
       //                 'kieuday'=>$newItem->kieuday,
       //                 'sizevong'=>$newItem->sizevong,
       //                 'quanlity'=> 1,
       //                 'price'=>(int)$newItem->price,
       //                 'image'=>$newItem->image,
       //                 'is_custom'=>$newItem->is_custom,
       //                 'details'=>$newItem->details,
       //                 'alias'=>$newItem->alias,
        if($cart){
            $latestPrice = 0;
            foreach($cart as $key => $struct){
              $product = Product::with('category')->where('id',$struct['id'])->first();

              $orderDetail = new Order_Detail;
              $orderDetail->product_name = $struct['name'];
              $orderDetail->product_image = $struct['image'];
              $orderDetail->product_alias = $struct['alias'];
              $orderDetail->product_sizehat = $struct['sizehat'];
              $orderDetail->product_kieuday = $struct['kieuday'];
              $orderDetail->product_sizevong = $struct['sizevong'];

              if ($product) {
                $orderDetail->category_name = $product->category->name;
                $orderDetail->category_id = $product->category->id;
              }

              $orderDetail->original_price = $struct['price'];
              $orderDetail->quanlity = $struct['quanlity'];
              $orderDetail->product_id = $struct['id'];
              $orderDetail->order_id = $order->id;

               (int)$latestPrice += (int)$struct['price'];

              $orderDetail->save();
              $this->createSub_OrderDetails($struct['details'], $orderDetail);

            }
        $order->original_price = $latestPrice;
      }
    }

    function createSub_OrderDetails($items, $orderDetail){
        if($items){
            foreach($items as $key => $struct){
              $subOrderDetail = new Sub_Order_Detail;
              $subOrderDetail->piece_name = $struct['itemName'];
              $subOrderDetail->piece_id = $struct['itemId'];
              $subOrderDetail->piece_size = $struct['itemSize'];
              $subOrderDetail->order_detail_id = $orderDetail->id;
              $subOrderDetail->save();
            }
          }
    }

    function getPhongThuy(Request $request)
    {
      $PhongThuy = Nam_Phong_Thuy::with('phong_thuy')
                                ->where('nam',$request->nam)
                                ->first();

      return response()->json(['PhongThuy'=>$PhongThuy, 'IsSuccess'=>true]);
    }


}
