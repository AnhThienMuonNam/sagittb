@extends('admin.layout.header')
@section('headerTitle')
Thêm Topic
@endsection

@section('css')

@endsection


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
  Thêm Topic
    </h1>
  </section>

  <!-- Main content -->
  <section class="content" data-bind="with: topicModel">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
         <!-- ko if: $root.NotifyErrors -->
          <div class="alert alert-danger">
            <span data-bind="text: $root.NotifyErrors"></span>
          </div>
         <!-- /ko -->

          <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Dòng 1</label>
              <input type="text" class="form-control"  data-bind="value: Line1" placeholder="Dòng 1">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Dòng 2</label>
              <input type="text" class="form-control"  data-bind="value: Line2" placeholder="Dòng 2">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Dòng 3</label>
              <input type="text" class="form-control"  data-bind="value: Line3" placeholder="Dòng 3">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Url</label>
              <input type="text" class="form-control"  data-bind="value: Url" placeholder="Url">
            </div>

           <div class="form-group">
             <label for="exampleInputEmail1">Hình ảnh</label>
             <input type="file" id="uploadFile"  class="form-control-file" name="uploadFile"  data-bind="event: { change: uploadImages }">
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

        <div class="checkbox">
           <label>
             <input type="checkbox" data-bind="checked: IsActive"> Hiển thị
           </label>
       </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="button" class="btn btn-primary" data-bind="click: $root.saveTopic">Tạo Topic</button>
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

  @endsection

  @section('script')
  <script src="{{asset('admin_asset/admin_setting/topic/create.js')}}"></script>

  <script type="text/javascript">
   $(document).ready(function() {
    $('#treeSetting').addClass("active");
    document.getElementById("tabSettingTopic").classList.add("active");

    var data = {};
    var options = {};

    options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
    options.UploadImage = <?php echo json_encode(url('/admin/uploadImage')); ?>;
    options.CreateTopic = <?php echo json_encode(url('/admin/topic/createPost')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));

  });
</script>

      @endsection
