<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> @yield('headerTitle') - SagittB</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="https://www.w3schools.com/images/colorpicker.gif">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('css/_adminbootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/nprogress.css')}}">
  <link rel="stylesheet" href="{{asset('css/alertify.min.css')}}" type="text/css" media="screen" property="" />
  @yield('css')

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    <header class="main-header">
      <a href="#" class="logo">
        <span class="logo-mini">SB</span>
        <span class="logo-lg">SagittB</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            @if(Auth::check())
            <li class="user user-menu">
              <a href="{{url(config('constants.ADMIN_PREFIX').'/account/'.Auth::user()->id)}}">
                <strong>
                  <span class="hidden-xs">{{Auth::user()->name}}</span></strong>
              </a>
            </li>
            <li class="user user-menu">
              <a href="{{url(config('constants.ADMIN_PREFIX').'/logout')}}">
                <span class="hidden-xs">Đăng xuất</span>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Menu</li>
          @if(\AppHelper::instance()->hasPermission('ORDER_LIST'))
          <li id="treeOrder">
            <a href="{{url(config('constants.ADMIN_PREFIX').'/order')}}">
              <i class="fa fa-cart-arrow-down"></i> <span>Đơn hàng</span>
            </a>
          </li>
          @endif
          @if(\AppHelper::instance()->hasPermission('ORDER_ADD'))
          <li id="treeOrderAdd">
            <a href="{{url(config('constants.ADMIN_PREFIX').'/order/create')}}">
              <i class="fa fa-plus"></i> <span>Tạo Đơn hàng</span>
            </a>
          </li>
          @endif
          <li id="treeCategory" class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Danh mục</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @if(\AppHelper::instance()->hasPermission('CATEGORY_LIST'))
              <li id="tabCategoryList"><a href="{{url(config('constants.ADMIN_PREFIX').'/category')}}"><i class="fa fa-list"></i> Danh sách Danh mục</a></li>
              @endif
              @if(\AppHelper::instance()->hasPermission('CATEGORY_ADD'))
              <li id="tabCategoryCreate"><a href="{{url(config('constants.ADMIN_PREFIX').'/category/create')}}"><i class="fa fa-plus"></i> Thêm Danh mục</a></li>
              @endif
            </ul>
          </li>
          <li id="treeProduct" class="treeview ">
            <a href="#">
              <i class="fa fa-table"></i> <span>Sản phẩm</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @if(\AppHelper::instance()->hasPermission('PRODUCT_LIST'))
              <li id="tabProductList"><a href="{{url(config('constants.ADMIN_PREFIX').'/product')}}"><i class="fa fa-list"></i> Danh sách Sản phẩm</a></li>
              @endif
              @if(\AppHelper::instance()->hasPermission('PRODUCT_ADD'))
              <li id="tabProductCreate"><a href="{{url(config('constants.ADMIN_PREFIX').'/product/create')}}"><i class="fa fa-plus"></i> Thêm Sản phẩm</a></li>
              @endif
            </ul>
          </li>

          <li id="treeUser" class="treeview">
            <a href="#">
              <i class="fa fa-id-card"></i> <span>Account</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul id="treeUser" class="treeview-menu">
              @if(\AppHelper::instance()->hasPermission('ACCOUNT_LIST'))
              <li id="tabUserList"><a href="{{url(config('constants.ADMIN_PREFIX').'/account')}}"><i class="fa fa-list"></i> Danh sách Tài khoản</a></li>
              @endif
              @if(\AppHelper::instance()->hasPermission('ACCOUNT_ADD'))
              <li id="tabUserCreate"><a href="{{url(config('constants.ADMIN_PREFIX').'/account/create')}}"><i class="fa fa-plus"></i> Thêm Tài khoản</a></li>
              @endif
              @if(\AppHelper::instance()->hasPermission('OWNER'))
              <li id="tabUserPermissions"><a href="{{url(config('constants.ADMIN_PREFIX').'/permissions')}}"><i class="fa fa-get-pocket"></i> Phân quyền</a></li>
              @endif
            </ul>
          </li>
          <li id="treeBlog" class="treeview">
            <a href="#">
              <i class="fa fa-id-card"></i> <span>Blog</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @if(\AppHelper::instance()->hasPermission('BLOG_LIST'))
              <li id="tabBlogList"><a href="{{url(config('constants.ADMIN_PREFIX').'/blog')}}"><i class="fa fa-list"></i> Danh sách Bài viết</a></li>
              @endif
              @if(\AppHelper::instance()->hasPermission('BLOG_ADD'))
              <li id="tabBlogCreate"><a href="{{url(config('constants.ADMIN_PREFIX').'/blog/create')}}"><i class="fa fa-plus"></i> Thêm Bài viết</a></li>
              @endif
            </ul>
          </li>
          <li id="treeSetting" class="treeview">
            <a href="#">
              <i class="fa fa-cog"></i> <span>Khác</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @if(\AppHelper::instance()->hasPermission('PIECE_LIST'))
              <li id="tabSettingPiece"><a href="{{url(config('constants.ADMIN_PREFIX').'/piece')}}"><i class="fa fa-circle"></i>Đá</a></li>
              @endif
              @if(\AppHelper::instance()->hasPermission('CHARM_LIST'))
              <li id="tabSettingCharm"><a href="{{url(config('constants.ADMIN_PREFIX').'/charm')}}"><i class="fa fa-circle"></i>Charm</a></li>
              @endif
            </ul>
          </li>
          @if(\AppHelper::instance()->hasPermission('TOPIC_LIST'))
          <li id="treeTopic">
            <a href="{{url(config('constants.ADMIN_PREFIX').'/topic')}}">
              <i class="fa fa-lemon-o"></i> <span>Topic</span>
            </a>
          </li>
          @endif
          @if(\AppHelper::instance()->hasPermission('ADVISORY'))
          <li id="treeAdvisory">
            <a href="{{url(config('constants.ADMIN_PREFIX').'/advisory')}}">
              <i class="fa fa-lightbulb-o"></i> <span>Tư vấn</span>
            </a>
          </li>
          @endif
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <!-- End Left side column. contains the logo and sidebar -->
    <!-- Left side column. contains the logo and sidebar -->
    @yield('content')

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <!-- knouckout js -->
  <script src="{{asset('js/knockout-3.4.2.js')}}"></script>
  <script src="{{asset('js/knockout.validation.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('js/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{asset('js/moment.min.js')}}"></script>
  <!-- datepicker -->
  <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
  <!-- Slimscroll -->
  <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('js/fastclick.js')}}"></script>

  <script src="{{asset('js/nprogress.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('js/adminlte.min.js')}}"></script>
  <script defer src="{{asset('js/alertify.min.js')}}"></script>
  @yield('script')

</body>

</html>