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
use App\Order_Detail;
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
use App\Lichsu_Tracuu;

class Admin_OrderController extends Controller
{
    public function createOrderView()
    {
        if (!\AppHelper::instance()->hasPermission('ORDER_ADD')) {
            return view('admin.unauthorized');
        }
        $Products = Product::with('category')->where('is_deleted', 0)->get();
        $OrderStatues = Order_Status::all();
        $PaymentMethods = Payment_Method::all();
        $EstimatedDeliveries = Estimated_Delivery::all();
        $Users = User::with('city')->orderBy('name', 'desc')->get();
        $Cities = City::all();

        return view('admin.order_create', [
            'Products' => $Products, 'OrderStatues' => $OrderStatues,
            'PaymentMethods' => $PaymentMethods,
            'EstimatedDeliveries' => $EstimatedDeliveries,
            'Users' => $Users,
            'Cities' => $Cities
        ]);
    }

    public function createOrder(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('ORDER_ADD')) {
            return response()->json(['IsSuccess' => false]);
        }
        $this->validate(
            $request,
            [
                'customer_name' => 'required',
                'customer_email' => 'required',
                'customer_address' => 'required',
                'customer_district' => 'required',
                'customer_city_id' => 'required',
                'customer_phone' => 'required|max:12'
            ],
            [
                'customer_name.required' => 'Bạn chưa nhập Khách hàng',
                'customer_email.required' => 'Bạn chưa nhập Email',
                'customer_address.required' => 'Bạn chưa nhập Đường, số nhà',
                'customer_district.required' => 'Bạn chưa nhập Phường/Quận',
                'customer_city_id.required' => 'Bạn chưa nhập Tỉnh/TP',
                'customer_phone.required' => 'Bạn chưa nhập SĐT'
            ]
        );

        $model = new Order;
        $model->customer_id = $request->customer_id;
        $model->customer_name = $request->customer_name;
        $model->customer_email = $request->customer_email;
        $model->customer_phone = $request->customer_phone;
        $model->customer_note = $request->customer_note;
        $model->customer_address = $request->customer_address;
        $model->customer_city = $request->customer_city;
        $model->customer_district = $request->customer_district;
        $model->customer_city_id = $request->customer_city_id;
        $model->payment_method_id = $request->payment_method_id;
        $model->order_status_id = $request->order_status_id;
        $model->estimated_delivery_id = $request->estimated_delivery_id;

        $model->random_code = str_random(90);
        $model->original_price = 0;

        $model->save();
        $this->createOrderDetails($request->order_details, $model);
        $model->save();

        return response()->json(['IsSuccess' => true]);
    }

    function createOrderDetails($details, $order)
    {
        if ($details) {
            $latestPrice = 0;
            foreach ($details as $key => $struct) {

                $orderDetail = new Order_Detail;
                $orderDetail->product_id = $struct['product_id'];
                $orderDetail->product_name = $struct['product_name'];
                $orderDetail->original_price = $struct['product_price'];
                $orderDetail->product_image = $struct['product_image'];
                $orderDetail->product_alias = $struct['product_alias'];
                $orderDetail->category_name = $struct['category_name'];
                $orderDetail->category_id = $struct['category_id'];
                $orderDetail->quanlity = $struct['product_quanlity'];
                $orderDetail->order_id = $order->id;

                (int) $latestPrice += (int) $struct['product_price'];

                $orderDetail->save();
            }
            $order->original_price = $latestPrice;
        }
    }

    public function getAllOrders()
    {
        if (!\AppHelper::instance()->hasPermission('ORDER_LIST')) {
            return view('admin.unauthorized');
        }
        $Orders = Order::with('order_status')
            ->with('order_details')
            ->orderBy('created_at', 'desc')
            ->get();

        $OrderStatues = Order_Status::all();
        $Cities = City::all();

        return view('admin.order_index', [
            'Orders' => $Orders,
            'OrderStatues' => $OrderStatues,
            'Cities' => $Cities,
        ]);
    }

    public function searchOrder(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('ORDER_LIST')) {
            response()->json(['Orders' => null]);
        }
        $result = Order::with('order_status')->with('order_details')->orderBy('created_at', 'desc');

        if ($request->Keyword) {
            $result = $result->where('customer_name', 'like', '%' . $request->Keyword . '%')
                ->orwhere('customer_email', 'like', '%' . $request->Keyword . '%')
                ->orwhere('customer_phone', 'like', '%' . $request->Keyword . '%');
        }

        if ($request->Id) {
            $result = $result->where('id', $request->Id);
        }


        if ($request->OrderStatusId) {
            $result = $result->where('order_status_id', $request->OrderStatusId);
        }
        if ($request->Fromdate != null) {
            $result = $result->whereDate('created_at', '>=', new DateTime($request->Fromdate));
        }
        if ($request->Todate != null) {
            $result = $result->whereDate('created_at', '<=', new DateTime($request->Todate));
        }
        if ($request->CityId) {
            $result = $result->where('customer_city_id', $request->CityId);
        }

        $result = $result->get();

        return response()->json(['Orders' => $result]);
    }

    public function viewExpiredOrder(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('ORDER_LIST')) {
            response()->json(['Orders' => null]);
        }
        $days_ago = date('Y-m-d', strtotime('-14 days'));

        $Orders = Order::where('is_paid', 0)
            ->where('order_status_id', '<', 7)
            ->where('payment_method_id', 2)
            ->where('is_remind', 1)
            ->whereDate('created_at', '<', $days_ago)
            ->with('order_status')
            ->with('order_details')
            ->orderBy('created_at', 'desc')
            ->get();


        return response()->json(['Orders' => $Orders]);
    }

    public function viewRemindOrder(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('ORDER_LIST')) {
            response()->json(['Orders' => null]);
        }
        $days_ago = date('Y-m-d', strtotime('-7 days'));

        $Orders = Order::where('payment_method_id', 2)
            ->where('is_paid', 0)
            ->where('is_remind', 0)
            ->whereDate('created_at', '<', $days_ago)
            ->with('order_status')
            ->with('order_details')
            ->orderBy('created_at', 'desc')
            ->get();


        return response()->json(['Orders' => $Orders]);
    }

    public function sendEmailRemindOrder(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('ORDER_LIST')) {
            return response()->json(['IsSuccess' => false]);
        }
        $order = Order::where('id', $request->Id)
            ->with('order_details')
            ->first();

        $orderId = $order->id;
        $CustomerEmail = $order->customer_email;
        $created_at = $order->created_at;

        $contentEmail = ['order' => $order];

        Mail::send('page2.layout.template.remind_order', ['contentEmail' => $contentEmail], function ($message) use ($CustomerEmail, $orderId, $created_at) {
            $message->to($CustomerEmail, 'Customer')->subject('SagittB - (Nhắc lại) Thanh toán đơn hàng số: ' . $orderId . ' ' . ' đặt vào ' . $created_at);
        });

        $order->is_remind = 1;
        $order->save();

        return response()->json(['IsSuccess' => true]);
    }

    public function orderDetailView(Request $request, $Id)
    {
        if (!\AppHelper::instance()->hasPermission('ORDER_LIST')) {
            return view('admin.unauthorized');
        }
        $Order = Order::with(['order_details' => function ($q) {
            return $q->with('sub_order_details');
        }])
            ->with('payment_method')
            ->where('id', $Id)
            ->first();
        $OrderStatues = Order_Status::all();
        $PaymentMethods = Payment_Method::all();
        $EstimatedDeliveries = Estimated_Delivery::all();
        $Pieces = Piece::all();

        return view('admin.order_edit', [
            'Order' => $Order,
            'OrderStatues' => $OrderStatues,
            'PaymentMethods' => $PaymentMethods,
            'Pieces' => $Pieces,
            'EstimatedDeliveries' => $EstimatedDeliveries
        ]);
    }

    public function editOrder(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('ORDER_EDIT')) {
            return response()->json(['IsSuccess' => false]);
        }
        $model = Order::find($request->orderId);

        $model->payment_method_id = $request->paymentMethodId;
        $model->order_status_id = $request->orderStatusId;
        $model->is_paid = $request->isPaid;
        $model->estimated_delivery_id = $request->estimatedDeliveryId;

        $model->save();

        return response()->json(['IsSuccess' => true]);
    }
}
