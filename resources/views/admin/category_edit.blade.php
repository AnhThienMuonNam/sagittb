@extends('admin.layout.header')
@section('headerTitle')
Danh mục
@endsection

@section('css')
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

<div class="content-wrapper">
  <section class="content" data-bind="with: categoryModel">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- ko if: $root.NotifyErrors -->
          <div class="alert alert-danger">
            <span data-bind="text: $root.NotifyErrors"></span>
          </div>
          <!-- /ko -->
          <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Tên</label>
              <input type="text" class="form-control" data-bind="value: Name" placeholder="Tên danh mục">
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" data-bind="checked: IsActive"> Active
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" data-bind="checked: IsCustom"> Tùy chỉnh sản phẩm
              </label>
            </div>

            <div class="form-group" data-bind="style: { display: IsCustom() == true ? 'block' : 'none' }">
              <label>Kích thước vòng tay/dây chuyền</label>
              <input type="text" class="form-control" data-bind="value: SizeVongName" placeholder="Tên mục ">

              <select id="sizeVongsList" data-bind="event: { change: changeSizeVong }" class="form-control select2" multiple="multiple" data-placeholder="Thêm thẻ cho sản phẩm" style="width: 100%;">

              </select>
              <input type="hidden" name="Tags" data-bind="value: SizeVongs">
            </div>

            <div class="form-group" data-bind="style: { display: IsCustom() == true ? 'block' : 'none' }">
              <label for="exampleInputEmail1">Kiểu dây <span style="cursor: pointer; font-style: italic;" data-bind="click: addKieuday">(Thêm)</span></label>
              <input type="text" class="form-control" data-bind="value: KieudayName" placeholder="Tên mục ">

              <ul class="list-group">
                <!-- ko foreach: Kieudays -->
                <li class="list-group-item">
                  <span>Tên</span>
                  <input type="text" data-bind="value: name" placeholder="Tên">&nbsp;
                  <span>Giá tiền</span>
                  <input type="number" data-bind="value: value" placeholder="Giá tiền">
                  <span style="cursor: pointer;" title="Xoá" data-bind="click: $parent.removeKieuday"> <i class="fa fa-trash-o"></i> </span>
                </li>
                <!-- /ko -->
              </ul>
            </div>

            <div class="form-group" data-bind="style: { display: IsCustom() == true ? 'block' : 'none' }">
              <label for="exampleInputEmail1">Size hạt/đá/mặt dây chuyền <span style="cursor: pointer; font-style: italic;" data-bind="click: addSizeHat">(Thêm)</span></label>
              <input type="text" class="form-control" data-bind="value: SizeHatName" placeholder="Tên mục ">

              <ul class="list-group">
                <!-- ko foreach: SizeHats -->
                <li class="list-group-item">
                  <span>Kích thước</span>
                  <input type="text" data-bind="value: name" placeholder="Kích thước">&nbsp;
                  <span>Giá tiền</span>
                  <input type="number" data-bind="value: value" placeholder="Giá tiền">
                  <span style="cursor: pointer;" title="Xoá" data-bind="click: $parent.removeSizeHat"> <i class="fa fa-trash-o"></i> </span>
                </li>
                <!-- /ko -->
              </ul>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Hình ảnh</label>
              <input type="file" id="uploadFile" class="form-control-file" name="uploadFile" data-bind="event: { change: uploadImages }">
              <input type="hidden" name="Image" data-bind="value: Image">
            </div>
            <div class="form-group">
              <!-- ko if: Image() -->
              <div class='col-md-2'>
                <div class='thumbnail' style="text-align: center;">
                  <img data-bind="attr: { src: $root.ImagePath() + '/' + Image() }" style='width:auto; max-height: 200px;'>
                </div>
              </div>
              <!-- /ko -->
            </div>
          </div>
          <div class="box-footer">
            @if(\AppHelper::instance()->hasPermission('CATEGORY_EDIT'))
            <button type="button" class="btn btn-primary pull-right" data-bind="click: $root.saveCategory">Save</button>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection

@section('script')
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script src="{{asset('admin_asset/category_edit.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#treeCategory').addClass("active");
    document.getElementById("tabCategoryList").classList.add("active");

    var data = {};
    var options = {};

    data.category = <?php echo json_encode($category); ?>;

    options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
    options.UploadImage = <?php echo json_encode(url(config('constants.ADMIN_PREFIX') . '/uploadImage')); ?>;
    options.EditCategory = <?php echo json_encode(url(config('constants.ADMIN_PREFIX') . '/category/editPost')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));

    //Initialize Select2 Elements
    $('.select2').select2({
      tags: true,
      selectOnBlur: true,
      multiple: true
    });
  });
</script>

@endsection