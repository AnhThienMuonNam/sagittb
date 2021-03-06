@extends('admin.layout.header')

@section('headerTitle')
Đơn hàng
@endsection

@section('css')
<style type="text/css">
  .datepicker.datepicker-dropdown.dropdown-menu {
    z-index: 99999 !important;
  }
</style>
@endsection

@section('content')

<div class="content-wrapper">
  <section class="content">
    <div class="box box-info">
      <form class="form-horizontal">
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tên KH/Email/SĐT</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" data-bind="value: Keyword" placeholder="Từ khóa">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">ID đơn hàng</label>

            <div class="col-sm-4">
              <input type="number" class="form-control" id="inputEmail3" data-bind="value: Id" placeholder="ID đơn hàng">
            </div>
            <label for="inputPassword3" class="col-sm-2 control-label">Trạng thái đơn hàng</label>
            <div class="col-sm-4">
              <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: OrderStatues, optionsCaption:'-- Tất cả --', optionsText: 'name', optionsValue: 'id', value: OrderStatusId"></select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Ngày đặt hàng</label>
            <div class="col-sm-2">
              <input type="text" placeholder="Từ ngày" id="sFromDate" class="form-control mydatepicker" data-bind="event :{change: changeSFromDate }">
            </div>
            <div class="col-sm-2">
              <input type="text" placeholder="Đến ngày" id="sToDate" class="form-control mydatepicker" data-bind="event :{change: changeSToDate }">
            </div>
            <label for="inputPassword3" class="col-sm-2 control-label">Tỉnh/Thành phố</label>
            <div class="col-sm-4">
              <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: Cities, optionsCaption:'-- Tất cả --', optionsText: 'name', optionsValue: 'id', value: CityId"></select>
            </div>
          </div>

          <!-- <div class="form-group"> -->

          <!--  <label for="inputPassword3" class="col-sm-2 control-label">Tình trạng thanh toán</label>
                   <div class="col-sm-4">
                    <select class="form-control" data-bind="value: sIsPaid" style="width: 100%; padding: 0px 5px;">
                       <option value="">Chọn tình trạng thanh toán</option>
                      <option value="0">Chưa thanh toán</option>
                      <option value="1">Đã thanh toán</option>
                    </select>
                  </div> -->
          <!-- </div> -->
        </div>
        <div class="box-footer">
          <div class="pull-right">
            <button class="btn btn-default" data-bind="click: viewExpiredOrder">Đơn hàng quá hạn</button>
            <button class="btn btn-default" data-bind="click: viewRemindOrder">Đơn hàng nhắc nhở</button>
            <button class="btn btn-info" data-bind="click: search">Tìm Kiếm</button>
          </div>
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
                  <th>ID</th>
                  <th>Khách hàng</th>
                  <th>SĐT</th>
                  <th>Email</th>
                  <!-- <th>Tình trạng thanh toán</th> -->
                  <th>Trạng thái</th>
                  <th>Ngày đặt</th>
                  <th>S.lg sản phẩm</th>
                  <th>Tổng tiền</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody data-bind="foreach: Orders">
                <tr>
                  <td data-bind="text: id"></td>
                  <td data-bind="text: customer_name"></td>
                  <td data-bind="text: customer_phone"></td>
                  <td data-bind="text: customer_email"></td>
                  <td data-bind="text: $data.order_status.name"></td>
                  <td data-bind="text: created_at"></td>
                  <td data-bind="text: $data.order_details ? $data.order_details.length : '0'"></td>
                  <td data-bind="text: $root.formatMoney($data.original_price)"></td>
                  <td>
                    <a data-bind="attr: { href: 'order/' + id }" title="Cập nhật" class="text-yellow"><i class="fa fa-pencil fa-2x"></i></a>
                  </td>
                  <td>
                    <!-- ko if: $root.IsViewRemindButtonClick -->
                    <a href="#" data-bind="click: $root.sendEmailRemindOrder" title="Gửi nhắc nhở" class="text-danger">Gửi nhắc nhở</a>
                    <!-- /ko -->

                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo; Trang sau</a></li>
                <li><a href="#">Trang kế &raquo;</a></li>
              </ul>
            </div> -->
        </div>
      </div>
    </div>
</div>
</section>
</div>

@endsection

@section('script')
<script src="{{asset('admin_asset/order_index.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#treeOrder').addClass("active");
    $('.mydatepicker').datepicker({
      autoclose: true
    })

    var data = {};
    var options = {};

    options.SearchOrder = <?php echo json_encode(url(config('constants.ADMIN_PREFIX').'/order/search')); ?>;
    options.ExportOrder = <?php echo json_encode(url(config('constants.ADMIN_PREFIX').'/order/exportOrder')); ?>;
    options.ViewRemindOrder = <?php echo json_encode(url(config('constants.ADMIN_PREFIX').'/order/viewRemindOrder')); ?>;
    options.SendEmailRemindOrder = <?php echo json_encode(url(config('constants.ADMIN_PREFIX').'/order/sendEmailRemindOrder')); ?>;
    options.ViewExpiredOrder = <?php echo json_encode(url(config('constants.ADMIN_PREFIX').'/order/viewExpiredOrder')); ?>;

    data.Orders = <?php echo json_encode($Orders); ?>;
    data.OrderStatues = <?php echo json_encode($OrderStatues); ?>;
    data.Cities = <?php echo json_encode($Cities); ?>;

    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
  });
</script>
@endsection