@extends('admin.layout.header')

@section('headerTitle')
Admin - Cửa hàng
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
       <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách Cửa hàng</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <div class="input-group-btn">
                    <a href="{{url('admin/store/create')}}" class="btn btn-default" style="float: right;"><i class="fa fa-plus"></i>&nbsp;Thêm Cửa hàng</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Giờ làm việc</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody data-bind="foreach: Stores">
                    <tr>
                        <td data-bind="text: Name"></td>
                        <td data-bind="text: Email"></td>
                        <td data-bind="text: PhoneNumber"></td>
                        <td data-bind="text: WorkingTime"></td>
                        <td>
                            <a href="#" data-bind="click: $root.removeStore"  title="Xóa" class="text-danger"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('script')
<script src="{{asset('admin_asset/admin_setting/admin-store-index.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#treeSetting').addClass("active");
    document.getElementById("tabSettingStore").classList.add("active");
    var data = {};
    var options = {};

    data.Stores = <?php echo json_encode($stores); ?> ;
    options.DeleteStore = <?php echo json_encode(url('/admin/store/delete')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
});

</script>
@endsection
