@extends('admin.layout.header')

@section('headerTitle')
Admin - Tin tức Sự kiện
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap3-wysihtml5.min.css')}}">
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
              <h3 class="box-title">Tin tức Sự kiện</h3>
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
            <form role="form" action="event" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
              <div class="box-body">
                <div class="form-group">
                  <div class="box-body pad">
                      <textarea class="textarea" placeholder="Sự kiện"
                                name="Content"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$event->Content}}
                      </textarea>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
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
<script type="text/javascript">
   $(document).ready(function() {
     $('.textarea').wysihtml5()
     $('#treeSetting').addClass("active");
     document.getElementById("tabSettingEvent").classList.add("active");
  });
</script>
@endsection