@extends('page2.layout.master')

@section('css')


</style>
@endsection


@section('content')
<!--container-->
<div class="container" style="padding-top: 60px;" id="page-user-profile">
  <div class="shop-in">
    <div>
      <div class="bread2">
        <ul>
          <li><a href="{{url('')}}">TRANG CHỦ</a>
          <li>/</li>
          <li>THÔNG TIN TÀI KHOẢN</li>
        </ul>
      </div>
    </div>
    <div class="clearfix"> </div>
    <div>
      <div class="inner-section">
        <!-- ko if: NotifyErrors -->
        <div class="alert alert-danger">
            <span data-bind="text: NotifyErrors"></span>
        </div>
        <!-- /ko -->
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading panel-bg" role="tab" id="headingOne">
              <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Thông tin tài khoản</a> </h4>
            </div>
            <div id="collapseOne" style="width: 100%;" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email</label>
                        <div class="col-sm-10">
                            <p class="form-control-static" data-bind="text: Email"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Họ tên*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Họ tên" data-bind="value: Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Số điện thọai*</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="Số điện thoại" data-bind="value: Phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Ngày/Tháng/Năm sinh</label>
                        <div class="col-sm-1">
                          <select class="form-control" data-bind="options: Years, value: YearOb">
                          </select>
                        </div>
                        <div class="col-sm-1">
                          <select class="form-control" data-bind="options: Months, value: MonthOb">
                          </select>
                        </div>

                        <div class="col-sm-1">
                          <select class="form-control" data-bind="options: Days, value: DayOb">
                          </select>
                        </div>

                        <label class="control-label col-sm-2" style="text-align:right;" for="pwd">Thời gian sinh</label>
                        <div class="col-sm-1">
                          <select class="form-control" data-bind="options: Hours, value: HourOb">
                          </select>
                        </div>
                        <div class="col-sm-1">
                          <select class="form-control" data-bind="options: Minutes, value: MinuteOb">
                          </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Giới tính</label>
                        <div class="col-sm-10">
                            <select class="form-control" data-bind="options: Genders, optionsText: 'name', optionsValue: 'id', value: Gender">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Số nhà, tên đường, phường/xã" data-bind="value: Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Quận/Huyện</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Số nhà, tên đường, quận/huyện"  data-bind="value: District">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Tỉnh/Thành phố</label>
                        <div class="col-sm-10">
                            <select class="form-control" data-bind="options: Cities, optionsText: 'name', optionsValue: 'id', value: CityId, optionsCaption: '-- Tỉnh/Thành phố --'">
                            </select>
                            <!-- <input type="text" class="form-control" placeholder="Số nhà, tên đường, quận/huyện"  data-bind="value: CityId"> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-default" style="color: black;" data-bind="click: openPopupGetOTPForUpdateInfo">Cập nhật thông tin</button>
                        </div>
                    </div>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>
          <div class="panel panel-default">
            <div class="panel-heading panel-bg" role="tab" id="headingTwo">
              <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Đổi mật khẩu</a> </h4>
            </div>
            <div id="collapseTwo" style="width: 100%;" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Mật khẩu cũ*</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Mật khẩu cũ"  data-bind="value: OldPassword">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Mật khẩu mới*</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Mật khẩu mới"  data-bind="value: NewPassword">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Mật khẩu mới x2*</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Mật khẩu mới x2"  data-bind="value: NewPasswordx2">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-default" style="color: black;"  data-bind="click: openPopupGetOTPForChangePassword">Đổi mật khẩu</button>
                            </div>
                        </div>

               </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- panel-group -->
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="clearfix"></div>


  <div class="modal fade" id="modalGetOTPCodePageProfile" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="height: auto;">
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Xác nhận thay đổi thông tin</h4>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <form class="form-horizontal">
              <!-- ko if: SuccessNotifyForPopup -->
              <div class="alert alert-success" data-bind="text: SuccessNotifyForPopup">
              </div>
              <!-- /ko -->
              <div class="form-group">
                <div class="col-sm-12">
                  <p><a href="#" data-bind="click: GetOTP" >Click để lấy mã xác thực</a></p>
                </div>
              </div>
            <div class="form-group">
              <div class="col-sm-12">
                <input type="text" class="form-control" placeholder="Mã xác thực" data-bind="value: OTPCode"/>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <button type="button" class="btn btn-default button-1" data-bind="click: UpdateUserCommon">Thay đổi</button>
              </div>
            </div>

          </form>
        </div>
        <!-- Modal Footer -->
      </div>
    </div>
  </div>



</div>
<!--container-->
<div class="clearfix"></div>

@endsection

@section('script')
<script src="{{asset('page_asset/page-user-profile.js')}}"></script>
 <script type="text/javascript">
     $(document).ready(function() {


      var data = {};
      var options = {};
      data.User = <?php echo json_encode($User); ?>;
      data.Cities = <?php echo json_encode($Cities); ?>;


      options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
      options.PublicPath = <?php echo json_encode(url('')); ?>;
      options.UpdateUser = <?php echo json_encode(url('user/updateUser')); ?>;
      options.ChangePassWord = <?php echo json_encode(url('user/changePassWord')); ?>;
  options.GetOTP = <?php echo json_encode(url('admin/getotp')); ?>;
      data.API_URLs = options;

      ko.applyBindings(FormViewModel(data), document.getElementById("page-user-profile"));
    });

</script>
@endsection
