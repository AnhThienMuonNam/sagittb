@extends('page2.layout.master')

@section('css')
<style>
.gray-out{
  background: #eee;
}

.validationMessage{
  color: red;
  font-size: 12px;
}
</style>
@endsection


@section('content')

<!-- <section>
  <div class="inner-bg">
    <div class="inner-head wow fadeInDown">
      <h3>giỏ hàng</h3>
    </div>
  </div>
</section> -->
<!--page heading-->
<!--container-->
<div id="page-cart" class="container" style="padding-top: 60px;">
  <div class="shop-in">
    <!--breadcrumbs -->
    <div class="bread2">
      <ul>
        <li><a href="{{url('')}}">TRANG CHỦ</a>
          <li>/</li>
          <li>giỏ hàng</li>
        </ul>
    </div>
    <!--breadcrumbs -->
    <div class="clearfix"> </div>
    <!--table-->
    <div class="checkout">
      <!-- ko if: NotifySuccess -->
      <div class="alert alert-success">
          <span data-bind="html: NotifySuccess"></span>
      </div>
      <!-- /ko -->
       <!-- ko if: Carts().length == 0 && !NotifySuccess() -->
      <h3 style="text-align: center;">GIỎ HÀNG CỦA BẠN KHÔNG CÓ SẢN PHẨM NÀO</h3>
       <!-- /ko -->
      <!-- ko if: Carts().length > 0 -->
      <div class="table-responsive table-none wow fadeIn">
        <table class="table checkout-table">
          <tr class="table-h">
            <td colspan="2">SẢN PHẨM</td>
            <td>CHI TIẾT</td>
            <td>ĐƠN GIÁ x SỐ LƯỢNG</td>

            <td>TỔNG CỘNG</td>
                <td></td>
          </tr>
          <!-- ko foreach: Carts -->
          <tr >
            <td style="padding: 5px;" class="text-center"><img style="width: auto; height: 60px;" data-bind="attr: { src: $data.image() ? ImagePath() + '/' + $data.image() : ImagePath() + '/logo-right_cuted.png' }" alt="" title="" class="img-responsive"></td>
            <td class="product-name"><h1><a href="#" data-bind="html: $data.name(), attr:{href: PublicPath()+'/san-pham/'+$data.alias()+'/'+$data.id()}"></a>

            </h1> </td>

            <td class="product-name" style="text-align: left;">
              <span style="font-size: 14px;" data-bind="html: detailItem($data)"></span>
            </td>

            <td><div class="cost2"><span data-bind="text: formatMoney($data.price()/$data.quanlity())"></span></div>
              <hr>
              <div class="inc-dre">
              <div class="input-group"><span class="input-group-btn">
                <button type="button" class="btn btn-default btn-number" data-bind="click: minusItem"> <span class="glyphicon glyphicon-minus"></span> </button>
              </span>
              <input name="quant[1]" readonly class="input-number" type="text" data-bind="value: $data.quanlity()">
              <span class="input-group-btn">
                <button type="button" class="btn btn-default btn-number" data-bind="click: plusItem"> <span class="glyphicon glyphicon-plus"></span> </button>
              </span>  </div>
              </div>
            </td>

            <td><div class="cost" style="background: #1e1c1c;">
              <span style="font-size: 20px; color: #DDCA22;" data-bind="text: formatMoney($data.price())"></span>
            </div></td>
            <td class="remove-css text-center"><p><a href="#" data-bind="click: removeItem"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a> </p>
            </td>
          </tr>
          <!-- /ko -->
        </table>
      </div>
      <div class="table-responsive table-none2 wow fadeIn">
        <!-- ko foreach: Carts -->
        <table class="table checkout-table">
          <tr class="product-name">
            <td class="text-center">
              <img style="width: auto; height: 60px;" data-bind="attr: { src: ImagePath() + '/' + $data.image() }" alt="" title="" class="img-responsive">
            </td>
            <td >
              <div class="cost2">
                  <span data-bind="text: $data.name()"></span>
              </div>
            </td>
            <td colspan="2" >
              <span data-bind="html: detailItem($data)"></span>
          </td>
          </tr>

          <tr>
            <td>
                <div class="cost2">
                    <span data-bind="text: 'Đơn giá: ' + formatMoney($data.price()/$data.quanlity())"></span>
                </div>
            </td>
            <td>
              <div class="inc-dre">
                <div class="input-group">
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default btn-number" data-bind="click: minusItem"> <span class="glyphicon glyphicon-minus"></span> </button>
                  </span>
                  <input name="quant[1]" class="input-number" data-bind="value: $data.quanlity()" readonly type="text">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default btn-number" data-type="plus" data-bind="click: plusItem"> <span class="glyphicon glyphicon-plus"></span> </button>
                  </span>
                </div>
              </div>
            </td>

            <td><div class="cost" style="background: #1e1c1c;">
              <span style="font-size: 20px; color: #DDCA22;" data-bind="text: formatMoney($data.price())"></span>
            </div></td>

            <td><p class="text-center"> <a href="#" data-bind="click: removeItem"><i class="fa fa-trash-o" aria-hidden="true"></i><br></a>
            </p>
            </td>
          </tr>

        </table>
        <br>
        <!-- /ko -->
      </div>
      <!-- /ko -->
    </div>
    <div class="clearfix"></div>
    <br>
    <!-- ko if: Carts().length > 0 -->
    <div class="row">
      <div class="col-md-6 wow fadeIn">
        <div class="discount-div"> <!-- <span>Discount Code?</span> -->
         <!--  <input type="text" class="discount">
          <input type="button" value="APPLY" class="apply">
          <div class="clearfix"></div>
          <br> -->
          <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12 text-center"><img src="{{asset('images/products/icon.png')}}" alt="" title="" class="img-responsive"></div>
            <div class="col-md-10 shipping col-sm-10 col-xs-12">
              <h3>Giao hàng toàn quốc</h3>
              <h4>Lưu ý: Shop chỉ áp dụng ship COD tại Tp. Hồ Chí Minh</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 wow fadeIn">
        <div class="pull-left text-color">TẠM TÍNH</div>
        <div class="pull-right"><strong data-bind="text: formatMoney(TempPrice())"></strong></div>
        <div class="clearfix"> </div>
        <hr>
        <div class="clearfix"> </div>
        <div class="pull-left text-color">PHÍ VẬN CHUYỂN (nếu có)</div>
        <div class="pull-right"><strong>Thanh toán khi nhận hàng (Free ship khi mua trên 300 ngàn)</strong></div>
        <div class="clearfix"> </div>
        <hr>
        <div class="clearfix"> </div>
        <div class="pull-left text-color"> <strong>TỔNG CỘNG</strong> </div>
        <div class="pull-right"><strong data-bind="text: formatMoney(TempPrice())"></strong></div>
        <div class="clearfix"> </div>
        <hr>
        <br>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 col-sm-12  wow fadeIn">
        <div class="clearfix"> </div>
        <div class="right-form">
          <div class="col-lg-12">
            <div class="title-form">
              @if(!Auth::check())
              <h2>Thông tin khách hàng <span>(Nếu bạn đã có tài khoản)</span> </h2>
              <div class="login-bt"><a data-toggle="modal" href="" data-target="#myModalHorizontal">Đăng Nhập</a></div>
              @endif

              @if(Auth::check())
              <h2>Thông tin khách hàng </h2>
              @endif
            </div>
          </div>
          @if(Auth::check())
          <div class="col-lg-12">
            <div class="ship2">
              <input type="checkbox" data-bind="checked: isUseUserInfo"> SỬ DỤNG THÔNG TIN ĐĂNG NHẬP</div>
              <div class="clearfix"></div>
              <hr>
            </div>
            @endif
            <div class="clearfix"></div>
          @if(count($errors) > 0)
            <div class="alert alert-danger">
              @foreach($errors->all() as $error)
                {{$error}}<br>
              @endforeach
            </div>
            @endif
            <div data-bind="with: checkoutViewModel">
              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <input type="text" placeholder="Họ tên khách hàng" data-bind="value: CustomerName">
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <input type="text" placeholder="Số điện thoại" data-bind="value: CustomerPhone">
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <input type="text" placeholder="Email" data-bind="value: CustomerEmail">
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <input type="text" placeholder="Địa chỉ" data-bind="value: CustomerAddress">
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <input type="text" placeholder="Quận/Huyện" data-bind="value: CustomerDistrict">
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <select id="checkout-country" class="js-countries" data-bind="options: Cities, optionsText: 'name', optionsValue: 'id', value: CustomerCityId, optionsCaption: '-- Tỉnh/Thành phố --'">
                  </select>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="form-group">
                  <select id="checkout-country" class="js-countries"  data-bind="options: PaymentMethods, optionsText: 'name', optionsValue: 'id', value: CustomerPaymentMethodId, optionsCaption: '-- Hình thức thanh toán --',attr: { disabled: IsShipCod(), class: IsShipCod() ? 'gray-out': '', title: IsShipCod() ? 'Hiện tại cửa hàng chỉ áp dụng Thanh toán khi nhận hàng với khách hàng ở Tp. Hồ Chí Minh' : ''}">
                  </select>
                </div>
              </div>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="form-group">
                  <input type="text" placeholder="Ghi chú" data-bind="value: CustomerNote">
                </div>
              </div>
              <div class="clearfix"></div>
              <!-- ko if: CustomerPaymentMethodId() == 2 -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <span>Thông tin tài khoản thanh toán:</span><br>
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
              <div class="col-md-4 col-sm-4 col-xs-12" style="background-color: #eee;">
                <h2>Ngân hàng <span data-bind="text: BankName"></span> </h2>
                <p >Chủ tài khoản: <span data-bind="text: BankOwner"></span></p>
                <p >Số tài khoản: <span data-bind="text: BankNumber"></span></p>
                <p >Chi nhánh: <span data-bind="text: BankBrand"></span></p>

              </div>
                    <!-- /ko -->
                <div class="clearfix"></div>

                  <!-- /ko -->
                <hr>
            </div>
          </div>
          <div class="clearfix"></div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-6 ">
          <div class="subtotal">
              <div class="secure">
                <a href="checkout.html">Xem trước đơn hàng</a>
                <a href="#" data-bind="click: checkout">Xác nhận đặt hàng</a>
              </div>
          </div>
          <div class="clearfix"></div>
        </div>
    </div>
    <!-- /ko -->
    <div class="clearfix"></div>
    <div class="clearfix"></div>

  </div>
      <!--table-->
  <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
@endsection

@section('script')

<script src="{{asset('page_asset/page-cart.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
  var data = {};
  var options = {};
  data.Carts = <?php echo json_encode($Carts); ?>;

  data.Charms = <?php echo json_encode($Charms); ?>;
  data.Cities = <?php echo json_encode($Cities); ?>;
  data.PaymentMethods = <?php echo json_encode($PaymentMethods); ?>;
  data.Banks = <?php echo json_encode($Banks); ?>;
  data.SizeHats = <?php echo json_encode($SizeHats); ?>;


  data.User = <?php echo json_encode(Auth::check() ? Auth::user() : null); ?>;

  options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
  options.PublicPath = <?php echo json_encode(url('')); ?>;
  options.PlusItem = <?php echo json_encode(url('plusItem')); ?>;
  options.MinusItem = <?php echo json_encode(url('minusItem')); ?>;
  options.RemoveItem = <?php echo json_encode(url('removeItem')); ?>;
  options.Checkout = <?php echo json_encode(url('checkoutPost')); ?>;
  data.API_URLs = options;

  ko.applyBindings(FormViewModel(data), document.getElementById("page-cart"));
});

</script>
@endsection
