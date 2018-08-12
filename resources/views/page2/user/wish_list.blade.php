 @extends('page2.layout.master')


@section('content')
 <!--page heading-->
  <!-- <section>
    <div class="inner-bg">
      <div class="inner-head wow fadeInDown" style="color: black;">
        <h3>Danh sách yêu thích</h3>
      </div>
    </div>
  </section> -->
   <div id="page-wish-list" class="container" style="padding-top: 60px;">
    <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
    <div class="shop-in">
      <!--breadcrumbs -->
      <div class="col-md-12">
        <div class="bread2">
          <ul>
            <li><a href="{{url('')}}">TRANG CHỦ</a>
            <li>/</li>
            <li>Danh sách yêu thích</li>
          </ul>
        </div>
      </div>
      <div class="clearfix"> </div>
      <!--left-side-->
      <div class="col-md-3">
        <button data-toggle="collapse" data-target="#div-open" class="menu-icon"></button>
        <div class="clearfix"></div>
        <div id="div-open" class="collapse  wow fadeIn">
          <div class="row">
            <div class="col-md-12 col-sm-6">
              <div class="cat-div  wow fadeIn">
                <h2>Danh mục</h2>
                <div class="Category">
                  <ul>
                    <!-- ko foreach: Categories -->
                    <li>
                      <label>
                        <input  type="checkbox" checked data-bind="value: $data.id,attr:{id: 'checkboxCategory-'+$data.id}, event:{ change: filterCategories }">
                        <span data-bind="text: $data.name"></span>
                      </label>
                    </li>
                    <!-- /ko -->
                  </ul>
                </div>
                <div class="clearfix"> </div>
              </div>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
      </div>
      <!--right-side-->
      <div class="col-md-9">
         <!-- ko if: products().length > 0 -->
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-6 select-p" style="padding-bottom: 10px;">
            <select class="selectpicker select-1" data-style="btn-primary" data-bind="options: optionSorts, optionsText: 'name', optionsValue: 'id', value: optionSortId">

            </select>
          </div>

        </div>
        <div class="clearfix"></div>
        <div class="row">
          <!-- ko foreach: products -->
          <div class="col-md-4 col-sm-4 col-xs-6 thum-mrg wow fadeIn">
            <div class="col-lg-12 padd0">
              <div class="product-hover">
                <div><a data-bind="attr:{href: PublicPath()+'/san-pham/'+$data.alias+'/'+$data.id}"> <img src="{{asset('images/magnifier.svg')}}" width="20" height="20"></a> &nbsp;&nbsp; </div>
              </div>
              <div><img data-bind="attr: { src: ImagePath() + '/' + getFirstImage($data.images) }" alt="" title="" class="img-responsive img-boder-css" style="display: table-cell; margin: 0 auto; max-height: 285px;min-width: 50px;"></div>
              <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 name-pro" data-bind="text: $data.name"></div>
              <div class="clearfix"></div>


              <div class="col-md-6 col-sm-6 name-pro"><span data-bind="text: formatMoney($data.price)"></span>&nbsp;<span class="text-0"></span>
              </div>

            </div>
          </div>
          <!-- /ko -->
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <hr>

        <!-- /ko -->
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="clearfix"></div>
@endsection

@section('script')

<script src="{{asset('page_asset/page-wish-list.js')}}"></script>
<script type="text/javascript">
 $(document).ready(function() {
  var data = {};
  var options = {};
  data.Categories = <?php echo json_encode($Categories); ?>;
  data.Products = <?php echo json_encode($Products); ?>;


  options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
  options.PublicPath = <?php echo json_encode(url('')); ?>;

  options.FilterWishList = <?php echo json_encode(url('user/filterWishList')); ?>;
  data.API_URLs = options;

  ko.applyBindings(WishListViewModel(data), document.getElementById("page-wish-list"));
});

</script>
@endsection
