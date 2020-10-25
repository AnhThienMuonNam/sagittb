@extends('admin.layout.header')
@section('headerTitle')
Đơn hàng
@endsection

@section('css')

@endsection
@section('content')

<div class="content-wrapper">
    <section class="content" data-bind="with: orderModel">
        <div class="box box-info">
            <!-- ko if: $root.NotifyErrors -->
            <div class="alert alert-danger">
                <span data-bind="text: $root.NotifyErrors"></span>
            </div>
            <!-- /ko -->
            <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />

            <form class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Users</label>
                        <div class="col-sm-4">
                            <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: $root.Users,  optionsText: 'name', optionsValue: 'id', value: customer_id, optionsCaption: '-- Chọn User --'"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Khách hàng</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" data-bind="value: customer_name" placeholder="Khách hàng">
                        </div>
                        <label class="col-sm-2 control-label">SĐT</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" data-bind="value: customer_phone" placeholder="SĐT">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" data-bind="value: customer_email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Đường, số nhà</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" data-bind="value: customer_address" placeholder="Địa chỉ nhận hàng">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Phường/Quận</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" data-bind="value: customer_district" placeholder="Phường/Quận">
                        </div>
                        <label class="col-sm-2 control-label">Tỉnh/TP</label>
                        <div class="col-sm-4">
                            <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: $root.Cities,  optionsText: 'name', optionsValue: 'id', value: customer_city_id, optionsCaption: '-- Chọn Tỉnh/TP --'"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ghi chú</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" data-bind="value: customer_note" placeholder="Ghi chú">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Đơn hàng&nbsp;</h3><span style="cursor: pointer; font-style: italic;" data-bind="click: addOrderDetail">(Thêm)</span>
            </div>
            <ul class="list-group">
                <!-- ko foreach: orderDetails -->
                <li class="list-group-item">
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label class=" col-sm-2 control-label">Chọn S/p</label>
                                <div class="col-sm-4">
                                    <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: $root.Products,  optionsText: 'name', optionsValue: 'id', value: product_id, optionsCaption: '-- Chọn S/p --'"></select>
                                </div>
                                <label class="col-sm-2 control-label">Tên s/p</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" data-bind="value: product_name" placeholder="Tên s/p">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" col-sm-2 control-label">Đơn giá</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" data-bind="value: product_price" placeholder="Giá">
                                    <span data-bind="text: $root.formatMoney(product_price())"></span>
                                </div>
                                <label class="col-sm-2 control-label">S.lg</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" data-bind="value: product_quanlity" placeholder="Số lượng">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <span style="cursor: pointer;" title="Xoá" class="text-danger pull-right" data-bind="click: $parent.removeOrderDetail"> <i class="fa fa-trash-o "></i></span>
                        </div>
                    </form>
                </li>
                <!-- /ko -->
            </ul>
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
                            <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: $root.PaymentMethods,  optionsText: 'name', optionsValue: 'id', value: payment_method_id"></select>
                        </div>
                        <label class="col-sm-2 control-label">Tình trạng thanh toán</label>
                        <div class="col-sm-4">
                            <select class="form-control" data-bind="value: is_paid" style="width: 100%; padding: 0px 5px;">
                                <option value="0">Chưa thanh toán</option>
                                <option value="1">Đã thanh toán</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Dự kiến giao hàng</label>
                        <div class="col-sm-4">
                            <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: $root.EstimatedDeliveries,  optionsText: 'name', optionsValue: 'id', value: estimated_delivery_id"></select>
                        </div>
                        <label class="col-sm-2 control-label">Trạng thái đơn hàng</label>
                        <div class="col-sm-4">
                            <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: $root.OrderStatues,  optionsText: 'name', optionsValue: 'id', value: order_status_id"></select>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    @if(\AppHelper::instance()->hasPermission('ORDER_ADD'))
                    <button class="btn btn-info pull-right" data-bind="click: $root.saveOrder">Add</button>
                    @endif
                </div>
            </form>
        </div>
    </section>
</div>

@endsection

@section('script')
<script src="{{asset('admin_asset/order_create.js')}}"></script>
<script>
    $(document).ready(function() {
        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
        }
        $('#treeOrderAdd').addClass("active");
        var data = {};
        var options = {};
        data.UserId = getUrlParameter('userId');
        data.Products = <?php echo json_encode($Products); ?>;
        data.OrderStatues = <?php echo json_encode($OrderStatues); ?>;
        data.PaymentMethods = <?php echo json_encode($PaymentMethods); ?>;
        data.EstimatedDeliveries = <?php echo json_encode($EstimatedDeliveries); ?>;
        data.Users = <?php echo json_encode($Users); ?>;
        data.Cities = <?php echo json_encode($Cities); ?>;

        options.CreateOrder = <?php echo json_encode(url(config('constants.ADMIN_PREFIX') . '/order/createPost')); ?>;

        data.API_URLs = options;

        ko.applyBindings(new FormViewModel(data));
    })
</script>
@endsection