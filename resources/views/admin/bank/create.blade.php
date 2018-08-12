@extends('admin.layout.header')
@section('headerTitle')
Admin - Tài khoản ngân hàng
@endsection

@section('css')
 
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
              <h3 class="box-title">Thêm tài khoản ngân hàng</h3>
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
                  <label for="exampleInputEmail1">Tên ngân hàng</label>
                  <input type="text" class="form-control" name="BankName" placeholder="Tên ngân hàng">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Chi nhánh</label>
                  <input type="text" class="form-control" name="Brand" placeholder="Chi nhánh">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Số tài khoản</label>
                  <input type="text" class="form-control" name="AccountId" placeholder="Số tài khoản">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên chủ tài khoản</label>
                  <input type="text" class="form-control" name="Owner" placeholder="Tên chủ tài khoản">
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
     document.getElementById("tabSettingBank").classList.add("active");
   
  });

</script>
@endsection

