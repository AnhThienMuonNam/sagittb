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
              <input type="text" class="form-control" name="Name" data-bind="value: name" placeholder="Nhập họ tên">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" data-bind="value: email" name="Email" placeholder="Nhập email">
            </div>
            <div class="form-group">
              <label>Số điện thoại</label>
              <input type="text" class="form-control" name="Phone" data-bind="value: phone" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
              <label>Mật khẩu</label>
              <input type="text" class="form-control" name="password" data-bind="value: password" placeholder="Mật khẩu">
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
          </div>
          <div class="box-footer">
            @if(\AppHelper::instance()->hasPermission('ACCOUNT_ADD'))
            <button type="button" class="btn btn-primary pull-right" data-bind="click: $root.createUserNoRedirect">Add</button>
            @endif
            @if(\AppHelper::instance()->hasPermission('ORDER_ADD'))
            <button type="button" class="btn btn-default pull-right" data-bind="click: $root.createUserAndOrder">Add > Đơn hàng</button>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
@section('script')
<script src="{{asset('admin_asset/user_create.js')}}"></script>
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

    options.CreateUser = <?php echo json_encode(url(config('constants.ADMIN_PREFIX') . '/account/createPost')); ?>;
    options.CreateOrderView = <?php echo json_encode(url(config('constants.ADMIN_PREFIX') . '/order/create')); ?>;
    data.API_URLs = options;

    ko.applyBindings(new FormViewModel(data));
  })
</script>
@endsection