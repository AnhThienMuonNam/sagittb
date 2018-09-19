@extends('page2.layout.master')

@section('css')
<style type="text/css">

.centerOrderStatus {
    margin: auto;
    border: 1px solid #dfb859;
    padding: 10px;
}
</style>
@endsection


@section('content')


<div id="page-order-detail" class="container" style="padding-top: 60px;">
  <div class="shop-in">
    <!--breadcrumbs -->
    <div class="bread2">
      <ul>
        <li><a href="{{url('')}}">TRANG CHỦ</a>
          <li>/</li>
          <li><a href="{{url('user/orders')}}">Đơn hàng</a></li>
          <li>/</li>
          <li>Chi tiết đơn hàng</li>
        </ul>
      </div>
      <!--breadcrumbs -->
      <div class="clearfix"> </div>
      <!--table-->
      <div class="checkout">
       <div class="row fadeIn centerOrderStatus" style="background: #eee;">
        <ul style="text-align: center;">
          @foreach($OrderStatues as $key => $item)

          @if($item->id == $Order->order_status_id)
          <li style="display: inline-block; font-weight: bold; font-size: 20px;">{{$item->name}}</li>
          @elseif($key < count($OrderStatues)-1)
          <li style="display: inline-block; font-size: 20px;">{{$item->name}}</li>
          @endif

          @if($key < count($OrderStatues)-2)
          <li style="display: inline-block; padding-left:15px; padding-right:15px;">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
          </li>
          @endif

          @endforeach
        </ul>
      </div>

    <div class="row" style="padding-bottom: 30px; padding-top: 30px;">
      <div class="col-md-4 col-sm-4  wow fadeIn">

            <div class="panel panel-default">
  <label data-bind="text: 'ID đơn hàng: ' + Order().id"></label><br>
             <div class="panel-body">
               <span data-bind="text: Order().customer_name"></span><br>
                 <span data-bind="text: Order().customer_phone"></span><br>
                 <span data-bind="text: Order().customer_address + ', ' + Order().customer_district + ', ' + Order().customer_city"></span>

             </div>
           </div>
      </div>
      <div class="col-md-8 col-sm-8  wow fadeIn">
        <div class="subtotal" style="float: right;">
            <div class="secure">
              <a href="{{url('#huongdanthanhtoan')}}" target="_blank">Hướng dẫn thanh toán</a>

            </div>
        </div>

      </div>
   </div>


 <div class="table-responsive table-none wow fadeIn">

  <table class="table checkout-table">
    <tr class="table-h">
      <td colspan="2">Sản phẩm</td>
      <td>Chi tiết</td>
        <td>Đơn giá x Số lượng</td>
      <!-- <td>Số lượng</td> -->
      <td>Tổng cộng</td>
    </tr>
   <!-- ko foreach: OrderDetails -->
    <tr >
      <td style="padding: 3px;" class="text-center">
        <img style="width: auto; height: 60px;" data-bind="attr: { src: $data.product_image ? ImagePath() + '/' + $data.product_image : ImagePath() + '/logo-right_cuted.png' }" alt="" title="" class="img-responsive">
        </td>
      <td class="product-name" style="text-align: left;"><a data-bind="text: $data.product_name,  attr:{href: PublicPath()+'/san-pham/'+$data.product_alias+'/'+$data.product_id}"></a>

      </td>
      <td class="product-name" style="text-align: left;">
       <span style="font-size: 14px;" data-bind="html: detailItem($data)"></span>
      </td>
          <td><div class="cost2"><span data-bind="text: formatMoney($data.original_price/$data.quanlity)"></span></div>
            <hr>
            <div class="cost2"><span data-bind="text: $data.quanlity + ' sản phẩm'"></span></div></td>

  <td><div class="cost" style="background: #1e1c1c; "><span style="font-size: 20px; color: #DDCA22;" data-bind="text: formatMoney($data.original_price)"></span></div></td>
      </span></td>
    </tr>
    <!-- /ko -->
  </table>
</div>
<div class="table-responsive table-none2 wow fadeIn">
 <!-- ko foreach: OrderDetails -->
 <table class="table checkout-table">
  <tr class="product-name">
  <td class="text-center" >
        <img style="width: auto; height: 60px;" data-bind="attr: { src: ImagePath() + '/' + $data.product_image}" alt="" title="" class="img-responsive">
  </td>
  <td>
    <div class="cost2"><a data-bind="text: $data.product_name, attr:{href: PublicPath()+'/san-pham/'+$data.product_alias+'/'+$data.product_id}"></a>
    </div>
  </td>
  <td >
    <span style="margin: 0px;" data-bind="html: detailItem($data)"></span></td>
  </tr>
  <tr class="product-name">

  </tr>
  <tr class="product-name">
  <td colspan="2"><div class="cost2"><span data-bind="text: 'Đơn giá: ' + formatMoney($data.original_price/$data.quanlity) + ' x Số lượng: '+ $data.quanlity"></span></div></td>
  <td><div class="cost" style="background: #1e1c1c; "><span style="font-size: 20px; color: #DDCA22;" data-bind="text: formatMoney($data.original_price)"></span></div></td>
      </span></td>
  </tr>
</table>
<div class="clearfix"></div>
<br>
  <!-- /ko -->
</div>
</div>
<div class="clearfix"></div>
<div class="row" style="padding-bottom: 30px;">


  <div class="col-md-6 wow fadeIn">
    <div class="map-div wow fadeIn text-center">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
          <h5>Tài khoản thanh toán</h5>
          <div class="clearfix"> </div>
          <ul style="display: inline-flex;">
            <!-- ko foreach: Banks -->
                <li>
                  <div>
                  <a data-bind="click: ShowBankInfo">
                    <img style="width: 70px; height: auto; cursor: pointer;" data-bind="attr: { src: ImagePath() + '/' + $data.image }">
                  </a>
                  </div>
                </li>
            <!-- /ko -->
            </ul>
        </div>
      </div>
        <!-- ko if: IsVisibleBankDetail -->
      <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: #eee;">
        <h2>Ngân hàng <span data-bind="text: BankName"></span> </h2>
        <p >Chủ tài khoản: <span data-bind="text: BankOwner"></span></p>
        <p >Số tài khoản: <span data-bind="text: BankNumber"></span></p>
        <p >Chi nhánh: <span data-bind="text: BankBrand"></span></p>
      </div>
      <!-- /ko -->
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"> </div>
  </div>

      <div class="col-md-6 col-sm-12  wow fadeIn">
          <div class="form-horizontal">
          <div class="form-group">
              <div class="col-md-12 col-sm-7 col-xs-12" style="">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Dự kiến giao hàng </label>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <span data-bind="text: getEstimatedDelivary()"></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12 col-sm-7 col-xs-12" style="">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Hình thức thanh toán </label>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <span data-bind="text: Order().payment_method.name"></span>
                </div>
              </div>
            </div>
            <div class="form-group">
             <div class="col-md-12 col-sm-7 col-xs-12" style="">
             <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Phí vận chuyển </label>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                <span>---</span>
                </div>
              </div>
            </div>
            <div class="form-group">
             <div class="col-md-12 col-sm-7 col-xs-12" style="">
             <div class="col-md-6 col-sm-6 col-xs-6">
             <label>Tổng tiền đơn hàng </label>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                <span data-bind="text: formatMoney(Order().original_price)"></span>
                </div>

              </div>
            </div>
            <div class="form-group">
             <div class="col-md-12 col-sm-7 col-xs-12" style="">
             <div class="col-md-6 col-sm-6 col-xs-6">
             <label>Tình trạng thanh toán </label>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                <span data-bind="text: Order().is_paid ? 'Đã thanh toán' : 'Chưa thanh toán'"></span>
                </div>

              </div>
            </div>
          </div>
      </div>
   </div>
</div>

<!--table-->

<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
@endsection

@section('script')

<script src="{{asset('page_asset/page-order-detail.js')}}"></script>
 <script type="text/javascript">
     $(document).ready(function() {
      var data = {};
      var options = {};
      data.Order = <?php echo json_encode($Order); ?>;
      data.Banks = <?php echo json_encode($Banks); ?>;
      data.Pieces = <?php echo json_encode($Pieces); ?>;
      data.SizeHats = <?php echo json_encode($SizeHats); ?>;

      options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
      options.PublicPath = <?php echo json_encode(url('')); ?>;

      data.API_URLs = options;

      ko.applyBindings(FormViewModel(data), document.getElementById("page-order-detail"));
    });

</script>
@endsection
