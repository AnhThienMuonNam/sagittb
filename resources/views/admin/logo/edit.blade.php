@extends('admin.layout.header')
@section('headerTitle')
Admin - Logo
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
              <h3 class="box-title">Logo</h3>
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
                    <input type="file" id="uploadFile"  class="form-control-file" name="uploadFile"  data-bind="event: { change: uploadImages }">
                    <input type="hidden" name="Image" data-bind="value: Logo">
              </div>
               <div class="form-group">
                  <!-- ko if: Logo() -->
                   <div class='col-md-2'>
                      <div class='thumbnail' style="text-align: center;">
                        <img data-bind="attr: { src: $root.ImagePath() + '/' + Logo() }" style='width:auto; max-height: 200px;'>
                      </div>
                  </div>
               <!-- /ko -->
              </div>
              </div>
              <!-- /.box-body -->
            </form>
             <div class="box-header with-border">
              <h3 class="box-title">Favicon</h3>
            </div>
            <form role="form" action="create" enctype="multipart/form-data" method="POST">
              <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
              <div class="box-body">
              <div class="form-group">
                    <input type="file" id="uploadFavicon"  class="form-control-file" name="uploadFavicon"  data-bind="event: { change: uploadFaviconImage }">
                    <input type="hidden" name="Image" data-bind="value: Favicon">
              </div>
               <div class="form-group">
                  <!-- ko if: Favicon() -->
                   <div class='col-md-2'>
                      <div class='thumbnail' style="text-align: center;">
                        <img data-bind="attr: { src: $root.ImagePath() + '/' + Favicon() }" style='width:auto; max-height: 200px;'>
                      </div>
                  </div>
               <!-- /ko -->
              </div>
              </div>
              <!-- /.box-body -->
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

<script src="{{asset('admin_asset/admin_setting/admin-logo-index.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
     $('#treeSetting').addClass("active");
     document.getElementById("tabSettingLogo").classList.add("active");
    var data = {};
    data = <?php echo json_encode($logo_favicon); ?> ;
    var options = {};
    options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
    options.EditLogo = <?php echo json_encode(url('/admin/logo')); ?>;

    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
   
  });

</script>
@endsection

