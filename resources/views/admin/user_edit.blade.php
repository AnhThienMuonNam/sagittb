@extends('admin.layout.header')
@section('headerTitle')
Tài khoản
@endsection
@section('content')

<div class="content-wrapper">
  <section class="content">
    <div class="row" data-bind="with: userModel">
      <div class="col-md-12">
        <div class="box box-solid">
          <!-- ko if: $root.NotifyErrors -->
          <div class="alert alert-danger">
            <span data-bind="text: $root.NotifyErrors"></span>
          </div>
          <!-- /ko -->
          <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
          <div class="box-body">
            <div class="form-group">
              <label>Họ tên</label>
              <input type="text" class="form-control" name="Name" data-bind="value: name">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" readonly="readonly" data-bind="value: email" name="Email" placeholder="Nhập email">
            </div>
            <div class="form-group">
              <label>Số điện thoại</label>
              <input type="text" class="form-control" name="Phone" data-bind="value: phone" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
              <label>Ngày sinh (YYYY-MM-DD)</label>
              <input type="text" placeholder="Ngày sinh" id="sBirthDay" class="form-control datepickerBirthDay" data-bind="event :{change: changeBirthDay }">
            </div>
            <div class="form-group">
              <label>Giờ sinh (HH:MM)</label>
              <input type="text" class="form-control" data-bind="value: timeOfBirthStr" placeholder="23:59">
              <span data-bind="text: 'Giờ: ' + hourOB()">&nbsp;</span>
              <span data-bind="text: 'Phút: ' + minuteOB()">&nbsp;</span>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" data-bind="checked: isActive"> Active
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" data-bind="checked: isExternalAccount"> External account
              </label>
            </div>
            @if(\AppHelper::instance()->hasPermission('OWNER'))
            <div class="form-group">
              <label>Role</label>
              <div class="checkbox">
                <label>
                  <input type="checkbox" data-bind="checked: isAdmin"> Admin
                </label>
                <label>
                  <input type="checkbox" data-bind="checked: isOwner"> Owner
                </label>
              </div>
            </div>
            @endif
            <div class="form-group" style="max-height: 500px; overflow:auto;">
              <label>Nội dung tư vấn</label>
              <textarea class="form-control" data-bind='value: historicalConsultant' rows="5"></textarea>
            </div>
            <div class="form-group">
              <label>Đường, số nhà</label>
              <input type="text" class="form-control" data-bind="value: address" placeholder="Đường, số nhà">
            </div>
            <div class="form-group">
              <label>Phường/Quận</label>
              <input type="text" class="form-control" data-bind="value: district" placeholder="Phường/Quận">
            </div>
            <div class="form-group">
              <label>Tỉnh/TP</label>
              <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: $root.Cities,  optionsText: 'name', optionsValue: 'id', value: city_id, optionsCaption: '-- Chọn Tỉnh/TP --'"></select>
            </div>
            <div class="form-group" style="max-height: 500px; overflow:auto;">
              <label>Tư vấn</label>
              <br />
              <!-- ko foreach: lichsuTracuus -->
              <label data-bind='text: $index() + 1 + "."'></label> <span data-bind='text: $data.tra_cuu'></span>
              <p><label>Kết quả: </label> <span data-bind='text: $data.ket_qua'></span></p>
              <textarea class="form-control" data-bind='value: $data.admin_result' rows="5"></textarea>
              <br />
              <!-- /ko -->
            </div>
          </div>
          <div class="box-footer">
            @if(\AppHelper::instance()->hasPermission('ACCOUNT_EDIT'))
            <button type="button" class="btn btn-primary pull-right" data-bind="click: $root.editUser">Save</button>
            @endif
            @if(\AppHelper::instance()->hasPermission('ORDER_ADD'))
            <button type="button" class="btn btn-default pull-right" data-bind="click: $root.createOrderView">Tạo đơn hàng</button>
            @endif
          </div>
        </div>
        @if($user->id == Auth::user()->id)
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Đổi mật khẩu</h3>
          </div>
          <form role="form" action="{{url(config('constants.ADMIN_PREFIX').'/user/changePasswordPost/'.$user->id)}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="box-body">
              <div class="form-group">
                <label>Mật khẩu cũ</label>
                <input type="password" class="form-control" name="OldPassword" placeholder="Mật khẩu">
              </div>
              <div class="form-group">
                <label>Mật khẩu mới</label>
                <input type="password" class="form-control" name="NewPassword" placeholder="Mật khẩu">
              </div>
              <div class="form-group">
                <label>Nhập lại mật khẩu mới</label>
                <input type="password" class="form-control" name="NewPasswordx2" placeholder="Xác nhận mật khẩu">
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
        @endif
      </div>
    </div>
  </section>
</div>

@endsection
@section('script')
<script src="{{asset('admin_asset/user_edit.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#treeUser').addClass("active");
    $('.datepickerBirthDay').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    var data = {};
    var options = {};
    data.Cities = <?php echo json_encode($Cities); ?>;
    data.User = <?php echo json_encode($user); ?>;
    options.EditUser = <?php echo json_encode(url(config('constants.ADMIN_PREFIX') . '/account/editPost')); ?>;
    options.CreateOrderView = <?php echo json_encode(url(config('constants.ADMIN_PREFIX') . '/order/create')); ?>;

    data.API_URLs = options;

    ko.applyBindings(new FormViewModel(data));
  })
</script>
@endsection