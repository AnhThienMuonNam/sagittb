@extends('admin.layout.header')

@section('headerTitle')
Danh mục sản phẩm
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh mục sản phẩm
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
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody data-bind="foreach: Categories">
                    <tr>
                      <td data-bind="text: id"></td>
                        <td data-bind="text: name"></td>
                        <td data-bind="text: is_active ? 'Yes' : 'No'"></td>
                        <td>
                            <a data-bind="attr: { href: 'category/edit/' + id }"  title="Sửa" class="text-yellow"><i class="fa fa-pencil fa-2x"></i></a>&nbsp;
                            <a href="#" data-bind="click: $root.removeCategory"  title="Xóa" class="text-danger"><i class="fa fa-trash-o fa-2x"></i></a>
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
<script src="{{asset('admin_asset/category/index.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#treeCategory').addClass("active");
    document.getElementById("tabCategoryList").classList.add("active");
    var data = {};
    var options = {};

    data.Categories = <?php echo json_encode($categories); ?> ;
    options.DeleteCategory = <?php echo json_encode(url('/admin/category/delete')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
});

</script>
@endsection
