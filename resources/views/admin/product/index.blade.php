@extends('admin.layout.header')

@section('headerTitle')
Sản phẩm
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sản phẩm
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
       <div class="box box-info">
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tên/Mô tả</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" data-bind="value: sKeyword" placeholder="Từ khóa">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Danh mục</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="width: 100%; padding: 0px 5px;" data-bind="options: Categories, optionsCaption:'-- Chọn danh mục --', optionsText: 'name', optionsValue: 'id', value: sCategoryId"></select>
                  </div>
                </div>
                <div class="form-group">
                   <label for="inputPassword3" class="col-sm-2 control-label">Tình trạng</label>
                  <div class="col-sm-10">
                     <select class="form-control" data-bind="value: sIsActive" style="width: 100%; padding: 0px 5px;" >
                       <option value="">-- Chọn tình trạng --</option>
                       <option value="0">Hết hàng</option>
                       <option value="1">Còn hàng</option>
                     </select>
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

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="col-xs-0">Mã</th>
                    <th class="col-xs-2">Tên sản phẩm</th>
                    <th class="col-xs-2">Danh mục</th>
                    <th class="col-xs-2">Giá (VND)</th>
                    <th class="col-xs-1">Tình trạng</th>
                    <th class="col-xs-2">Ngày tạo</th>
                    <th class="col-xs-2">Cập nhật</th>
                    <th class="col-xs-1"></th>
                  </tr>
                </thead>
                <tbody data-bind="foreach: Products">
                    <tr>
                        <td class="col-xs-0" data-bind="text: id"></td>
                        <td class="col-xs-2" data-bind="text: name"></td>
                        <td class="col-xs-2" data-bind="text: category.name"></td>
                        <td class="col-xs-2" data-bind="text: price"></td>
                        <td class="col-xs-1" data-bind="text: is_active == 1 ? 'Còn hàng' : 'Hết hàng'"></td>
                         <td class="col-xs-2" data-bind="text: created_at"></td>
                          <td class="col-xs-2" data-bind="text: updated_at"></td>
                        <td class="col-xs-1">
                            <a data-bind="attr: { href: 'product/edit/' + id }"  title="Sửa" class="text-yellow"><i class="fa fa-pencil fa-2x"></i></a>&nbsp;
                            <a href="#" data-bind="click: $root.removeProduct"  title="Xóa" class="text-danger"><i class="fa fa-trash-o fa-2x"></i></a>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('script')
<script src="{{asset('admin_asset/product/index.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
   $('#treeProduct').addClass("active");
    document.getElementById("tabProductList").classList.add("active");
    var data = {};
    var options = {};
    data.Products = <?php echo json_encode($Products); ?>;
    data.Categories = <?php echo json_encode($Categories); ?>;

    options.DeleteProduct = <?php echo json_encode(url('/admin/product/delete')); ?>;
    options.Search = <?php echo json_encode(url('/admin/product/search')); ?>;

    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
});

</script>
@endsection
