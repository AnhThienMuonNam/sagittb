@extends('admin.layout.header')

@section('headerTitle')
Admin - Đánh giá
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
              <h3 class="box-title">Danh sách Đánh giá</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <div class="input-group-btn">
                    <a href="{{url('admin/feedback/create')}}" class="btn btn-default" style="float: right;"><i class="fa fa-plus"></i>&nbsp;Thêm Đánh giá</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Người viết</th>
                    <th>Nội dung</th>
                    
                    <th></th>
                  </tr>
                </thead>
                <tbody data-bind="foreach: Feedbacks">
                    <tr>
                        <td data-bind="text: Author"></td>
                        <td data-bind="text: Content"></td>
                        <td>
                            <a href="#" data-bind="click: $root.removeFeedback"  title="Xóa" class="text-danger"><i class="fa fa-trash-o"></i></a>
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
<script src="{{asset('admin_asset/admin_setting/admin-feedback-index.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#treeSetting').addClass("active");
    document.getElementById("tabSettingFeedback").classList.add("active");
    var data = {};
    var options = {};

    data.Feedbacks = <?php echo json_encode($feedbacks); ?> ;
    options.DeleteFeedback = <?php echo json_encode(url('/admin/feedback/delete')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
});

</script>
@endsection
