 @extends('page2.layout.master')


@section('content')
 <!--page heading-->
  <section style="background: url({{asset('images/'.$Category->image)}});">
    <div class="inner-bg">
      <div class="inner-head wow fadeInDown">
        <h3 style="background-color: rgba(0, 0, 0, 0.4); display: inline-block;padding: 10px;">{{$Category->name}}</h3>
      </div>
    </div>
  </section>
   <div id="page-category" class="container">
    <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
    <div class="shop-in">
      <!--breadcrumbs -->
      <div class="col-md-12">
        <div class="bread2">
          <ul>
            <li><a href="{{url('')}}">TRANG CHỦ</a>
            <li>/</li>
            <li data-bind="text: category().name"></li>
          </ul>
        </div>
      </div>
      <div class="clearfix"> </div>

      <!--right-side-->
      <div class="col-md-12">
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
        <div class="breadcrumbs" style="text-align: center;">
          <button type="button" class="btn btn-default" style="color: black; padding-left: 20px; padding-right: 20px;" data-bind="click: seeMoreProducts">XEM THÊM</button>
         <!--  <a style="float: right;" class="" href="">XEM THÊM >>></a> -->
        </div>
        <!-- /ko -->
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="clearfix"></div>
@endsection

@section('script')

<script src="{{asset('page_asset/page-category.js')}}"></script>
<script type="text/javascript">
 $(document).ready(function() {
  var data = {};
  var options = {};
  data.Category = <?php echo json_encode($Category); ?>;
  data.Products = <?php echo json_encode($Products); ?>;

  options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
  options.PublicPath = <?php echo json_encode(url('')); ?>;

  options.FilterProducts = <?php echo json_encode(url('filterProducts')); ?>;
  options.SeeMoreProducts = <?php echo json_encode(url('seeMoreProducts')); ?>;

  data.API_URLs = options;

  ko.applyBindings(CategoryViewModel(data), document.getElementById("page-category"));
});

</script>
@endsection
