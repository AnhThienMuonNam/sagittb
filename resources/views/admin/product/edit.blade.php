@extends('admin.layout.header')
@section('headerTitle')
Admin - Cập nhật Sản phẩm
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
  <style type="text/css">
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3c8dbc;
    border-color: #367fa9;
    padding: 1px 10px;
    color: #fff;
}
  </style>
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
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cập nhật Sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <!-- ko if: NotifyErrors -->
            <div class="alert alert-danger">
              <span data-bind="text: NotifyErrors"></span>
            </div>
            <!-- /ko -->

            <form role="form" action="" method="POST">
            	<input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên*</label>
                  <input type="text" class="form-control" name="Name" placeholder="Nhập tên" data-bind="value: name">
                </div>
                 <div class="form-group">
                  <label>Danh mục*</label>
                    <select class="form-control" data-bind="options: categories, optionsText: 'name', optionsValue: 'id', value: categoryId, optionsCaption: '-- Chọn danh mục --'">
                  </select>
                </div>
                 <div class="form-group">
                  <label>Hạt*</label>
                    <select class="form-control" data-bind="options: pieces, optionsText: 'name', optionsValue: 'id', value: pieceId, optionsCaption: '-- Chọn hạt --'">
                  </select>
                </div>

                <div class="form-group">
                 <label>Số lượng hạt*</label>
                      <input type="number" class="form-control" name="Name" placeholder="Nhập tên" data-bind="value: quantityOfPieces">
               </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Giá tiền VND* (Giá sản phẩm hoặc giá lẻ của loại hạt)</label>
                  <input type="number" name="Price" class="form-control" placeholder="Nhập giá tiền" data-bind="value: price">
                </div>
                <div class="form-group">
                  <label>Tags</label>
                  <select id="flowerTags" data-bind="event: { change: changeTag }" class="form-control select2" multiple="multiple" data-placeholder="Thêm thẻ cho sản phẩm" style="width: 100%;">
                    <!-- ko foreach: _tags -->
                     <option selected data-bind="text: $data"></option>
                      <!-- /ko -->
                  </select>
                  <input type="hidden" name="Tags" data-bind="value: tags">
              </div>

                 <div class="checkbox">
                    <label>
                      <input type="checkbox" data-bind="checked: isActive"> Còn hàng
                    </label>
                </div>
                 <div class="checkbox">
                      <label>
                          <input type="checkbox" data-bind="checked: isHot"> Sản phẩm Hot
                      </label>
                </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                          <textarea placeholder="Mô tả"
                                name="Description"
                                style="resize: vertical; width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" data-bind="value: description">
                      </textarea>
                </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Meta description</label>
                    <textarea  name="MetaDescription"  placeholder="Meta description"
                                  style="resize: vertical; width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" data-bind="value: metaDescription"></textarea>
                </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Hình ảnh*</label>
                    <input type="file" id="uploadFile"  class="form-control-file" name="uploadFile"  data-bind="event: { change: uploadImages }">
                    <input type="hidden" name="Images" data-bind="value: images">
              </div>
                <div class="form-group">
                 <div id="image_preview"></div>
                  <!-- ko foreach: images -->
                   <div class='col-md-2'>
                      <div class='thumbnail' style="text-align: center;">
                        <img data-bind="attr: { src: $root.ImagePath() + '/' + $data }" style='width:auto; max-height: 200px;'>
                        <a href='#' data-bind='click: $root.removeImage'>Xóa</a>
                      </div>
                  </div>
               <!-- /ko -->
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-primary" data-bind="click: editProduct">Cập nhật sản phẩm</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('script')
<script src="{{asset('js/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script src="{{asset('admin_asset/admin-product-edit.js')}}"></script>
<script type="text/javascript">
   $(document).ready(function() {
     $('.textarea').wysihtml5();
    $('#treeProduct').addClass("active");
     document.getElementById("tabProductList").classList.add("active");
    var data = {};
    var options={};

    data.Product = <?php echo json_encode($Product); ?>;
    data.Categories = <?php echo json_encode($Categories); ?>;
    data.Pieces = <?php echo json_encode($Pieces); ?>;

    options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
    options.UploadImage = <?php echo json_encode(url('/admin/product/uploadImage')); ?>;
    options.DeleteImage = <?php echo json_encode(url('/admin/product/deleteImage')); ?>;
    options.EditProduct = <?php echo json_encode(url('/admin/product/editPost')); ?>;

    data.API_URLs = options;

    ko.applyBindings(new FormViewModel(data));
    //Initialize Select2 Elements
    $('.select2').select2({
        tags: true,
        selectOnBlur: true,
        multiple: true
    });
  })
</script>
@endsection
