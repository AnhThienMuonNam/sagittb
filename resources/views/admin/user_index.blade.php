@extends('admin.layout.header')
@section('headerTitle')
Tài khoản
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="box box-info">
      <form class="form-horizontal">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Họ Tên/Email/SĐT</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" data-bind="value: Keyword " placeholder="Họ Tên/Email/SĐT">
            </div>
            <label class="col-sm-2 control-label">Tỉnh/Thành phố</label>
            <div class="col-sm-3">
              <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: Cities, optionsCaption:'-- Tất cả --', optionsText: 'name', optionsValue: 'id', value: CityId"></select>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <button class="btn btn-info pull-right" data-bind="click: search">Tìm Kiếm</button>
        </div>
      </form>
    </div>
    <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="col-xs-1">ID</th>
                  <th class="col-xs-3">Họ tên</th>
                  <th class="col-xs-3">Email</th>
                  <th class="col-xs-1">SĐT</th>
                  <th class="col-xs-2">Địa chỉ</th>
                  <th class="col-xs-1">External User</th>
                  @if(\AppHelper::instance()->hasPermission('OWNER'))
                  <th class="col-xs-1">Role</th>
                  @endif
                </tr>
              </thead>
              <tbody data-bind="foreach: Users">
                <tr>
                  <td class="col-xs-1" data-bind="text: id"></td>
                  <td class="col-xs-3"> <a data-bind="attr: { href: 'account/' + id }, text: name"></a></td>
                  <td class="col-xs-3" data-bind="text: email"></td>
                  <td class="col-xs-1" data-bind="text: phone"></td>
                  <td class="col-xs-2" data-bind="text: city ? city.name : ''"></td>
                  <td class="col-xs-1" data-bind="text: is_external_account == 1 ? 'Yes' : 'No'"></td>
                  @if(\AppHelper::instance()->hasPermission('OWNER'))
                  <td class="col-xs-1" data-bind="text: is_owner == 1 ? 'Owner' : '' + is_admin == 1 ? 'Admin' : ''"></td>
                  @endif
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('script')
<script src="{{asset('admin_asset/user_index.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#treeUser').addClass("active");
    document.getElementById("tabUserList").classList.add("active");
    var data = {};
    var options = {};
    data.Users = <?php echo json_encode($Users); ?>;
    data.Cities = <?php echo json_encode($Cities); ?>;

    options.SearchUser = <?php echo json_encode(url(config('constants.ADMIN_PREFIX') . '/account/search')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
  });
</script>
@endsection