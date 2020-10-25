@extends('admin.layout.header')

@section('headerTitle')
Bài viết
@endsection

@section('content')

<div class="content-wrapper">
  <section class="content">
    <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Bài viết</th>
                  <th>Ngày đăng</th>
                  <th>Trạng thái</th>
                  <th></th>
                </tr>
              </thead>
              <tbody data-bind="foreach: Blogs">
                <tr>
                  <td data-bind="text: id"></td>
                  <td><a data-bind="attr: { href: 'blog/' + id }, text: name"></a></td>
                  <td data-bind="text: created_at"></td>
                  <td data-bind="text: is_active ? 'Active' : 'Inactive'"></td>
                  <td>
                    @if(\AppHelper::instance()->hasPermission('BLOG_DELETE'))
                    <a href="#" data-bind="click: $root.removeBlog" title="Xóa" class="text-danger"><i class="fa fa-trash-o fa-2x"></i></a>
                    @endif
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('script')
<script src="{{asset('admin_asset/blog_index.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#treeBlog').addClass("active");
    document.getElementById("tabBlogList").classList.add("active");
    var data = {};
    var options = {};

    data.Blogs = <?php echo json_encode($blogs); ?>;
    options.DeleteBlog = <?php echo json_encode(url(config('constants.ADMIN_PREFIX') . '/blog/delete')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
  });
</script>
@endsection