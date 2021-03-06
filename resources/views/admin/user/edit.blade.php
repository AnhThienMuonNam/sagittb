@extends('admin.layout.header')
@section('headerTitle')
Cập nhật tài khoản
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cập nhật tài khoản
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-solid">
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
          @if(session('errorMessage'))
          <div class="alert alert-danger">
            {{session('errorMessage')}}
          </div>
          @endif
          <form role="form" action="{{url('admin/user/editPost/'.$user->id)}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Họ tên</label>
                <input type="text" class="form-control" name="Name" value="{{$user->name}}" placeholder="Nhập tên">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" readonly="readonly" value="{{$user->email}}" name="Email" placeholder="Nhập email">
              </div>
              <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" class="form-control" name="Phone" value="{{$user->phone}}" placeholder="Số điện thoại">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nhóm</label>
                <select class="form-control" name="IsAdmin" style="width: 100%; padding: 0px 5px;">
                  <option @if($user->is_admin == 0)
                    {{"selected"}}
                    @endif
                    value="0">User</option>
                  <option @if($user->is_admin == 1)
                    {{"selected"}} @endif
                    value="1">Admin</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Trạng thái</label>
                <select class="form-control" name="IsActive" style="width: 100%; padding: 0px 5px;">
                  <option @if($user->is_active == 0)
                    {{"selected"}}
                    @endif
                    value="0">Khóa</option>
                  <option @if($user->is_active == 1)
                    {{"selected"}} @endif
                    value="1">Hoạt động</option>
                </select>
              </div>

              <div class="form-group" style="max-height: 500px; overflow:auto;">
                <label>Tư vấn</label>
                <br />
                @if(count($user->lichsu_tracuus) == 0)
                <i>Trống</i>
                @endif
                @foreach($user->lichsu_tracuus as $item)
                <span>{{$loop->index + 1}}. <label>Tra cứu:</label> {{$item->tra_cuu}}</span>
                <p><label>Kết quả: </label> {{$item->ket_qua}}</p>
                <textarea class="hidden" name="lichsu_tracuus[{{$loop->index}}][id]">{{$item->id}}</textarea>
                <textarea class="form-control" name="lichsu_tracuus[{{$loop->index}}][admin_result]" rows="5">{{$item->admin_result}}</textarea>
                <br />
                @endforeach
              </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
          </form>
        </div>
        <!-- /.box -->
        @if($user->id == Auth::user()->id)

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Đổi mật khẩu</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{url('admin/user/changePasswordPost/'.$user->id)}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputPassword1">Mật khẩu cũ</label>
                <input type="password" class="form-control" name="OldPassword" placeholder="Mật khẩu">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Mật khẩu mới</label>
                <input type="password" class="form-control" name="NewPassword" placeholder="Mật khẩu">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nhập lại mật khẩu mới</label>
                <input type="password" class="form-control" name="NewPasswordx2" placeholder="Xác nhận mật khẩu">
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
            </div>
          </form>
        </div>
        @endif
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
  });
</script>
@endsection