@extends('admin.layout.header')
@section('headerTitle')
Admin - Thêm Slide
@endsection

@section('css')
 
@endsection
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Cài đặt
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
              <h3 class="box-title">Thêm Slide</h3>
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
            <form role="form" action="create" enctype="multipart/form-data" method="POST">
              <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tiêu đề</label>
                  <input type="text" class="form-control" name="Title" placeholder="Mô tả">
                </div>
                
              <div class="form-group">
                  <label for="exampleInputEmail1">Hình ảnh</label>
                    <input type="file" id="uploadFile"  class="form-control-file" name="uploadFile"  data-bind="event: { change: uploadImages }">
                    <input type="hidden" name="Image" data-bind="value: Image">
              </div>
               <div class="form-group">
                 <div id="image_preview"></div>
                  <!-- ko if: Image() -->
                   <div class='col-md-2'>
                      <div class='thumbnail' style="text-align: center;">
                        <img data-bind="attr: { src: $root.ImagePath() + '/' + Image() }" style='width:auto; max-height: 200px;'>
                        <a href='#' data-bind='click: $root.removeImage'>Xóa</a>
                      </div>
                  </div>
               <!-- /ko -->
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
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

<script src="{{asset('admin_asset/admin_slide/admin-slide-create.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
     $('#treeSetting').addClass("active");
     document.getElementById("tabSettingSlide").classList.add("active");
    var data = {};
    var options={};
    options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
    options.UploadImage = <?php echo json_encode(url('/admin/flower/uploadImage')); ?>;
    options.DeleteImage = <?php echo json_encode(url('/admin/flower/deleteImage')); ?>;

    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
   
  });

</script>
@endsection

