@extends('admin.layout.header')
@section('headerTitle')
Thông tin Đơn hàng
@endsection

@section('css')

@endsection
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Đơn hàng: {{$Order->id}}. Thời gian đặt: {{$Order->created_at}}
    </h1>
  </section>

  <section class="content">
    <div class="box box-info">
      <form class="form-horizontal">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Khách hàng</label>
            <div class="col-sm-4">
              <input type="text" readonly="readonly" class="form-control" value="{{$Order->customer_name}}" placeholder="Từ khóa">
            </div>
            <label class="col-sm-2 control-label">SĐT</label>
            <div class="col-sm-4">
              <input type="text" readonly="readonly" class="form-control" value="{{$Order->customer_phone}}" placeholder="Từ khóa">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>

            <div class="col-sm-4">
              <input type="text" readonly="readonly" class="form-control" value="{{$Order->customer_email}}" placeholder="Từ khóa">
            </div>

            <label class="col-sm-2 control-label">Tài khoản đặt hàng</label>
            <div class="col-sm-4">
              @if($Order->customer_id)
              <input type="text" readonly="readonly" class="form-control" value="Có" placeholder="Từ khóa">
              @else
              <input type="text" readonly="readonly" class="form-control" value="Không" placeholder="Từ khóa">
              @endif
            </div>

          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Địa chỉ nhận hàng</label>
            <div class="col-sm-10">
              <input type="text" readonly="readonly" class="form-control" value="{{$Order->customer_address.', '.$Order->customer_district.', '.$Order->customer_city}}" placeholder="Từ khóa">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Ghi chú</label>
            <div class="col-sm-10">
              <input type="text" readonly="readonly" class="form-control" value="{{$Order->customer_note}}" placeholder="Từ khóa">
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Chi tiết</h3>
          </div>
          @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            {{$error}}<br>
            @endforeach
          </div>
          @endif
          @if(session('message'))
          <div class="alert alert-success">
            {{session('message')}}
          </div>
          @endif
          <form role="form" action="{{$Order->id}}" method="POST">
            <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Sản phẩm</th>
                    <th>Chi tiết</th>
                    <th>Danh mục</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Tổng tiền</th>
                  </tr>
                </thead>
                <tbody data-bind="foreach: OrderDetails">
                  <tr>
                    <td data-bind="text: product_id"></td>
                    <td><a href="#" data-bind="text: product_name, attr:{href: $root.PublicPath()+'/san-pham/'+product_alias+'/'+product_id}"></a></td>
                    <td data-bind="html: $root.detailItem($data)"></td>
                    <td><a href="#" data-bind="text: category_name, attr:{href: $root.PublicPath()+'/danh-muc/alias/'+category_id}"></a></td>
                    <td data-bind="text: quanlity"></td>
                    <td data-bind="text: $root.formatMoney(parseInt(original_price)/parseInt(quanlity))"></td>
                    <td data-bind="text: $root.formatMoney(parseInt(original_price))"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Xử lý đơn hàng</h3>
      </div>
      <form class="form-horizontal">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Hình thức thanh toán</label>
            <div class="col-sm-4">
              <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: PaymentMethods,  optionsText: 'name', optionsValue: 'id', value: PaymentMethodId"></select>
            </div>
            <label class="col-sm-2 control-label">Tình trạng thanh toán</label>
            <div class="col-sm-4">
              <select class="form-control" data-bind="value: IsPaid" style="width: 100%; padding: 0px 5px;">
                <option value="0">Chưa thanh toán</option>
                <option value="1">Đã thanh toán</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Dự kiến giao hàng</label>
            <div class="col-sm-4">
              <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: EstimatedDeliveries,  optionsText: 'name', optionsValue: 'id', value: EstimatedDeliveryId"></select>
            </div>
            <label class="col-sm-2 control-label">Trạng thái đơn hàng</label>
            <div class="col-sm-4">
              <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: OrderStatues,  optionsText: 'name', optionsValue: 'id', value: OrderStatusId"></select>
            </div>
          </div>
        </div>
        <div class="box-footer">
          @if(\AppHelper::instance()->hasPermission('ORDER_EDIT'))
          <button class="btn btn-info pull-right" data-bind="click: saveOrder">Save</button>
          @endif
        </div>
      </form>
    </div>
  </section>
</div>

@endsection

@section('script')
<script src="{{asset('admin_asset/order_edit.js')}}"></script>
<script>
  $(document).ready(function() {
    $('#treeOrder').addClass("active");
    var data = {};
    var options = {};

    data.Order = <?php echo json_encode($Order); ?>;

    data.OrderStatues = <?php echo json_encode($OrderStatues); ?>;
    data.PaymentMethods = <?php echo json_encode($PaymentMethods); ?>;
    data.EstimatedDeliveries = <?php echo json_encode($EstimatedDeliveries); ?>;

    options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
    options.PublicPath = <?php echo json_encode(url('')); ?>;
    options.SaveOrder = <?php echo json_encode(url(config('constants.ADMIN_PREFIX') . '/order/edit')); ?>;
    data.API_URLs = options;

    ko.applyBindings(new FormViewModel(data));
    //Initialize Select2 Elements

  })
</script>
@endsection