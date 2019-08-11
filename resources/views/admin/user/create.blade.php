@extends('admin.layout.header')
@section('headerTitle')
Admin - Thêm tài khoản
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tài khoản
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thêm tài khoản</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            {{$error}}<br>
            @endforeach
          </div>
          @endif
          @if(session('message'))
          <div class="alert alert-success">
            {{session('message')}}
          </div>
          @endif
          <form role="form" action="create" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Họ tên</label>
                <input type="text" class="form-control" name="Name" placeholder="Nhập tên">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="Email" placeholder="Nhập email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Số điện thoại</label>
                <input type="text" class="form-control" name="Phone" placeholder="Số điện thoại">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Mật khẩu</label>
                <input type="password" class="form-control" name="Password" placeholder="Mật khẩu">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" name="Passwordx2" placeholder="Xác nhận mật khẩu">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nhóm người dùng</label>
                <select class="form-control" name="IsAdmin" style="width: 100%; padding: 0px 5px;">
                  <option value="0">Người dùng thông thường</option>
                  <option value="1">Quản trị viên</option>
                </select>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('script')

<script type="text/javascript">
  $(document).ready(function() {
    $('#treeUser').addClass("active");
    document.getElementById("tabUserCreate").classList.add("active");
  });
</script>
@endsection