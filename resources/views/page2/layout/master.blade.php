<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="{{asset('public/favicon.png')}}">
  <title>SagittB Trang sức đá quý phong thủy, thuần tự nhiên</title>
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

      <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">

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

  /* start css new product */

  .flex-sp-moi .col-md-3.col-sm-3.col-xs-6.text-center{
    float: none !important;
  }

  .datepicker.datepicker-dropdown.dropdown-menu {
      position: absolute !important;
      background: white;
  }
  /* end css new product*/

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
  <!-- <div id="preloader"></div> -->
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
              <input type="email" class="form-control"  placeholder="Email*" data-bind="value: Email_master"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="email" class="form-control"  placeholder="Số điện thoại" data-bind="value: Phone_master"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="password" class="form-control"  placeholder="Mật khẩu*" data-bind="value: Password_master"/>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-default button-1" style=" font-weight: bold;
               border-radius: 6px; " data-bind="click: createUser_master">Đăng ký tài khoản</button>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="boder3"></div>
              <p><a href="" data-toggle="modal" data-dismiss="modal" data-target="#myModalHorizontal">Đăng nhập</a></p>
              <div class="boder3"></div>
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


<div class="modal fade" id="canchiModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="height: auto;">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Đóng</span></button>
        <h4 class="modal-title">Xem Can Chi</h4>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <div class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-12">
              <select class="form-control" style="padding-bottom:0px; padding-top:0px; border: solid 1px #abadb3; height: 35px;line-height: 35px;"
              data-bind="options: HoursRange, optionsCaption:'-- Chọn giờ --', optionsText: 'value', optionsValue: 'id', value: Hour_master"> </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12" >
              <input type="text" readonly placeholder="Ngày tháng năm" id="sFromDate1_master" class="form-control mydatepicker" data-bind="event :{change: changeSFromDate1 }">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <button type="button" class="btn btn-default button-1" style="font-weight: bold; border-radius: 6px;" data-bind="click: calculateCanchi">Kêt quả</button>
            </div>
          </div>
            <!-- ko if: IsShowMoreButton() == true -->
          <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <p><span style="font-weight: bold;">Giờ: </span>&nbsp;<span data-bind="text: HourCanchi_master"></span></p>
              <p><span style="font-weight: bold;">Ngày: </span>&nbsp;<span data-bind="text: DayCanchi_master"></span></p>
              <p><span style="font-weight: bold;">Tháng: </span>&nbsp;<span data-bind="text: MonthCanchi_master"></span></p>
              <p><span style="font-weight: bold;">Năm: </span>&nbsp;<span data-bind="text: YearCanchi_master"></span></p>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-xs-12">
                <a data-bind="attr:{href: FilterProduct_master()+'/'+LunarYearTag_master()}" target="_blank" class="btn btn-default button-1 col-xs-12" style="font-weight: bold; border-radius: 6px; color: #fff; ">Xem s/p liên quan</a>
            </div>
              <!-- ko if: IsShowLogin_master() == false && IsShowRegister_master() == false-->
            <div class="col-md-6 col-xs-12">
                <a href="#" data-bind="click: TuVanButton" class="btn btn-default button-1 col-xs-12" style="font-weight: bold; border-radius: 6px; color: #fff;">Tư vấn miễn phí</a>
            </div>
              <!-- /ko -->

          </div>

            <!-- ko if: IsShowRegister_master() == true -->
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
                <hr/>
                <a href="https://www.facebook.com/messages/t/SagittB" target="_blank" style="font-weight: bold;">*Ghi chú: Bấm vào đây nếu hệ thống không chuyển tới trang tư vấn.</a>
              </div>
            <!-- /ko -->

          <div class="form-group">
            <div class="col-sm-12">
              <input type="email" class="form-control"  placeholder="Email*" data-bind="value: Email_master"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="email" class="form-control"  placeholder="Số điện thoại" data-bind="value: Phone_master"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="password" class="form-control"  placeholder="Mật khẩu*" data-bind="value: Password_master"/>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-default button-1" style=" font-weight: bold;
               border-radius: 6px; " data-bind="click: createUser_master_tuvan">Đăng ký tài khoản</button>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="boder3"></div>
              <p><a href="#" data-bind="click: ShowLoginModal_master">Đăng nhập</a></p>
              <div class="boder3"></div>
            </div>
          </div>
        </form>
  <!-- /ko -->

  <!-- ko if: IsShowLogin_master() == true -->

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
              <button type="button" class="btn btn-default button-1" style=" font-weight: bold; border-radius: 6px;" data-bind="click: login_master_tuvan">Đăng Nhập</button>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="boder3"></div>
              <p><a href="#" data-bind="click: ShowRegisterModal_master">
              Đăng Ký Tài Khoản</a></p>
              <div class="boder3"></div>
            </div>
          </div>
        </form>
          <!-- /ko -->

          <!-- /ko -->

        </div>
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
        <li><a href="{{url('guarantee-policy')}}" >Hướng Dẫn</a></li>
      <li><a href="{{url('blog')}}" >Blog</a></li>
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
    <div class="social-network social-circle text-right">
      <a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a>
      <a href="https://www.instagram.com/sagittarius_bijou/" target="_blank" class="icoFacebook" title="Instagram"><i class="fa fa-instagram"></i></a>
      <a  href="https://www.facebook.com/SagittB" target="_blank" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a>
      <a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a>
    </div>
  </div>
  <!--sidebar-->
  <!--nav-->
  <nav class="navbar navbar-custom navbar-fixed-top">
    <div class="navbar-header"> <a class="navbar-brand" href="{{url('')}}"> <img class="img-responsive" alt="" title="" src="{{asset('images/logo.png')}}"> </a> </div>
    <span class="nav_trigger"><i class="fa fa-navicon"></i></span>
    <ul class="navbar-nav2">
      <!-- <li class="search-div">
        <div id="sb-search" class="sb-search">
          <form>
            <input class="sb-search-input"  style="border-radius: 7px;" placeholder="Tìm kiếm theo Tag" type="text" value="" name="search" id="search">
            <a href="{{url('filter/')}}" class="sb-search-submit"></a>
            <span class="sb-icon-search"></span>
          </form>
        </div>
      </li> -->
        <li><a href="#"  data-toggle="modal" data-dismiss="modal" data-target="#canchiModal"><i class="fa fa-calendar" aria-hidden="true"></i> Tư vấn</a> </li>
      <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <!-- <span class="round" >7</span> --></a> </li>
      @if(Auth::check())
      <li>
       <div class="dropdown_header">
        <span style="color: #fff;margin: 0 10px 0;padding: 0;display: block;font-size: 14px;">
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

  <!-- <div class="main-section" style="z-index: 99999;">
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
  </div> -->


<div class="footer-css">
  <div class="newsletter wow fadeIn">
      <div class="container">
        <div class="p-color-bg">
          <div class="text float-left"> <i class="fa fa-envelope" aria-hidden="true"></i>
            <h2><span>Đăng ký</span> với chúng tôi</h2>
            <p>Điền email của bạn vào đây để nhận được tư vấn miễn phí về ngũ hành sức khỏe</p>
          </div>
          <!-- /.text -->
          <div class="float-right">
            <form action="" method="post" id="subsForm" onSubmit="return ajaxmailsubscribe();">
              <input placeholder="Your Email Address" type="email" name="subsemail" id="subsemail">
              <button class="theme-button"  type="button" value="SUBSCRIBE" onClick="return ajaxmailsubscribe();"> <i class="fa fa-angle-right" aria-hidden="true"></i></button>
              <!--<input class="theme-button"/><i class="fa fa-angle-right" aria-hidden="true"></i>-->
              <!--<button class="theme-button"><i class="fa fa-angle-right" aria-hidden="true"></i></button>-->
            </form>
          </div>
          <!-- /.float-right -->
          <div class="clear-fix"></div>
        </div>
        <!-- /.bg -->
      </div>
      <!-- /.container -->
    </div>
  <div class="clearfix"></div>
  <div class="footer-in">

    <div class="col-md-3 col-sm-3 footer-address wow fadeIn" data-wow-delay=".2s">
        <div class="logo-f"><img src="{{asset('images/logo-2.png')}}" alt="" title="" ></div>
      <ul class="pull-left">
        <li style="display: inline;"><a href="https://www.facebook.com/SagittB" target="_blank" title="Facebook"> <p style="font-size: 27px; padding:10px;" class="fa fa-facebook"></p></a></li>
        <li style="display: inline;"><a href="https://www.instagram.com/sagittarius_bijou/" target="_blank" title="Instagram"> <p style="font-size: 27px; padding:10px;" class="fa fa-instagram"></p></a></li>
        <li style="display: inline;"><a href="https://www.facebook.com/SagittB" target="_blank" title="Youtube"> <p style="font-size: 27px; padding:10px;" class="fa fa-youtube"></p></a></li>
        <li style="display: inline;"><a href="https://www.instagram.com/sagittarius_bijou/" target="_blank"  title="Pinterest"><p style="font-size: 27px; padding:10px;" class="fa fa-pinterest"></p></a></li>
        <li style="display: inline;"><a href="https://www.facebook.com/SagittB" target="_blank" title="Google"><p style="font-size: 27px; padding:10px;" class="fa fa-google-plus"></p></a></li>
        <li style="display: inline;"><a href="https://www.facebook.com/SagittB" target="_blank" title="Store"><p style="font-size: 27px; padding:10px;" class="fa fa-map-marker"></p></a></li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="col-md-3 col-sm-3 footer-address wow fadeIn" data-wow-delay=".2s">
      <h2 style="text-transform; margin-left: 26px;">Giới Thiệu</h2>
      <ul class="pull-left">
        <li><a href="{{url('about-us')}}"> <i class="fa fa-leaf" aria-hidden="true"></i> Về chúng tôi</a></li>
        <li><a href="{{url('shipping-policy')}}"><i class="fa fa-truck" aria-hidden="true"></i> Chính sách giao hàng</a></li>
        <li><a href="{{url('guarantee-policy')}}"><i class="fa fa-fire" aria-hidden="true"></i> Bộ sưu tập</a></li>
        <li><a href="{{url('guarantee-policy')}}"><i class="fa fa-key" aria-hidden="true"></i> Hướng Dẫn</a></li>
        <li><a href="{{url('blog')}}"><i class="fa fa-pagelines" aria-hidden="true"></i> Blog</a></li>

      </ul>
      <div class="clearfix"></div>
    </div>
      <div class="col-md-3 col-sm-3 wow fadeIn footer-address" data-wow-delay=".3s">
        <h2 style="text-transform; margin-left: 26px;">Liên hệ</h2>
        <ul style="margin-left: 12px ">
          <li><i class="fa fa-map-marker" aria-hidden="true"></i> 127/2/77 Bình Lợi, P.13, Bình Thạnh</li>
          <li style="margin-left: 41px;">Hồ Chí Minh </li>
          <li><i class="fa fa-phone" aria-hidden="true"></i> 0935060818</li>
          <li><i class="fa fa-clock-o" aria-hidden="true"></i> 9:00 AM - 9:00 PM <br> </li>
          <li><i class="fa fa-asterisk" aria-hidden="true"></i> Tư vấn miễn phí <br> </li>
        </ul>
        <div class="clearfix"></div>

      </div>
      <div class="col-md-3 col-sm-3 wow fadeIn footer-address" data-wow-delay=".4s">
         <ul style="margin-left: 12px ">
           <div class="col-md-12 col-sm-12 footer-address wow fadeIn" data-wow-delay=".4s">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d19187.28594518461!2d106.70251474263925!3d10.826581343659488!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xadc56f4c6fbaeeda!2sSagittB!5e0!3m2!1sen!2sid!4v1544457730563" width="100%" height="230" frameborder="0" style="border:0" allowfullscreen></iframe>
              <div class="clearfix"></div>
          </div>
          </ul>
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

<!-- datepicker -->
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>

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

  $('.mydatepicker').datepicker({
    autoclose: true
  })

  var data = {};
  var options = {};
  data.CurrentUser = <?php echo json_encode(Auth::check() ? Auth::user() : null); ?>;

  options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
  options.PublicPath = <?php echo json_encode(url('')); ?>;
  options.Login_master = <?php echo json_encode(url('login')); ?>;
  options.Logout_master = <?php echo json_encode(url('logout')); ?>;
  options.CreateUser_master = <?php echo json_encode(url('createUser')); ?>;
  options.SendEmailResetPassword = <?php echo json_encode(url('sendEmailResetPassword')); ?>;
  options.FilterProduct_master = <?php echo json_encode(url('filter')); ?>;

  data.API_URLs = options;

  ko.applyBindings(MasterViewModel(data), document.getElementById("page-master"));
});

</script>
</body>
</html>
