@extends('admin.layout.header')
@section('headerTitle')
Admin - Thêm Danh mục
@endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh mục
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
              <h3 class="box-title">Thêm Danh mục</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- ko if: NotifyErrors -->
              <div class="alert alert-danger">
                <span data-bind="text: NotifyErrors"></span>
              </div>
            <!-- /ko -->

            	<input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
              <div class="box-body">
                 <div class="form-group">
                  <label for="exampleInputEmail1">Tên</label>
                  <input type="text" class="form-control"  data-bind="value: categoryName" placeholder="Tên danh mục">
                </div>
                 <div class="checkbox">
                  <label>
                    <input type="checkbox" data-bind="checked: categoryIsActive" > Active
                  </label>
                </div>
                 <div class="checkbox">
                  <label>
                    <input type="checkbox" data-bind="checked: categoryIsCustom" > Tùy chỉnh sản phẩm
                  </label>
                </div>


                  <!-- ko if: categoryIsCustom() == true -->
                <div class="form-group">
                  <label for="exampleInputEmail1">Kiểu dây <span style="cursor: pointer; font-style: italic;" data-bind="click: addKieuday">(Thêm kiểu dây)</span></label>
                  <ul class="list-group">
                   <!-- ko foreach: currentKieudays -->
                   <li class="list-group-item">
                      <span data-bind="text: $data.name"></span>
                       <span style="cursor: pointer; float: right;" data-bind="click: $root.removeKieuday">
                          <i class="fa fa-trash-o"></i>
                      </span>
                      <span style="cursor: pointer; float: right;" data-bind="click: $root.editKieuday">
                          <i class="fa fa-pencil"></i>&nbsp;&nbsp;
                      </span>
                    </li>
                    <!-- /ko -->
                  </ul>
                </div>

                <!-- /ko -->
                <div class="form-group">
                  <label for="exampleInputPassword1">Meta description</label>
                  <textarea class="form-control" style="resize: vertical; width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="MetaDescription" placeholder="Meta description"></textarea>
                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1">Hình ảnh</label>
                    <input type="file" id="uploadFile"  class="form-control-file" name="uploadFile"  data-bind="event: { change: uploadImages }">
                    <input type="hidden" name="Image" data-bind="value: categoryImage">
              </div>
                <div class="form-group">
                  <!-- ko if: categoryImage() -->
                   <div class='col-md-2'>
                      <div class='thumbnail' style="text-align: center;">
                        <img data-bind="attr: { src: $root.ImagePath() + '/' + categoryImage() }" style='width:auto; max-height: 200px;'>
                      </div>
                  </div>
               <!-- /ko -->
              </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-primary" data-bind="click: saveCategory">Thêm danh mục</button>
              </div>

          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


 <div class="modal fade" id="modal-kieuday">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Kiểu dây</h4>
          </div>
          <div class="modal-body" data-bind="with: kieudayViewModel">
              <div class="box-body">
                  <input type="hidden" data-bind="value: id" >
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên</label>
                  <input type="text" class="form-control" data-bind="value: fakeName" placeholder="Tên">
                </div>

              </div>
              <!-- /.box-body -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary" data-bind="click: saveKieuday">OK</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
</div>



@endsection
@section('script')
<script src="{{asset('admin_asset/admin-category-create.js')}}"></script>

<script type="text/javascript">
   $(document).ready(function() {
    $('#treeCategory').addClass("active");
    document.getElementById("tabCategoryCreate").classList.add("active");

    var data = {};
    var options = {};

    options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
    options.UploadImage = <?php echo json_encode(url('/admin/category/uploadImage')); ?>;
    options.CreateCategory = <?php echo json_encode(url('/admin/category/createPost')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
  });
</script>
@endsection
