@extends('admin.layout.header')

@section('headerTitle')
Admin - Danh sách Slide
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách Slide</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <div class="input-group-btn">
                    <a href="{{url('admin/slide/create')}}" class="btn btn-default" style="float: right;"><i class="fa fa-plus"></i>&nbsp;Thêm Slide</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th></th>
                  </tr>
                </thead>
               <tbody data-bind="foreach: Slides">
                    <tr>
                        <td data-bind="text: Title"></td>
                        <td><img data-bind="attr:{src: $root.ImagePath()+ '/' + Image}" style="max-width: 200px; height: auto;"></td>
                        <td>
                             <a href="#" data-bind="click: $root.removeSlide"  title="Xóa" class="text-danger"><i class="fa fa-trash-o"></i></a>
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

@endsection

@section('script')
<script src="{{asset('admin_asset/admin_slide/admin-slide-index.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
     $('#treeSetting').addClass("active");
     document.getElementById("tabSettingSlide").classList.add("active");
    var data = {};
    var options={};
    data.Slides = <?php echo json_encode($slides); ?>;
    options.RemoveSlide = <?php echo json_encode(url('admin/slide/delete')); ?>;
    options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
   
  });

</script>
@endsection
