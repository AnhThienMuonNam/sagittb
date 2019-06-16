@extends('admin.layout.header')

@section('headerTitle')
Charm
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Charm
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
       <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                      <div class="input-group-btn">
                          <a href="#" data-bind="click: createView" class="btn btn-default">Thêm Charm</a>
                      </div>
                  </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                  </tr>
                </thead>
                <tbody data-bind="foreach: Charms">
                    <tr>
                      <td data-bind="text: id"></td>
                        <td data-bind="text: name"></td>
                        <td data-bind="text: $root.formatMoney(price)"></td>
                        <td data-bind="text: is_active ? 'Yes' : 'No'"></td>
                        <td>
                            <a href="#" data-bind="click: $root.editView"  title="Sửa" class="text-yellow"><i class="fa fa-pencil fa-2x"></i></a>&nbsp;
                            <a href="#" data-bind="click: $root.removeCharm"  title="Xóa" class="text-danger"><i class="fa fa-trash-o fa-2x"></i></a>
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
  <div class="modal modal-default fade" id="modal-charm">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title">Info Modal</h4>
       </div>
       <div class="modal-body" data-bind="with: itemModel">
         <div class="form-group">
              <label>Tên</label>
              <input type="text" class="form-control" placeholder="Tên" data-bind="value: name">
          </div>
          <div class="form-group">
               <label>Giá</label>
               <input type="text" class="form-control" placeholder="Giá" data-bind="value: price">
           </div>
           <div class="form-group">
             <label>Hình ảnh</label>
             <input type="file" id="uploadFile"  class="form-control-file" name="uploadFile"  data-bind="event: { change: uploadImages }">
             <input type="hidden" name="Image" data-bind="value: image">
           </div>
           <div class="form-group">
             <!-- ko if: image() -->
               <div class='thumbnail' style="text-align: center;">
                 <img data-bind="attr: { src: $root.ImagePath() + '/' + image() }" style='width:auto; max-height: 200px;'>
               </div>
             <!-- /ko -->
           </div>
            <div class="form-group">
                 <label>Trạng thái</label>
                 <select class="form-control" data-bind="value: is_active">
                   <option value="1">Active</option>
                   <option value="0">Inactive</option>
                 </select>
             </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
         <button type="button" class="btn btn-info" data-bind="click: saveEdit">Save</button>
       </div>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->
@endsection

@section('script')
<script src="{{asset('admin_asset/admin_setting/charm/admin-charm.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#treeSetting').addClass("active");
    document.getElementById("tabSettingCharm").classList.add("active");
    var data = {};
    var options = {};

    data.Charms = <?php echo json_encode($Charms); ?> ;

    options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
    options.UploadImage = <?php echo json_encode(url('/admin/uploadImage')); ?>;
    options.DeleteCharm = <?php echo json_encode(url('/admin/charm/delete')); ?>;
    options.EditCharm = <?php echo json_encode(url('/admin/charm/editPost')); ?>;
    options.CreateCharm = <?php echo json_encode(url('/admin/charm/createPost')); ?>;
    data.API_URLs = options;
    ko.applyBindings(new FormViewModel(data));
});

</script>
@endsection
