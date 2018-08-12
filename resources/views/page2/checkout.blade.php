@extends('page2.layout.master')

@section('css')

@endsection


@section('content') 
 <!--page heading-->
        <section>
            <div class="inner-bg">
                <div class="inner-head wow fadeInDown">
                    <h3>TẠO ĐƠN HÀNG </h3>
                </div>
            </div>
        </section>
        <!--page heading-->
        <!--container-->
        <div id="page-checkout" class="container">
        <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
            <div class="shop-in">
                <!--breadcrumbs -->
                <div class="bread2">
                    <ul>
                        <li><a href="{{url('')}}">TRANG CHỦ</a>
                            <li>/</li>
                            <li>TẠO ĐƠN HÀNG</li>
                    </ul>
                </div>
                <!--breadcrumbs -->
                <div class="clearfix"> </div>
                <div class="checkout-boder">
                    <div class="row">
                        <!--left-side-->
                        <div class="col-md-6 col-sm-12 wow fadeIn">
                            <div class="left-bg">
                                <!-- ko foreach: Carts -->
                                <div class="check-img wow fadeIn">
                                          <div class="img-1"><img data-bind="attr: { src: ImagePath() + '/' + $data.image }" alt="" title="" class="img-responsive"></div>
                                          <div class="clearfix"></div>
                                </div>
                                <div class="title2 wow fadeIn">
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <div class="product-name" data-bind="text: $data.name"></div>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <h2 class="rate-css2" data-bind="text: formatMoney($data.price)"></h2>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- /ko -->
                                  
                            </div>
                           
                            <div class="clearfix"></div>
                            <div class="col-md-12 wow fadeIn">
                                <hr>
                                <div class="pull-left text-color">TẠM TÍNH</div>
                                <div class="pull-right"><strong data-bind="text: formatMoney(TempPrice())"></strong></div>
                                <div class="clearfix"> </div>
                                <hr>
                                <div class="clearfix"> </div>
                                <div class="pull-left text-color">PHÍ VẬN CHUYỂN </div>
                                <div class="pull-right"><strong>Thanh toán khi nhận hàng </strong></div>
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
                        <!--right-side-->
                        <div class="col-md-6 col-sm-12  wow fadeIn">
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
                                        <input type="checkbox"  data-bind="checked: isUseUserInfo"> SỬ DỤNG THÔNG TIN ĐĂNG NHẬP</div>
                                    <div class="clearfix"></div>
                                   
                                </div>
                                  @endif
                                 <div class="clearfix"></div>
                                <div class="double-b"></div>
                               
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
                                        <input type="text" placeholder="Tỉnh/Thành phố" data-bind="value: CustomerCity">
                                    </div>
                                </div>
                              
                                <div class="clearfix"></div>
                                <div class="double-b"></div>
                               
                                <div class="col-lg-12">
                                  
                                    <div class="clearfix"></div>
                                    <div class="buy-this"><a href="#" data-bind="click: checkout">THANH TOÁN</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
@endsection

@section('script') 

<script src="{{asset('page_asset/page-checkout.js')}}"></script>
<script type="text/javascript">
 $(document).ready(function() {
  var data = {};
  var options = {};
  data.Carts = <?php echo json_encode($Carts); ?>;
  data.User = <?php echo json_encode(Auth::check() ? Auth::user() : null); ?>;
  data.Colors = <?php echo json_encode($Colors); ?>;
  data.Sizes = <?php echo json_encode($Sizes); ?>;

  options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
  options.PublicPath = <?php echo json_encode(url('')); ?>;

 
  options.Checkout = <?php echo json_encode(url('checkoutPost')); ?>;
  options.ThankYou = <?php echo json_encode(url('thank-you')); ?>;

  data.API_URLs = options;

  ko.applyBindings(CheckoutViewModel(data), document.getElementById("page-checkout"));
});

</script>

@endsection