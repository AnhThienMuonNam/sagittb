@extends('admin.layout.header')

@section('headerTitle')
Topic
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Topic
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                      <div class="input-group-btn">
                          <a href="{{url('admin/topic/create')}}" class="btn btn-default">Thêm Topic</a>
                      </div>
                  </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Dòng 1</th>
                    <th>Dòng 2</th>
                    <th>Dòng 3</th>
                    <th>Url</th>
                    <th>Đang hiển thị</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody data-bind="foreach: Topics">
                    <tr>
                      <td data-bind="text: id"></td>
                        <td data-bind="text: line1"></td>
                        <td data-bind="text: line2"></td>
                        <td data-bind="text: line3"></td>
                        <td data-bind="text: url"></td>
                        <td data-bind="text: is_active ? 'Yes' : 'No'"></td>
                        <td>
                            <a data-bind="attr: { href: 'topic/edit/' + id }"  title="Sửa" class="text-yellow"><i class="fa fa-pencil fa-2x"></i></a>&nbsp;
                            <a href="#" data-bind="click: $root.removeTopic"  title="Xóa" class="text-danger"><i class="fa fa-trash-o fa-2x"></i></a>
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
<script src="{{asset('admin_asset/admin_setting/topic/index.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#treeSetting').addClass("active");
    document.getElementById("tabSettingTopic").classList.add("active");
    var data = {};
    var options = {};

    data.Topics = <?php echo json_encode($topics); ?> ;
    options.DeleteTopic = <?php echo json_encode(url('/admin/topic/delete')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
});

</script>
@endsection
