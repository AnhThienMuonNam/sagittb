@extends('admin.layout.header')

@section('headerTitle')
Admin - Danh sách Tài khoản ngân hàng
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
              <h3 class="box-title">Danh sách Tài khoản ngân hàng</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <div class="input-group-btn">
                    <a href="{{url('admin/bank/create')}}" class="btn btn-default" style="float: right;"><i class="fa fa-plus"></i>&nbsp;Thêm Tài khoản ngân hàng</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Tên ngân hàng</th>
                    <th>Chi nhánh</th>
                    <th>Số tài khoản</th>
                    <th>Tên chủ tài khoản</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody data-bind="foreach: Banks">
                    <tr>
                        <td data-bind="text: BankName"></td>
                        <td data-bind="text: Brand"></td>
                        <td data-bind="text: AccountId"></td>
                        <td data-bind="text: Owner"></td>
                        <td>
                            <a href="#" data-bind="click: $root.removeBank"  title="Xóa" class="text-danger"><i class="fa fa-trash-o"></i></a>
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
<script src="{{asset('admin_asset/admin_setting/admin-bank-index.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#treeSetting').addClass("active");
    document.getElementById("tabSettingBank").classList.add("active");
    var data = {};
    var options = {};

    data.Banks = <?php echo json_encode($banks); ?> ;
    options.DeleteBank = <?php echo json_encode(url('/admin/bank/delete')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
});

</script>
@endsection
