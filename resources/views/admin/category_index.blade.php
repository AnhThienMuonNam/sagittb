@extends('admin.layout.header')
@section('headerTitle')
Danh mục
@endsection

@section('content')

<div class="content-wrapper">
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
                  <th>ID</th>
                  <th>Danh mục</th>
                  <th>Custom</th>
                  <th>Trạng thái</th>
                  <th></th>
                </tr>
              </thead>
              <tbody data-bind="foreach: Categories">
                <tr>
                  <td data-bind="text: id"></td>
                  <td><a data-bind="attr: { href: 'category/' + id }, text: name" title="Sửa"></a></td>
                  <td data-bind="text: is_custom ? 'Yes' : 'No'"></td>
                  <td data-bind="text: is_active ? 'Active' : 'Inactive'"></td>
                  <td>
                    @if(\AppHelper::instance()->hasPermission('CATEGORY_DELETE'))
                    <a href="#" data-bind="click: $root.removeCategory" title="Xóa" class="text-danger"><i class="fa fa-trash-o fa-2x"></i></a>
                    @endif
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
<script src="{{asset('admin_asset/category_index.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#treeCategory').addClass("active");
    document.getElementById("tabCategoryList").classList.add("active");
    var data = {};
    var options = {};

    data.Categories = <?php echo json_encode($categories); ?>;
    options.DeleteCategory = <?php echo json_encode(url(config('constants.ADMIN_PREFIX') . '/category/delete')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
  });
</script>
@endsection