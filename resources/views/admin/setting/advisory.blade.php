@extends('admin.layout.header')

@section('headerTitle')
Admin - Tư vấn
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Tư vấn
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Truy vấn</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Họ tên</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" data-bind="value: name" placeholder="Từ khóa">
                  </div>
                  <label for="inputEmail3" class="col-sm-2 control-label">Giới tính</label>
                    <div class="col-sm-4">
                       <select class="form-control" data-bind="value: gender" style="width: 100%; padding: 0px 0px;">
                         <option value="1">Nam</option>
                         <option value="0">Nữ</option>
                       </select>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Ngày sinh</label>
                    <div class="col-sm-1">
                      <select class="form-control" data-bind="value: isLunar" style="width: 100%; padding: 0px 0px;">
                        <option value="1">Âm lịch</option>
                        <option value="">Dương lịch</option>
                      </select>
                    </div>
                    <div class="col-sm-1">
                      <select class="form-control" data-bind="value: day" style="width: 100%; padding: 0px 0px;">
                        <option value="01">ngày 01</option>
                        <option value="02">ngày 02</option>
                        <option value="03">ngày 03</option>
                        <option value="04">ngày 04</option>
                        <option value="05">ngày 05</option>
                        <option value="06">ngày 06</option>
                        <option value="07">ngày 07</option>
                        <option value="08">ngày 08</option>
                        <option value="09">ngày 09</option>
                        <option value="10">ngày 10</option>
                        <option value="11">ngày 11</option>
                        <option value="12">ngày 12</option>
                        <option value="13">ngày 13</option>
                        <option value="14">ngày 14</option>
                        <option value="15">ngày 15</option>
                        <option value="16">ngày 16</option>
                        <option value="17">ngày 17</option>
                        <option value="18">ngày 18</option>
                        <option value="19">ngày 19</option>
                        <option value="20">ngày 20</option>
                        <option value="21">ngày 21</option>
                        <option value="22">ngày 22</option>
                        <option value="23">ngày 23</option>
                        <option value="24">ngày 24</option>
                        <option value="25">ngày 25</option>
                        <option value="26">ngày 26</option>
                        <option value="27">ngày 27</option>
                        <option value="28">ngày 28</option>
                        <option value="29">ngày 29</option>
                        <option value="30">ngày 30</option>
                        <option value="31">ngày 31</option>
                      </select>
                    </div>
                    <div class="col-sm-1">
                      <select class="form-control" data-bind="value: month" style="width: 100%; padding: 0px 0px;">
                        <option value="01">tháng 01</option>
                        <option value="02">tháng 02</option>
                        <option value="03">tháng 03</option>
                        <option value="04">tháng 04</option>
                        <option value="05">tháng 05</option>
                        <option value="06">tháng 06</option>
                        <option value="07">tháng 07</option>
                        <option value="08">tháng 08</option>
                        <option value="09">tháng 09</option>
                        <option value="10">tháng 10</option>
                        <option value="11">tháng 11</option>
                        <option value="12">tháng 12</option>
                      </select>
                    </div>
                    <div class="col-sm-1">
                        <input type="number" class="form-control" data-bind="value: year" placeholder="Năm">
                      </div>

                  <label class="col-sm-2 control-label">Giờ sinh</label>
                    <div class="col-sm-1">
                      <select class="form-control" data-bind="value: gio" style="width: 100%; padding: 0px 0px;">
                        <option value="1">1h Sửu</option>
                        <option value="2">2h Sửu</option>
                        <option value="3">3h Dần</option>
                        <option value="4">4h Dần</option>
                        <option value="5">5h Mão</option>
                        <option value="6">6h Mão</option>
                        <option value="7">7h Thìn</option>
                        <option value="8">8h Thìn</option>
                        <option value="9">9h Tỵ</option>
                        <option value="10">10h Tỵ</option>
                        <option value="11">11h Ngọ</option>
                        <option value="12">12h Ngọ</option>
                        <option value="13">13h Mùi</option>
                        <option value="14">14h Mùi</option>
                        <option value="15">15h Thân</option>
                        <option value="16">16h Thân</option>
                        <option value="17">17h Dậu</option>
                        <option value="18">18h Dậu</option>
                        <option value="19">19h Tuất</option>
                        <option value="20">20h Tuất</option>
                        <option value="21">21h Hợi</option>
                        <option value="22">22h Hợi</option>
                        <option value="23">23h Tý</option>
                        <option value="24">24h Tý (00h)</option>
                      </select>
                    </div>
                    <div class="col-sm-1">
                      <select class="form-control" data-bind="value: phut" style="width: 100%; padding: 0px 0px;">
                        <option value="00">00 phút</option>
                        <option value="01">01 phút</option>
                        <option value="02">02 phút</option>
                        <option value="03">03 phút</option>
                        <option value="04">04 phút</option>
                        <option value="05">05 phút</option>
                        <option value="06">06 phút</option>
                        <option value="07">07 phút</option>
                        <option value="08">08 phút</option>
                        <option value="09">09 phút</option>
                        <option value="10">10 phút</option>
                        <option value="11">11 phút</option>
                        <option value="12">12 phút</option>
                        <option value="13">13 phút</option>
                        <option value="14">14 phút</option>
                        <option value="15">15 phút</option>
                        <option value="16">16 phút</option>
                        <option value="17">17 phút</option>
                        <option value="18">18 phút</option>
                        <option value="19">19 phút</option>
                        <option value="20">20 phút</option>
                        <option value="21">21 phút</option>
                        <option value="22">22 phút</option>
                        <option value="23">23 phút</option>
                        <option value="24">24 phút</option>
                        <option value="25">25 phút</option>
                        <option value="26">26 phút</option>
                        <option value="27">27 phút</option>
                        <option value="28">28 phút</option>
                        <option value="29">29 phút</option>
                        <option value="30">30 phút</option>
                        <option value="31">31 phút</option>
                        <option value="32">32 phút</option>
                        <option value="33">33 phút</option>
                        <option value="34">34 phút</option>
                        <option value="35">35 phút</option>
                        <option value="36">36 phút</option>
                        <option value="37">37 phút</option>
                        <option value="38">38 phút</option>
                        <option value="39">39 phút</option>
                        <option value="40">40 phút</option>
                        <option value="41">41 phút</option>
                        <option value="42">42 phút</option>
                        <option value="43">43 phút</option>
                        <option value="44">44 phút</option>
                        <option value="45">45 phút</option>
                        <option value="46">46 phút</option>
                        <option value="47">47 phút</option>
                        <option value="48">48 phút</option>
                        <option value="49">49 phút</option>
                        <option value="50">50 phút</option>
                        <option value="51">51 phút</option>
                        <option value="52">52 phút</option>
                        <option value="53">53 phút</option>
                        <option value="54">54 phút</option>
                        <option value="55">55 phút</option>
                        <option value="56">56 phút</option>
                        <option value="57">57 phút</option>
                        <option value="58">58 phút</option>
                        <option value="59">59 phút</option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <select class="form-control" data-bind="value: fixhour" style="width: 100%; padding: 0px 0px;">
                        <option value="0">Giờ địa phương</option>
                        <option value="1">Sinh ở miền Nam VN</option>
                        <option value="2">Giờ Bắc Kinh TQ UTC +8:00</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Xem Tiểu hạn và Đại hạn năm</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" data-bind="value: year_xem" placeholder="Xem Tiểu hạn và Đại hạn năm">
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
       <div class="box">
         <div class="box-header">
           <h3 class="box-title">Kết quả</h3>
         </div>
         <!-- /.box-header -->
         <form class="form-horizontal">
           <div class="box-body">
             <div class="form-group">
               <label for="inputEmail3" class="col-sm-2 control-label">Tật ách</label>
               <div class="col-sm-10">
                <span data-bind="html: tatAch"></span>
               </div>
             </div>
             <div class="form-group">
               <label for="inputEmail3" class="col-sm-2 control-label">Sức khoẻ & bệnh tật</label>
               <div class="col-sm-10">
                <span data-bind="text: sucKhoe"></span>
               </div>
             </div>
           </div>
           <!-- /.box-body -->
         </form>
         <!-- /.box-body -->
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('script')
<script src="{{asset('admin_asset/admin_setting/advisory/admin-advisory.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
   $('#treeSetting').addClass("active");
   document.getElementById("tabSettingAdvisory").classList.add("active");
   var data = {};
   var options = {};

   options.GetAdvisory = <?php echo json_encode(url('/admin/advisory')); ?>;

   data.API_URLs = options;
   ko.applyBindings(new FormViewModel(data));
});

</script>
@endsection
