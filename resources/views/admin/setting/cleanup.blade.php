@extends('admin.layout.header')

@section('headerTitle')
Cleanup
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cleanup
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
                    <th>Item</th>
                  </tr>
                </thead>
                <tbody data-bind="foreach: Items">
                    <tr>
                      <td data-bind="text: $data"></td>
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
<script src="{{asset('admin_asset/admin_setting/cleanup/index.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#treeSetting').addClass("active");
    document.getElementById("tabSettingCleanup").classList.add("active");
    var data = {};
    var options = {};

    data.Items = <?php echo json_encode($Items); ?> ;
    options.DeleteTopic = <?php echo json_encode(url('/admin/topic/delete')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
});

</script>
@endsection
