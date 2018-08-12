@extends('admin.layout.header')
@section('headerTitle')
Admin - Cập nhật Đơn hàng
@endsection

@section('css')

@endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Đơn hàng
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Thông tin Khách hàng Đơn hàng Mã: <strong>{{$Order->id}}</strong> - Ngày đặt hàng: <strong>{{$Order->created_at}}</strong></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tên khách hàng</label>
                  <div class="col-sm-4">
                    <input type="text" readonly="readonly" class="form-control" id="inputEmail3" value="{{$Order->customer_name}}" placeholder="Từ khóa">
                  </div>
                  <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                  <div class="col-sm-4">
                    <input type="text" readonly="readonly" class="form-control" id="inputEmail3" value="{{$Order->customer_phone}}" placeholder="Từ khóa">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email khách hàng</label>

                  <div class="col-sm-4">
                    <input type="text" readonly="readonly" class="form-control" id="inputEmail3" value="{{$Order->customer_email}}" placeholder="Từ khóa">
                  </div>

                   <label for="inputPassword3" class="col-sm-2 control-label">Tài khoản đặt hàng</label>
                 <div class="col-sm-4">
                 @if($Order->customer_id)
                    <input type="text" readonly="readonly" class="form-control" id="inputEmail3" value="Có" placeholder="Từ khóa">
                  @else
                  <input type="text" readonly="readonly" class="form-control" id="inputEmail3" value="Không" placeholder="Từ khóa">
                  @endif
                  </div>

                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Địa chỉ nhận hàng</label>
                 <div class="col-sm-10">
                    <input type="text" readonly="readonly" class="form-control" id="inputEmail3" value="{{$Order->customer_address.', '.$Order->customer_district.', '.$Order->customer_city}}" placeholder="Từ khóa">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Ghi chú</label>
                 <div class="col-sm-10">
                    <input type="text" readonly="readonly" class="form-control" id="inputEmail3" value="{{$Order->customer_note}}" placeholder="Từ khóa">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

            </form>
          </div>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Chi tiết đơn hàng</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
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
              <!-- /.box-body -->
            </form>
          </div>

          <!-- /.box -->
        </div>
      </div>

       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Thông tin & Cập nhật đơn hàng</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                   <label for="inputPassword3" class="col-sm-2 control-label">Hình thức thanh toán</label>
                   <div class="col-sm-4">
                    <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: PaymentMethods,  optionsText: 'name', optionsValue: 'id', value: PaymentMethodId"></select>
                  </div>
                   <label for="inputPassword3" class="col-sm-2 control-label">Tình trạng thanh toán</label>
                 <div class="col-sm-4">
                 <select class="form-control" data-bind="value: IsPaid" style="width: 100%; padding: 0px 5px;">
                      <option value="0">Chưa thanh toán</option>
                      <option value="1">Đã thanh toán</option>
                    </select>
                  </div>
                </div>

                 <div class="form-group">
                   <label for="inputPassword3" class="col-sm-2 control-label">Dự kiến giao hàng</label>
                   <div class="col-sm-4">
                   <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: EstimatedDeliveries,  optionsText: 'name', optionsValue: 'id', value: EstimatedDeliveryId"></select>
                  </div>
                   <label for="inputPassword3" class="col-sm-2 control-label">Trạng thái đơn hàng</label>
                 <div class="col-sm-4">
                   <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: OrderStatues,  optionsText: 'name', optionsValue: 'id', value: OrderStatusId"></select>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-info pull-right" data-bind="click: saveOrder">Cập nhật đơn hàng</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('script')
<script src="{{asset('admin_asset/admin-order-edit.js')}}"></script>
<script>
  $(document).ready(function() {
    $('#treeOrder').addClass("active");
    document.getElementById("tabOrderList").classList.add("active");
    var data = {};
    var options = {};

    data.Order = <?php echo json_encode($Order); ?>;

    data.Sizes = <?php echo json_encode($Sizes); ?>;
    data.Kieudays = <?php echo json_encode($Kieudays); ?>;
    data.Charms = <?php echo json_encode($Charms); ?>;
  
    data.OrderStatues = <?php echo json_encode($OrderStatues); ?>;
    data.PaymentMethods = <?php echo json_encode($PaymentMethods); ?>;
    data.EstimatedDeliveries = <?php echo json_encode($EstimatedDeliveries); ?>;
    data.SizeCoTays = <?php echo json_encode($SizeCoTays); ?>;

    options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
    options.PublicPath = <?php echo json_encode(url('')); ?>;
    options.SaveOrder = <?php echo json_encode(url('admin/order/edit')); ?>;
    data.API_URLs = options;

    ko.applyBindings(new FormViewModel(data));
    //Initialize Select2 Elements

  })
</script>
@endsection
