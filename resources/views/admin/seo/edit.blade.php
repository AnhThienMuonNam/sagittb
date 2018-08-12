@extends('admin.layout.header')
@section('headerTitle')
Admin - Cấu hình SEO
 
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
              <h3 class="box-title">Cấu hình SEO</h3>
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
            <form role="form" action="seo" enctype="multipart/form-data" method="POST">
              <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" value="{{$seo->Title}}" name="Title" placeholder="Title">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                   <textarea class="form-control" style="resize: vertical; width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="Description" placeholder="Description">{{$seo->Description}}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Keyword</label>
                   <textarea class="form-control" style="resize: vertical; width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="Keyword" placeholder="Keyword">{{$seo->Keyword}}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Other</label>
                   <textarea class="form-control" style="resize: vertical; width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="Other" placeholder="Other">{{$seo->Other}}</textarea>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
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

<script type="text/javascript">
  $(document).ready(function() {
     $('#treeSetting').addClass("active");
     document.getElementById("tabSettingSeo").classList.add("active");
   
  });

</script>
@endsection

