@extends('admin.layout.header')
@section('headerTitle')
Bài viết
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
  <section class="content" data-bind="with: blogModel">
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
              <label for="exampleInputEmail1">Tên bài viết</label>
              <input type="text" class="form-control" data-bind="value: Name" placeholder="Tên bài viết">
            </div>
            <div class="form-group">
              <label>Mô tả</label>
              <input type="text" class="form-control" name="Description" placeholder="Mô tả" data-bind="value: Description">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Hình ảnh</label>
              <input type="file" id="uploadFile" class="form-control-file" name="uploadFile" data-bind="event: { change: uploadImages }">
              <input type="hidden" name="Image" data-bind="value: Image">
            </div>
            <div class="form-group">
              <!-- ko if: Image() -->
              <ul class="list-group">
                <li class="list-group-item" style="display: inline-grid; border: 0px; padding: 1px 3px;">
                  <img data-bind="attr: { src: $root.ImagePath() + '/' + Image() }" style='width:auto; max-height: 200px;'>
                </li>
              </ul>
              <!-- /ko -->
            </div>

            <div class="form-group">
              <label>Nội dung</label>
              <textarea id="editor1" name="editor1" rows="10" cols="150">
                      </textarea>

            </div>

            <div class="form-group">
              <label>Tags</label>
              <select id="flowerTags" data-bind="event: { change: changeTag }" class="form-control select2" multiple="multiple" data-placeholder="Thêm tags cho bài viết" style="width: 100%;">
                <!-- ko foreach: _Tags -->
                <option selected data-bind="text: $data"></option>
                <!-- /ko -->
              </select>
              <input type="hidden" name="Tags" data-bind="value: Tags">
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" data-bind="checked: IsActive"> Active
              </label>
            </div>

          </div>
          <div class="box-footer">
            @if(\AppHelper::instance()->hasPermission('BLOG_EDIT'))
            <button type="button" class="btn btn-primary pull-right" data-bind="click: $root.saveBlog">Save</button>
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
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/ckfinder/ckfinder.js')}}"></script>
<script src="{{asset('admin_asset/blog_edit.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#treeBlog').addClass("active");
    document.getElementById("tabBlogList").classList.add("active");
    CKEDITOR.replace('editor1')
    //Initialize Select2 Elements
    var data = {};
    var options = {};
    data.blog = <?php echo json_encode($blog); ?>;
    options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
    options.UploadImage = <?php echo json_encode(url(config('constants.ADMIN_PREFIX') . '/uploadImage')); ?>;
    options.EditBlog = <?php echo json_encode(url(config('constants.ADMIN_PREFIX') . '/blog/editPost')); ?>;
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