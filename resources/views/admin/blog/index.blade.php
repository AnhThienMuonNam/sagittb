@extends('admin.layout.header')

@section('headerTitle')
Danh sách Bài viết
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Danh sách Bài viết
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Mã</th>
                    <th>Tên bài viết</th>
                    <th>Ngày đăng</th>
                    <th>Đang hiển thị</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody data-bind="foreach: Blogs">
                    <tr>
                      <td data-bind="text: id"></td>
                        <td data-bind="text: name"></td>
                        <td data-bind="text: created_at"></td>
                        <td data-bind="text: is_active ? 'Yes' : 'No'"></td>
                        <td>
                            <a data-bind="attr: { href: 'blog/edit/' + id }"  title="Sửa" class="text-yellow"><i class="fa fa-pencil fa-2x"></i></a>&nbsp;
                            <a href="#" data-bind="click: $root.removeBlog"  title="Xóa" class="text-danger"><i class="fa fa-trash-o fa-2x"></i></a>
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
  <!-- /.content-wrapper -->

@endsection

@section('script')
<script src="{{asset('admin_asset/blog/index.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#treeBlog').addClass("active");
    document.getElementById("tabBlogList").classList.add("active");
    var data = {};
    var options = {};

    data.Blogs = <?php echo json_encode($blogs); ?> ;
    options.DeleteBlog = <?php echo json_encode(url('/admin/blog/delete')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
});

</script>
@endsection
