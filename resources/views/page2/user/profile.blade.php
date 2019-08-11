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
            <div class="panel-heading panel-bg" role="tab" id="headingOne" style="border-radius: 10px ">
              <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Thông Tin Tài Khoản</a> </h4>
            </div>
            <div id="collapseOne" style="width: 100%;" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body form-horizontal" style="border-radius: 10px">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email</label>
                        <div class="col-sm-10">
                            <p class="form-control-static" data-bind="text: Email"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Họ Tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Họ Tên" data-bind="value: Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Số Điện Thoại</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="Số điện thoại" data-bind="value: Phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Ngày Sinh</label>
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

                        <label class="control-label col-sm-2" style="text-align:right;" for="pwd">Giờ Sinh</label>
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
                        <label class="control-label col-sm-2" for="pwd">Giới Tính</label>
                        <div class="col-sm-10">
                            <select class="form-control" data-bind="options: Genders, optionsText: 'name', optionsValue: 'id', value: Gender">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Địa Chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Số Nhà/ Đường / Phường xã" data-bind="value: Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Quận/Huyện</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  data-bind="value: District">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Tỉnh/Thành phố</label>
                        <div class="col-sm-10">
                            <select class="form-control" data-bind="options: Cities, optionsText: 'name', optionsValue: 'id', value: CityId, optionsCaption: 'Tỉnh/Thành phố'">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-default" style="color: black; border-radius: 8px;" data-bind="click: updateUser">Cập Nhật</button>
                        </div>
                    </div>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>
          <div class="panel panel-default">
            <div class="panel-heading panel-bg" role="tab" id="headingTwo" style="border-radius: 10px">
              <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Đổi Mật Khẩu</a> </h4>
            </div>
            <div id="collapseTwo" style="width: 100%;" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body form-horizontal" style="border-radius: 10px">
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
                            <label class="control-label col-sm-2" for="pwd">Nhập lại mật khẩu</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu"  data-bind="value: NewPasswordx2">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-default" style="color: black; border-radius: 8px;"  data-bind="click: changePassword">Đổi mật khẩu</button>
                            </div>
                        </div>

               </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="panel panel-default">
            <div class="panel-heading panel-bg" role="tab" id="headingThree" style="border-radius: 10px">
              <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Lịch sử tư vấn</a> </h4>
            </div>
            <div id="collapseThree" style="width: 100%;" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body form-horizontal" style="border-radius: 10px">
                <div class="table-responsive table-none wow fadeIn">
                  <table class="table checkout-table">
                    <tr class="table-h">
                      <td style="min-width: 150px;">Tra cứu</td>
                      <td>Kết quả</td>
                      <td>Tư vấn</td>
                    </tr>
                    <!-- ko foreach: Lichsu_TraCuus -->
                    <tr>
                      <td style="min-width: 150px;">
                        <span data-bind="text: tra_cuu">
                      </span></td>
                      <td><span data-bind="text: ket_qua">
                      </span></td>
                      <td><span data-bind="text: admin_result">
                      </span></td>
                    </tr>
                    <!-- /ko -->
                  </table>
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
      data.API_URLs = options;

      ko.applyBindings(FormViewModel(data), document.getElementById("page-user-profile"));
    });

</script>
@endsection
