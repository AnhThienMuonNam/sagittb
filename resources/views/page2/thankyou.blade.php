 @extends('page2.layout.master')


@section('content')
 <!--page heading-->
  <section>
    <div class="inner-bg">
      <div class="inner-head wow fadeInDown">
        <h3>ĐẶT HÀNG THÀNH CÔNG</h3>
      </div>
    </div>
  </section>
  <!--page heading-->
  <!--container-->
  <div class="container">
    <div class="shop-in">
      <div>
        <div class="bread2">
          <ul>
            <li><a href="{{url('')}}">TRANG CHỦ</a>
            <li>/</li>
            <li>ĐẶT HÀNG THÀNH CÔNG</li>
          </ul>
        </div>
      </div>
      <div class="clearfix"> </div>
      <div class="thanks-bg">
        <div class="thanks-img wow fadeIn"><img src="images/products/thanks.png" alt="" title="" class="img-responsive"></div>
        <div class="thanks-text">
          <h2 class="wow fadeIn">Cảm ơn bạn đã mua hàng tại cửa hàng chúng tôi</h2>
          <h3 class="wow fadeIn">Nội dung đơn hàng đã được gửi vào email của bạn</h3>
          <div><a href="{{url('')}}" class="wow fadeInLeft">Về trang chủ</a>  </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
  <!--container-->
  <div class="clearfix"></div>

  @endsection