<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\PaymentMethods;
use App\OrderStatues;
use Excel;
use DateTime;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function getAll()
    {

		$result = Orders::with('PaymentMethod')->with('OrderStatus')->with('OrderDetails')
						->where('IsConfirmed',1)
						->orderBy('created_at', 'desc')->get();
		$PaymentMethods = PaymentMethods::where('IsDeleted',0)->get();
		$OrderStatues = OrderStatues::where('IsDeleted',0)->get();

		return view('admin.order.index',['orders'=>$result,
										'PaymentMethods'=>$PaymentMethods,
										'OrderStatues'=>$OrderStatues
										]);
    }

    public function searchOrder(Request $request)
    {
		$result = Orders::with('PaymentMethod')->with('OrderStatus')->with('OrderDetails')->orderBy('created_at', 'desc')->where('IsConfirmed',1);

		if($request->sKeyword){
			$result = $result->where('CustomerName','like','%'.$request->sKeyword.'%')->orwhere('CustomerEmail','like','%'.$request->sKeyword.'%');

		}
		if($request->sPhone){
			$result = $result->where('CustomerPhone','like','%'.$request->sPhone.'%');
		}
		if($request->sPaymentMethodId){
			$result = $result->where('PaymentMethodId',$request->sPaymentMethodId);
		}
		if($request->sOrderStatusId){
			$result = $result->where('OrderStatusId',$request->sOrderStatusId);
		}
		if($request->sFromdate != null){
			$result = $result->whereDate('created_at','>=', new DateTime($request->sFromdate));
		}
		if($request->sTodate != null){
			$result = $result->whereDate('created_at','<=', new DateTime($request->sTodate));
		}

		$result=$result->get();

		return response()->json(['result' => $result]);
    }

 	public function detailView(Request $request, $Id)
    {

		$order = Orders::with(['OrderDetails'=>function($q){
												return $q->with(['Flower'=>function($qf){
													return $qf->with('Category');
												}]);
												}
								])
					->with('PaymentMethod')->with('OrderStatus')->with('District')->where('Id',$Id)->first();
		$PaymentMethods = PaymentMethods::where('IsDeleted',0)->get();
		$OrderStatues = OrderStatues::where('IsDeleted',0)->get();

		return view('admin.order.edit',['order'=>$order,
										'PaymentMethods'=>$PaymentMethods,
										'OrderStatues'=>$OrderStatues
										]);
    }

    public function edit(Request $request)
    {
		$order = Orders::find($request->Id);

		$order->IsPaid = $request->IsPaid;
		$order->OrderStatusId = $request->OrderStatusId;

		$order->save();

		return redirect('admin/order/detail/'.$order->Id)->with('message','Cập nhập đơn hàng thành công');
    }

    //export
    public function exportOrder(Request $request)
    {
    	$keyWord = $request->sKeyword;
    	$phoneNumber = $request->sPhone;
		$paymentMethodName = 'Tất cả';
		$orderStatusName = 'Tất cả';
    	$fromdate = $request->sFromdate ? $request->sFromdate :'--';
    	$todate = $request->sTodate ? $request->sTodate :'--';
    	$isPaid = $request->sIsPaid != null ? $request->sIsPaid == 1 ?'Đã thanh toán' : 'Chưa thanh toán' : 'Tất cả';
		if($request->sPaymentMethodId)
		{
			$model = PaymentMethods::find($request->sPaymentMethodId);
			if($model){
				$paymentMethodName = $model->Name;
			}
		}

		if($request->sOrderStatusId)
		{
			$model = OrderStatues::find($request->sOrderStatusId);
			if($model){
				$orderStatusName = $model->Name;
			}
		}


		$orders=Orders::join('districts','orders.CustomerDistrictId','=','districts.Id')
						->join('cities','districts.CityId','=','cities.Id')
						->join('orderdetails','orderdetails.OrderId','=','orders.Id')
						->join('orderstatues','orderstatues.Id','=','orders.OrderStatusId');

		if($request->sKeyword){
			$orders = $orders->where('CustomerName','like','%'.$request->sKeyword.'%')->orwhere('CustomerEmail','like','%'.$request->sKeyword.'%');

		}
		if($request->sPhone){
			$orders = $orders->where('CustomerPhone','like','%'.$request->sPhone.'%');
		}
		if($request->sPaymentMethodId){
			$orders = $orders->where('PaymentMethodId',$request->sPaymentMethodId);
		}
		if($request->sOrderStatusId){
			$orders = $orders->where('OrderStatusId',$request->sOrderStatusId);
		}
		if($request->sFromdate != null){
			$orders = $orders->whereDate('orders.created_at','>=', new DateTime($request->sFromdate));
		}
		if($request->sTodate != null){
			$orders = $orders->whereDate('orders.created_at','<=', new DateTime($request->sTodate));
		}

		$orders=$orders->where('IsConfirmed',1);

		$orders = $orders->select([
									'orders.Id as Mã',
									'CustomerName as Tên khách hàng',
									'CustomerEmail as Email',
									'CustomerPhone as Số điện thoại',
									'CustomerAddress as Địa chỉ',
									'districts.Name as Quận/Huyện',
									'cities.Name as Tỉnh/Thành phố',
									'orders.created_at as Ngày đặt hàng',
									'IsPaid as Tình trạng thanh toán (1/Đã thanh toán)',
									'orderstatues.Name as Trạng thái đơn hàng',
									DB::raw('count(orderdetails.OrderId) as "Số lượng sản phẩm"'),
									DB::raw('sum(orderdetails.Quanlity*orderdetails.Price) as "Tổng tiền đơn hàng"'),

								])->groupBy(['orders.Id','CustomerName','CustomerEmail','CustomerPhone','CustomerAddress','districts.Name','cities.Name','orders.created_at','orderstatues.Name','IsPaid'])
							->get();

    	$myFile=Excel::create('Laravel Excel', function($excel) use($orders, $keyWord, $phoneNumber, $paymentMethodName, $orderStatusName, $fromdate, $todate, $isPaid){
		    $excel->sheet('Danh sach don dat hang', function($sheet) use ($orders, $keyWord, $phoneNumber, $paymentMethodName, $orderStatusName, $fromdate, $todate, $isPaid){

				$sheet->row(3, array('Họ tên/Email:',$keyWord,'','Số điện thoại:',$phoneNumber));
				$sheet->row(4, array('Ngày đặt hàng:','từ: '.$fromdate.' đến: '.$todate,'','Trạng thái đơn hàng:',$orderStatusName));
				$sheet->row(5, array('Phương thức thanh toán:',$paymentMethodName,'','Tình trạng thanh toán:',$isPaid));
				$sheet->fromArray($orders, null, 'A7', true);

				//style
				$sheet->mergeCells('A1:E1');
				$sheet->cells('A1', function($cells) {
				 	$cells->setValue('Danh sách đơn đặt hàng');
					$cells->setFontWeight('bold');
					$cells->setFontSize(20);
					$cells->setAlignment('center');
    			// manipulate the range of cells
				});
				$sheet->cells('A7:L7', function($cells) {
					$cells->setFontWeight('bold');
				});
				$sheet->cells('A3:A5', function($cells) {
					$cells->setFontWeight('bold');
				});
				$sheet->cells('D3:D5', function($cells) {
					$cells->setFontWeight('bold');
				});
		        // $sheet->setOrientation('landscape');
		    });
		});

		$myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
			$response =  array(
			   'name' => "Danh sach don dat hang", //no extention needed
			   'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile) //mime type of used format
			);
			return response()->json($response);
    }
}
