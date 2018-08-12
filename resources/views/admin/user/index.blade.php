@extends('admin.layout.header')

@section('headerTitle')
Admin - Danh sách Tài khoản
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
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tìm kiếm Tài khoản</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Họ Tên/Email/SĐT</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" data-bind="value: Keyword " placeholder="Từ khóa">
                  </div>
                </div>
                <div class="form-group">
                   <label for="inputPassword3" class="col-sm-2 control-label">Nhóm người dùng</label>
                  <div class="col-sm-4">
                     <select class="form-control" data-bind="value: IsAdmin" style="width: 100%; padding: 0px 5px;">
                       <option value="">-- Tất cả --</option>
                       <option value="0">Người dùng thông thường</option>
                       <option value="1">Quản trị viên</option>
                     </select>
                  </div>

                  <label for="inputPassword3" class="col-sm-2 control-label">Tỉnh/Thành phố</label>
                  <div class="col-sm-4">
                    <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: Cities, optionsCaption:'-- Tất cả --', optionsText: 'name', optionsValue: 'id', value: CityId"></select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-info pull-right" data-bind="click: search">Tìm Kiếm</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
       <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách Tài khoản</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="col-xs-0">ID</th>
                    <th class="col-xs-3">Họ tên</th>
                    <th class="col-xs-3">Email</th>
                    <th class="col-xs-1">SĐT</th>
                    <th class="col-xs-2">Tỉnh/TP</th>
                    <th class="col-xs-1">Nhóm</th>
                    <th class="col-xs-2">IP</th>
                    <th class="col-xs-0"></th>
                  </tr>
                </thead>
                <tbody data-bind="foreach: Users">
                    <tr>
                        <td class="col-xs-0" data-bind="text: id"></td>
                        <td class="col-xs-3" data-bind="text: name"></td>
                        <td class="col-xs-3" data-bind="text: email"></td>
                        <td class="col-xs-2" data-bind="text: phone"></td>
                        <td class="col-xs-2" data-bind="text: city ? city.name : ''"></td>
                        <td class="col-xs-2" data-bind="text: is_admin == 1 ? 'Admin' : 'Normal'"></td>
                        <td class="col-xs-2" data-bind="text: is_admin == 1 ? 'Admin' : 'Normal'"></td>
                        <td class="col-xs-0">
                            <a data-bind="attr: { href: 'user/edit/' + id }"  title="Sửa" class="text-yellow"><i class="fa fa-pencil"></i></a>
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
<script src="{{asset('admin_asset/admin-user-index.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
   $('#treeUser').addClass("active");
   document.getElementById("tabUserList").classList.add("active");
    var data = {};
    var options = {};
    data.Users = <?php echo json_encode($Users); ?>;
    data.Cities = <?php echo json_encode($Cities); ?>;

    options.SearchUser = <?php echo json_encode(url('admin/user/search')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
});

</script>
@endsection
