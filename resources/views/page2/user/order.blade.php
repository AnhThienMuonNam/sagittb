@extends('page2.layout.master')

@section('css')
<style type="text/css">

.checkout-table td a:hover {
    color: white;
}

.selected-btn-filter-order {
	font-weight: bold;
}

.btn-filter-order:hover {
  	font-weight: bold;
}

.centerOrderStatus {
    margin: auto;
    border: 1px solid #dfb859;
    padding: 10px;
}
</style>
@endsection


@section('content')

<!-- <section>
	<div class="inner-bg">
		<div class="inner-head wow fadeInDown">
			<h3>Đơn hàng</h3>
		</div>
	</div>
</section> -->
<!--page heading-->
<!--container-->
<div id="page-order" class="container" style="padding-top: 60px;">
	<div class="shop-in">
		<!--breadcrumbs -->
		<div class="bread2">
			<ul>
				<li><a href="{{url('')}}">TRANG CHỦ</a>
					<li>/</li>
					<li>Đơn hàng</li>
				</ul>
			</div>
			<!--breadcrumbs -->
			<div class="clearfix"> </div>
			<!--table-->
			<div class="checkout">
			<div class="row fadeIn centerOrderStatus" >
				<ul style="text-align: center;">
				<!-- ko foreach: OrderStatues -->
				<!-- ko if: $index() == 0 -->
				<li style="display: inline-block; font-size: 20px;"><a href="#" class="btn-filter-order selected-btn-filter-order" data-bind="text: $data.name, click: filterOrders, attr:{id: 'order-status-'+$data.id}"></a></li>
				<!-- /ko -->

				<!-- ko if: $index() > 0 && $index() < (OrderStatues().length-1) -->
				<li style="display: inline-block; font-size: 20px;"><a href="#" class="btn-filter-order" data-bind="text: $data.name, click: filterOrders, attr:{id: 'order-status-'+$data.id}"></a></li>
				<!-- /ko -->

				<!-- ko if: $index() < (OrderStatues().length - 2) -->
				<li style="display: inline-block; padding-left:15px; padding-right:15px;">
					<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
				</li>
				<!-- /ko -->



				<!-- /ko -->
				</ul>
			</div>


      <div style="padding-top: 30px;"></div>
				<div class="table-responsive table-none wow fadeIn">
					<table class="table checkout-table">
						<tr class="table-h">
							<td>ID</td>
							<td>Ngày đặt</td>
							<td>Giá trị đơn hàng</td>
							<td>Trạng thái</td>
							<td></td>
						</tr>
						<!-- ko foreach: Orders -->
						<tr>
							<td class="product-name"><span data-bind="text: $data.id">
							</span></td>
							<td class="product-name"><span data-bind="text: $data.created_at">
							</span></td>
							<!-- <td>
								<div class="cost2"><span data-bind="text: formatMoney($data.original_price)"></span>
								</div>
							</td> -->
              <td><div class="cost" style="background: #1e1c1c;">
                <span style="font-size: 20px; color: #DDCA22;" data-bind="text: formatMoney($data.original_price)"></span>
              </div></td>
							<td>
								<div class="cost2"><span data-bind="text: $data.order_status.name"></span>

								</div>
							</td>
							<td><div class="cost"><a data-bind="attr:{href: PublicPath()+'/user/order-detail/'+$data.id}" style="color: #fff;" >Xem Chi Tiết</a></div></td>
						</tr>
						<!-- /ko -->
					</table>
				</div>
				<div class="table-responsive table-none2 wow fadeIn">
						<!-- ko foreach: Orders -->
					<table class="table checkout-table">
						<tr class="product-name">
							<td><div class="cost2"><span style="margin: 0px; padding: 0px;" data-bind="text: 'ID: '+ $data.id"> </div>
							</span></td>
							<td><div class="cost2"><span data-bind="text: 'Ngày đặt: '+ $data.created_at"></span></div></td>
            
               <td><div class="cost" style="background: #1e1c1c;">
                 <span style="font-size: 20px; color: #DDCA22;" data-bind="text: formatMoney($data.original_price)"></span>
               </div></td>
						</tr>

						<tr class="product-name">

							<td><div class="cost2"><span data-bind="text: $data.order_status.name"></span></div></td>
              <td colspan="2"><div class="cost"><a data-bind="attr:{href: PublicPath()+'/user/order-detail/'+$data.id}" style="color: #fff;" >Xem Chi Tiết</a></div></td>

						</tr>

					</table>
					<div class="clearfix"></div>
					<br>
					<!-- /ko -->
				</div>

        <div class="row fadeIn" style="padding-top: 20px; ">
          <div class="col-md-4 col-sm-4  wow fadeIn" style="font-style: italic;">
                 <span >Cần thêm thông tin giúp đỡ từ #SagittB. Xin liên hệ:</span><br>
                 <span >SĐT:0213812321 - Email: 03123@gmail.com</span>
          </div>
       </div>

			</div>
			<div class="clearfix"></div>

		</div>
		<!--table-->
		<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
@endsection

@section('script')

<script src="{{asset('page_asset/page-order.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var data = {};
		var options = {};

		data.OrderStatues = <?php echo json_encode($OrderStatues); ?>;

		options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
		options.PublicPath = <?php echo json_encode(url('')); ?>;
		options.GetOrders = <?php echo json_encode(url('user/getOrders')); ?>;

		data.API_URLs = options;

		ko.applyBindings(FormViewModel(data), document.getElementById("page-order"));
    });

</script>
@endsection
