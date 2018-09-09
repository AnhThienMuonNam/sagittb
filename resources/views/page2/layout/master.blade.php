<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
  <title>SagittB</title>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--all-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/default.css')}}" media="all" />
    <!--all-->
    <!--animate-->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!--animate-->
    <!--owlcarousel-Best Of Our Store and Popular Brands-->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" property="" />

    <link rel='stylesheet' href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/carousel/owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/carousel/owlcarousel/assets/owl.theme.default.min.css')}}">
    <!--owlcarousel-Best Of Our Store and Popular Brands-->
    <link rel="stylesheet" href="{{asset('css/alertify.css')}}" type="text/css" media="screen" property="" />
    <link rel="stylesheet" href="{{asset('css/nprogress.css')}}" type="text/css" media="screen" property="" />
    <style type="text/css">
    .main-section{
      width: 300px;
      position: fixed;
      right:50px;
      bottom:-350px;
    }
    .first-section:hover{
      cursor: pointer;
    }
    .open-more{
      bottom:0px;
      transition:0.5s;
    }
    .border-chat{
      /*border:1px solid #dfb859;*/
      margin: 0px;
    }
    .first-section{
      background-color:#dfb859;
    }
    .first-section p{
      color:#fff;
      margin:0px;
      padding: 10px 0px;
    }
    .first-section p:hover{
      color:#fff;
      cursor: pointer;
    }
    .right-first-section{
     text-align: right;
   }
   .right-first-section i{
    color:#fff;
    font-size: 15px;
    padding: 12px 3px;
  }
  .right-first-section i:hover{
    color:#fff;
  }
  .chat-section ul li{
    list-style: none;
    margin-top:10px;
    position: relative;
  }
  .chat-section{
    overflow-y:scroll;
    height:300px;
  }
  .chat-section ul{
    padding: 0px;
  }
  .left-chat img,.right-chat img{
    width:50px;
    height:50px;
    float:left;
    margin:0px 10px;
  }
  .right-chat img{
    float:right;
  }
  .second-section{
    padding: 0px;
    margin: 0px;
    background-color: #F3F3F3;
    height: 300px;
  }
  .left-chat,.right-chat{
    overflow: hidden;
  }
  .left-chat p,.right-chat p{
    background-color:#FD8468;
    padding: 10px;
    color:#fff;
    border-radius: 5px;
    float:left;
    width:60%;
    margin-bottom:20px;
  }
  .left-chat span,.right-chat span{
    position: absolute;
    left:70px;
    top:60px;
    color:#B7BCC5;
  }
  .right-chat span{
    left:45px;
  }
  .right-chat p{
    float:right;
    background-color: #FFFFFF;
    color:#FD8468;
  }
  .third-section{
    border-top: 1px solid #EEEEEE;
  }
  .text-bar input{
    width:90%;
    margin-left:-15px;
    padding:10px 10px;
    border:1px solid #fff;
  }
  .text-bar a i{
    background-color:#FD8468;
    color:#fff;
    width:30px;
    height:30px;
    padding:7px 0px;
    border-radius: 50%;
    text-align: center;
  }
  .left-chat:before{
    content: " ";
    position:absolute;
    top:0px;
    left:55px;
    bottom:150px;
    border:15px solid transparent;
    border-top-color:#FD8468;
  }
  .right-chat:before{
    content: " ";
    position:absolute;
    top:0px;
    right:55px;
    bottom:150px;
    border:15px solid transparent;
    border-top-color:#fff;
  }

  /*menu dropdown*/


  .dropdown_header {
    position: relative;
    display: inline-block;
  }

  .dropdown-content_header {
    display: none;
    position: absolute;
    background-color: rgba(0, 0, 0, .6);
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown-content_header a {
    color: black;
    padding: 5px 10px !important;
    text-decoration: none;
    display: block;
    font-size: 14px !important;
  }

  .dropdown-content_header a:hover {background-color: #ddd; margin: 0 0 0;}

  .dropdown_header:hover .dropdown-content_header {
    display: block;
  }

  /*end menu dropdown*/
</style>
@yield('css')


<!--searchbar-Top Header-->
<script src="{{asset('js/searchbar/js/modernizr.custom.js')}}"></script>
<!--searchbar-->
<!--library js-->
<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>

<!--library js-->
<!-- iosSlider plugin Main Slider -->
<script type="text/javascript" src = "{{asset('js/slider/jquery.easing-1.3.js')}}"></script>
<script src = "{{asset('js/slider/jquery.iosslider.js')}}"></script>
<!-- iosSlider plugin -->
<!--owlcarousel-Best Of Our Store and Popular Brands -->
<script src="{{asset('js/carousel/owlcarousel/owl.carousel.js')}}"></script>
<script src = "{{asset('js/owl-carousel.js')}}"></script>
<!--owlcarousel-->
<!--scrolltop-->
<!-- <script type="text/javascript" src="{{asset('js/scrolltopcontrol.js')}}"></script> -->
<!--scrolltop-->
</head>
<body>
  <div id="preloader"></div>
  <!--modal popup-->

<!--modal popup-->
<!--sidebar-->
<div id="page-master">
  <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
  <div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="height: auto;">
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Đóng</span></button>
          <h4 class="modal-title">Đăng Nhập</h4>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <form class="form-horizontal">
            <!-- ko if: NotifyErrors_master().length > 0 -->
              <div class="alert alert-danger">
                <!-- ko foreach: NotifyErrors_master -->
                <span data-bind="text: $data"></span>
                <!-- /ko -->
              </div>
            <!-- /ko -->
            <div class="form-group">
              <div class="col-sm-12">
                <input type="email" class="form-control" placeholder="Email" data-bind="value: userEmail_master"/>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <input type="password" class="form-control"  placeholder="Mật khẩu" data-bind="value: userPassword_master"/>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <button type="button" class="btn btn-default button-1" style=" font-weight: bold; border-radius: 6px;" data-bind="click: login_master">Đăng Nhập</button>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <div class="boder3"></div>
                <p><a href="" data-toggle="modal" data-dismiss="modal" data-target="#myModalHorizontal2">
                Đăng Ký Tài Khoản</a>&nbsp; |&nbsp;<a href="#" data-toggle="modal" data-dismiss="modal" data-target="#myModalHorizontal4">Quên Mật Khẩu</a></p>
                <div class="boder3"></div>
              </div>
            </div>
          </form>
        </div>
        <!-- Modal Footer -->
      </div>
    </div>
  </div>


 <div class="modal fade" id="myModalHorizontal2" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="height: auto;">
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close"
          data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Đóng</span></button>
          <h4 class="modal-title">Đăng Ký Tài Khoản</h4>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <form class="form-horizontal">
           <!-- ko if: NotifyCreateUserErrors_master().length > 0 -->
           <div class="alert alert-danger">
                <!-- ko foreach: NotifyCreateUserErrors_master -->
                <span data-bind="text: $data"></span>
                <!-- /ko -->
              </div>
            <!-- /ko -->
             <!-- ko if: NotifyCreateUserSuccess_master -->
           <div class="alert alert-success">
                <span data-bind="text: NotifyCreateUserSuccess_master"></span>
              </div>
            <!-- /ko -->
           <div class="form-group">
            <div class="col-sm-12">
              <input type="email" class="form-control"  placeholder="Họ và tên" data-bind="value: Name_master"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="email" class="form-control"  placeholder="Email" data-bind="value: Email_master"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="email" class="form-control"  placeholder="Số điện thoại" data-bind="value: Phone_master"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="password" class="form-control"  placeholder="Mật khẩu" data-bind="value: Password_master"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="password" class="form-control"  placeholder="Nhập lại mật khẩu" data-bind="value: Passwordx2_master"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-default button-1" style=" font-weight: bold;
               border-radius: 6px; " data-bind="click: createUser_master">Tạo Tài Khoản</button>
            </div>
          </div>
        </form>
      </div>
      <!-- Modal Footer -->
    </div>
  </div>
</div>


<div class="modal fade" id="myModalHorizontal4" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="height: auto;">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close"
        data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Đóng</span></button>
        <h4 class="modal-title">Quên Mật Khẩu</h4>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form class="form-horizontal">
          <!-- ko if: NotifySendEmailResetPasswordError -->
          <div class="alert alert-danger">
                <span data-bind="text: NotifySendEmailResetPasswordError"></span>
              </div>
            <!-- /ko -->
              <!-- ko if: NotifySendEmailResetPasswordSuccess -->
           <div class="alert alert-success">
                <span data-bind="text: NotifySendEmailResetPasswordSuccess"></span>
              </div>
            <!-- /ko -->
          <div class="form-group">
            <div class="col-sm-12">
              <input type="email" class="form-control"  placeholder="Email" data-bind="value: EmailResetPassword"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-default button-1" style=" font-weight: bold;
              border-radius: 6px" data-bind="click: sendEmailResetPassword">Xác Nhận</button>
            </div>
          </div>
        </form>
      </div>
      <!-- Modal Footer -->
    </div>
  </div>
</div>



  <div id="push_sidebar">
    <div class="right-logo"><a href="{{url('')}}"><img src="{{asset('images/logo-right.png')}}" class="img-responsive" alt="jewellery" title="jewellery"></a></div>
    <ul class="list-unstyled">
      <!-- <li class="active"><a href="{{url('')}}">TRANG CHỦ</a></li> -->
      <li><a href="{{url('about-us')}}" style="text-transform;">Về Chúng Tôi</a></li>
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-transform;">Sản Phẩm</a>
        <ul class="dropdown-menu">
          @foreach($MenuCategories as $item)
          <li><a href="{{url('danh-muc/'.$item->alias.'/'.$item->id)}}" style="">{{$item->name}}</a></li>
          @endforeach
        </ul>
      </li>
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-transform;">Chính Sách</a>
        <ul class="dropdown-menu">
          <li><a href="{{url('guarantee-policy')}}">Bảo hành</a></li>
          <li><a href="{{url('shipping-policy')}}">Giao hàng</a></li>

        </ul>
      </li>
        <li><a href="#" >Hướng Dẫn</a></li>
      <li><a href="#" >Blog</a></li>
      <!-- <li><a href="contact-us.html">LIÊN HỆ</a></li> -->
      @if(!Auth::check())
      <li class="sign-in">
        <input type="button" value="Đăng Nhập" data-toggle="modal" data-target="#myModalHorizontal" >
        
        <input  value="Đăng Ký"  type="button" data-toggle="modal" data-target="#myModalHorizontal2" >
      </li>
      @endif
      @if(Auth::check())
      <li class="sign-in">
        <input type="button" value="Đăng xuất" data-bind="click: logout_master" >
      </li>
      @endif
    </ul>
    <br>
    <div class="social-network social-circle text-right"><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a><a href="#" class="icoGoogle" title="Instagram +"><i class="fa fa-instagram"></i></a></div>
  </div>
  <!--sidebar-->
  <!--nav-->
  <nav class="navbar navbar-custom navbar-fixed-top">
    <div class="navbar-header"> <a class="navbar-brand" href="{{url('')}}"> <img class="img-responsive" alt="" title="" src="{{asset('images/logo.png')}}"> </a> </div>
    <span class="nav_trigger"><i class="fa fa-navicon"></i></span>
    <ul class="navbar-nav2">
      <li class="search-div">
        <div id="sb-search" class="sb-search">
          <form>
            <input class="sb-search-input"  placeholder="Search" type="text" value="" name="search" id="search">
            <input class="sb-search-submit" type="submit" value="">
            <span class="sb-icon-search"></span>
          </form>
        </div>
      </li>
      <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <!-- <span class="round" >7</span> --></a> </li>
      @if(Auth::check())
      <li>
       <div class="dropdown_header">
        <span style="color: #fff;margin: 0 10px 0;padding: 0;display: block;font-size: 14px; text-transform: lowercase;">
        {{Auth::user()->name}} <i class="fa fa-angle-down" aria-hidden="true"></i>
        </span>
        <div class="dropdown-content_header">
          <a href="{{url('user/profile')}}">TÀI KHOẢN</a>
          <a href="{{url('user/orders')}}">ĐƠN HÀNG</a>
          <a href="{{url('user/wish-list')}}">YÊU THÍCH</a>
        </div>
      </div>
    </li>
    @endif

  </ul>
</nav>
</div>
<!--nav-->
<div id="wrapper">


  @yield('content')

  <!--footer-->




<!--   <div class="main-section" style="z-index: 99999;">
    <div class="row border-chat">
      <div class="col-md-12 col-sm-12 col-xs-12 first-section">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-6 left-first-section">
            <p>Chat</p>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-6 right-first-section">
            <a href="#"><i class="fa fa-minus" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-clone" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row border-chat">
      <div class="col-md-12 col-sm-12 col-xs-12 second-section">
        <div class="chat-section">
          <ul>
            <li>
              <div class="left-chat">
                <img src="/demo/man01.png">
                <p>Lorem ipsum dolor sit ameeserunt.
                </p>
                <span>2 min</span>
              </div>
            </li>
            <li>
              <div class="right-chat">
                <img src="/demo/man02.png">
                <p>Lorem ipsum dolor sit ameeserunt.</p>
                <span>2 min</span>
              </div>
            </li>
            <li>
              <div class="left-chat">
                <img src="/demo/man01.png">
                <p>Lorem ipsum dolor sit ameeserunt.</p>
                <span>2 min</span>
              </div>
            </li>
            <li>
              <div class="right-chat">
                <img src="/demo/man02.png">
                <p>Lorem ipsum dolor sit ameeserunt.</p>
                <span>2 min</span>
              </div>
            </li>
            <li>
              <div class="left-chat">
                <img src="/demo/man01.png">
                <p>Lorem ipsum dolor sit ameeserunt.</p>
                <span>2 min</span>
              </div>
            </li>
            <li>
              <div class="right-chat">
                <img src="/demo/man02.png">
                <p>Lorem ipsum dolor sit ameeserunt.</p>
                <span>2 min</span>
              </div>
            </li>
            <li>
              <div class="left-chat">
                <img src="/demo/man01.png">
                <p>Lorem ipsum dolor sit ameeserunt.</p>
                <span>2 min</span>
              </div>
            </li>
            <li>
              <div class="right-chat">
                <img src="/demo/man02.png">
                <p>Lorem ipsum dolor sit ameeserunt.</p>
                <span>2 min</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row border-chat">
      <div class="col-md-12 col-sm-12 col-xs-12 third-section" style="background: white;">
        <div class="text-bar">
          <input type="text" placeholder="Write messege"><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </div>

-->

<div class="footer-css">
  <div class="newsletter wow fadeIn" style="padding: 15px 10px 8px;"></div>
  <div class="clearfix"></div>
  <div class="footer-in">
    <div class="col-md-3 col-sm-3  wow fadeIn" data-wow-delay=".1s">
      <div class="logo-f"><img src="{{asset('images/logo-2.png')}}" alt="" title="" ></div>
      <div class="about-b">
        <div class="footer-text">
          <p>Shop trang sức đá quý </p> </div>
      </div>

      <div class="clearfix"></div>
      <ul class="social2">
        <li style="text-transform: lowercase;"> Follow Us on : </li>
        <li><a href="#" class="icoFacebook" title="facebook"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#" class="icoTwitter" title="instagram"><i class="fa fa-instagram"></i></a></li>
      </ul>
      <div class="clearfix"></div>
      <br>
    </div>
    <div class="col-md-3 col-sm-3 link-footer  wow fadeIn" data-wow-delay=".2s">
      <h2 style="text-transform;">Giới Thiệu</h2>
      <ul class="pull-left">
        <li><a href="{{url('about-us')}}"> <i class="fa fa-stop" aria-hidden="true"></i> Về Chúng Tôi</a></li>
        <li><a href="{{url('shipping-policy')}}"><i class="fa fa-stop" aria-hidden="true"></i> Chính Sách Giao Hàng</a></li>
        <li><a href="{{url('guarantee-policy')}}"><i class="fa fa-stop" aria-hidden="true"></i> Chính Sách Bảo Hành</a></li>
        <li><a href="{{url('guarantee-policy')}}"><i class="fa fa-stop" aria-hidden="true"></i> Hướng Dẫn</a></li>
        <li><a href="#"><i class="fa fa-stop" aria-hidden="true"></i> Blog</a></li>
        <!-- <li><a href="privacy.html"><i class="fa fa-stop" aria-hidden="true"></i> Liên hệ</a></li> -->
        <li><a href="{{url('admin')}}" target="_blank"><i class="fa fa-stop" aria-hidden="true"></i> Admin</a></li>
        <!-- <li><a href="contact-us.html"><i class="fa fa-stop" aria-hidden="true"></i> Contact Us</a></li> -->
      </ul>
      <div class="clearfix"></div>
    </div>
      <div class="col-md-3 col-sm-3 wow fadeIn footer-address" data-wow-delay=".3s">
        <h2 style="text-transform;">Thanh Toán</h2>
        <ul>

          <li><i class="fa fa-money" aria-hidden="true"></i> Ngân Hàng: ACB </li>
          <li><i class="fa fa-circle" aria-hidden="true"></i> Chi Nhánh: Tân Bình</li>
          <li><i class="fa fa-credit-card" aria-hidden="true"></i> Số Tài Khoản: 0761-4031437</li>
          <li><i class="fa fa-user" aria-hidden="true"></i> CTK: Triệu Xuân Thiện</li>


        </ul>

        <div class="clearfix"></div>

      </div>
      <div class="col-md-3 col-sm-3 footer-address wow fadeIn" data-wow-delay=".4s">
        <h2 style="text-transform;">Cửa Hàng</h2>
        <ul>
          <li><i class="fa fa-map-marker" aria-hidden="true"></i> 127/2/77  Bình Lợi, Phường 13, Bình Thạnh, HCM </li>
          <li><i class="fa fa-phone" aria-hidden="true"></i> 0935060818</li>
          <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="instagram.com/sagittarius_bijou">instagram.com/sagittarius_bijou</a></li>
          <li><i class="fa fa-clock-o" aria-hidden="true"></i> 9:00pm - 5:00pm<br>
          Sunday Closed </li>
        </ul>
        <div class="clearfix"></div>
      </div>


      <div class="col-md-12 col-sm-12 footer-address wow fadeIn" data-wow-delay=".4s">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5054610524935!2d106.69585261457188!3d10.77254509232414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3f3129e64d%3A0x8d6b2d79522c7f30!2zQ2jhu6MgQuG6v24gVGjDoG5o!5e0!3m2!1svi!2sid!4v1531477913149" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="copyright">
      <div class="footer-in">
        <div class="pull-left">
          ©  2018. <a href="{{url('')}}">Design By Triệu Xuân Thiện</a>
        </div>
        <div class="pull-right">
          <!-- Lovingly Crafted By <a href="http://srgit.com/" target="_blank">SRGIT</a>  -->
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<p data-toggle="modal" class="no-margin" data-target="#myModal" id="model2"></p>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span> <span class="sr-only">Close</span> </button>
        <h4 class="modal-title"></h4>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <h1 class="modal-title text-center">Thank You</h1>
        <form class="form-horizontal">
          <h4 class="text-center">We will get back to you as soon as possible.</h4>
        </form>
      </div>
      <!-- Modal Footer -->
    </div>
  </div>
</div>
<!--themes js-->
<script src="{{asset('js/ajax.js')}}"></script>
<script src="{{asset('js/formValidation.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!--themes js-->
<!--searchbar-Top Header-->
<script src="{{asset('js/classie.js')}}"></script>
<script src="{{asset('js/uisearch.js')}}"></script>
<!--searchbar-->
<!--all script-->
<script src = "{{asset('js/all.js')}}"></script>
<!--all script-->
<!--wow animate-->
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/animate1.js')}}"></script>
<!--wow animate-->
<script src="{{asset('js/knockout-3.4.2.js')}}"></script>
<script src="{{asset('js/knockout.validation.min.js')}}"></script>

<script src="{{asset('js/alertify.min.js')}}"></script>
<script src="{{asset('js/nprogress.js')}}"></script>
<script src="{{asset('js/jquery.flexslider.js')}}"></script>

@yield('script')

<script src="{{asset('page_asset/page-master.js')}}"></script>
<script type="text/javascript">
 $(document).ready(function() {

  $(".left-first-section").click(function(){
    $('.main-section').toggleClass("open-more");
  });

  $(".fa-minus").click(function(){
    $('.main-section').toggleClass("open-more");
  });
  var data = {};
  var options = {};

  options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
  options.PublicPath = <?php echo json_encode(url('')); ?>;
  options.Login_master = <?php echo json_encode(url('login')); ?>;
  options.Logout_master = <?php echo json_encode(url('logout')); ?>;
  options.CreateUser_master = <?php echo json_encode(url('createUser')); ?>;
  options.SendEmailResetPassword = <?php echo json_encode(url('sendEmailResetPassword')); ?>;

  data.API_URLs = options;

  ko.applyBindings(MasterViewModel(data), document.getElementById("page-master"));
});

</script>
</body>
</html>
