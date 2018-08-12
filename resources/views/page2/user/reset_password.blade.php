@extends('page2.layout.master')

@section('css')

@endsection


@section('content') 
<!--container-->
<div class="container" style="padding-top: 60px;" id="page-reset-password">
  <div class="shop-in">
    <div>
      <div class="bread2">
        <ul>
          <li><a href="{{url('')}}">TRANG CHỦ</a>
          <li>/</li>
          <li>KHôi phục mật khẩu</li>
        </ul>
      </div>
    </div>
    <div class="clearfix"> </div>
    <div>
      <div class="inner-section">
        <!-- ko if: NotifyErrors -->
        <div class="alert alert-danger">
            <span data-bind="text: NotifyErrors"></span>
        </div>
        <!-- /ko -->
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading panel-bg" role="tab" id="headingTwo">
              <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Đổi mật khẩu</a> </h4>
            </div>
            <div id="collapseTwo" style="width: 100%;" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body form-horizontal"> 
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Mật khẩu mới*</label>
                    <div class="col-sm-10">          
                        <input type="password" class="form-control" placeholder="Mật khẩu mới"  data-bind="value: NewPassword">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Mật khẩu mới x2*</label>
                    <div class="col-sm-10">          
                        <input type="password" class="form-control" placeholder="Mật khẩu mới x2"  data-bind="value: NewPasswordx2">
                    </div>
                </div>
                
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-default" style="color: black;"  data-bind="click: changePassword">Đổi mật khẩu</button>
                    </div>
                </div>
               </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- panel-group -->
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="clearfix"></div>
</div>
<!--container-->
<div class="clearfix"></div>

@endsection


@section('script') 

<script src="{{asset('page_asset/page-reset-password.js')}}"></script>
 <script type="text/javascript">
     $(document).ready(function() {
      var data = {};
      var options = {};
      data.Token = <?php echo json_encode($Token); ?>;
 
      options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
      options.PublicPath = <?php echo json_encode(url('')); ?>;
      options.UpdateUser = <?php echo json_encode(url('user/updateUser')); ?>;
      options.ResetPassWord = <?php echo json_encode(url('resetPasswordPagePost')); ?>;

      data.API_URLs = options;

      ko.applyBindings(FormViewModel(data), document.getElementById("page-reset-password"));
    });

</script>
@endsection