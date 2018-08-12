@extends('admin.layout.header')
@section('headerTitle')
Admin - Thêm Cửa hàng
 
@endsection
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Cài đặt
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
              <h3 class="box-title">Thêm Cửa hàng</h3>
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
            <form role="form" action="create" enctype="multipart/form-data" method="POST">
              <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Địa chỉ</label>
                  <input type="text" class="form-control" name="Name" placeholder="Địa chỉ">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" name="Email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Số điện thoại</label>
                  <input type="text" class="form-control" name="PhoneNumber" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Giờ làm việc</label>
                  <input type="text" class="form-control" name="WorkingTime" placeholder="Giờ làm việc">
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
     $('#treeSetting').addClass("active");
     document.getElementById("tabSettingStore").classList.add("active");
   
  });

</script>
@endsection

