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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <!-- Ionicons -->

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
  <!-- Date Picker -->
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
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">SB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">SagittB</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          @if(Auth::check())
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <strong>
              <span class="hidden-xs">{{Auth::user()->name}}</span></strong>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  {{Auth::user()->name}}
                  <small>Id: {{Auth::user()->id}}</small>
                  <small>Email: {{Auth::user()->email}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('admin/user/edit/'.Auth::user()->id)}}" class="btn btn-default btn-flat">Thông tin</a>
                </div>
                <div class="pull-right">
                  <a href="{{url('admin/logout')}}" class="btn btn-default btn-flat">Đăng xuất</a>
                </div>
              </li>
            </ul>
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
        <li id="treeCategory" class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Danh mục</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="tabCategoryList"><a href="{{url('admin/category')}}"><i class="fa fa-circle"></i> Danh sách Danh mục</a></li>
            <li id="tabCategoryCreate"><a href="{{url('admin/category/create')}}"><i class="fa fa-circle"></i> Tạo Danh mục</a></li>
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
            <li id="tabProductList"><a href="{{url('admin/product')}}"><i class="fa fa-circle"></i> Danh sách Sản phẩm</a></li>
            <li id="tabProductCreate"><a href="{{url('admin/product/create')}}"><i class="fa fa-circle"></i> Tạo Sản phẩm</a></li>
          </ul>
        </li>
        <li id="treeOrder" class="treeview ">
          <a href="#">
            <i class="fa fa-tasks"></i> <span>Đơn hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="tabOrderList"><a href="{{url('admin/order')}}"><i class="fa fa-circle"></i> Danh sách Đơn hàng</a></li>
          </ul>
        </li>
        <li id="treeUser" class="treeview">
          <a href="#">
            <i class="fa fa-id-card"></i> <span>Tài khoản</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="tabUserList"><a href="{{url('admin/user')}}"><i class="fa fa-circle"></i> Danh sách Tài khoản</a></li>
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
            <li id="tabBlogList"><a href="{{url('admin/blog')}}"><i class="fa fa-circle"></i> Danh sách Blog</a></li>
            <li id="tabBlogCreate"><a href="{{url('admin/blog/create')}}"><i class="fa fa-circle"></i> Tạo Blog</a></li>
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
            <li id="tabSettingPiece"><a href="{{url('admin/piece')}}"><i class="fa fa-circle"></i>Hạt</a></li>
            <li id="tabSettingTopic"><a href="{{url('admin/topic')}}"><i class="fa fa-circle"></i>Topic</a></li>
            <li id="tabSettingAdvisory"><a href="{{url('admin/advisory')}}"><i class="fa fa-circle"></i>Tư vấn</a></li>
          </ul>
        </li>
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
