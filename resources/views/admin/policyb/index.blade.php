@extends('admin.layout.header')

@section('headerTitle')
Admin - Chính sách đại lý
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
              <h3 class="box-title">Danh sách Chính sách đại lý</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <div class="input-group-btn">
                    <a href="{{url('admin/policyb/create')}}" class="btn btn-default" style="float: right;"><i class="fa fa-plus"></i>&nbsp;Thêm Chính sách đại lý</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    
                    <th></th>
                  </tr>
                </thead>
                <tbody data-bind="foreach: Policiesb">
                    <tr>
                        <td data-bind="text: Title"></td>
                        <td data-bind="text: Content"></td>
                        <td>
                            <a href="#" data-bind="click: $root.removePolicyb"  title="Xóa" class="text-danger"><i class="fa fa-trash-o"></i></a>
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
<script src="{{asset('admin_asset/admin_setting/admin-policyb-index.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#treeSetting').addClass("active");
    document.getElementById("tabSettingPolicyb").classList.add("active");
    var data = {};
    var options = {};

    data.Policiesb = <?php echo json_encode($policiesb); ?> ;
    options.DeletePolicyb = <?php echo json_encode(url('/admin/policyb/delete')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
});

</script>
@endsection
