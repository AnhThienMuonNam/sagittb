@extends('page2.layout.master')


@section('content')

<section style="background: url({{asset('')}});">
  <div class="inner-bg">
    <div class="inner-head wow fadeInDown">
      <h3 style="background-color: rgba(0, 0, 0, 0.4); display: inline-block;padding: 10px;">BLOG</h3>
    </div>
  </div>
</section>
<!--page heading-->
 <div id="page-blog" class="blog-bg">
  <div class="container">
    <div class="shop-in">
      <!--breadcrumbs -->
      <div class="bread2">
        <ul>
          <li><a href="{{url('')}}">TRANG CHỦ</a></li>
          <li>/</li>
          <li><a href="{{url('blog')}}">BLOG</a></li>
          <li>/</li>
          <li data-bind="text: Blog().name"></li>
        </ul>
      </div>
      <!--breadcrumbs -->
      <div class="clearfix"> </div>
      <div class="row">
        <!--Blog-left-side-->
        <div class="col-md-8">
          <div class="blog-in">
            <div class="wow fadeIn">
              <h1 data-bind="text: Blog().name"></h1>
              <ul class="comm-date">
                   <li><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;<span data-bind="text: Blog().created_at"></span> </li>
              </ul>
              <div><img src="images/blog1.jpg" alt="" title="" class="img-responsive"></div>
            </div>
            <div class="blog-text wow fadeIn">




<p data-bind="html: showContent(Blog().content)"></p>




<hr class="pro-hr">

<div class="clearfix"></div>


            </div>
            <div class="clearfix"></div>
          </div>



        </div>
        <!--Blog-left-side-->
        <!--Blog-right-side-->
        <div class="col-md-4 col-sm-13">
          <div class="row">
            <div class="col-md-12 col-sm-6">
              <div class="blog-right wow fadeIn">
                <h1>Đọc nhiều nhất</h1>
                <div class="clearfix"></div>
                <div class="row">
                    <!-- ko foreach: PopularPosts -->
                  <div class="col-md-4 col-sm-5 col-xs-3"> <img data-bind="attr: { src: ImagePath() + '/' + image }" alt="" title="" class="img-responsive"> </div>
                  <div class="col-md-8 col-sm-7 col-xs-9">
                    <h4><a data-bind="attr:{href: PublicPath()+'/blog/'+ $data.alias+'/'+$data.id},text: name"></a></h4>
                    <p data-bind="text: created_at"></p>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-12">
                    <hr>
                  </div>
                  <div class="clearfix"></div>
                  <!-- /ko -->

                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-6">
              <div class="blog-right wow fadeIn">
                <h1>Tags</h1>
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="tag-list">
                      <ul>
                        <li><a href="#" class="#" title="Tags"><i class="fa fa-tag"></i> corporate </a></li>
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <!--Blog-right-side-->
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
</div>
@endsection

@section('script')
<script src="{{asset('page_asset/page-blog-detail.js')}}"></script>
<script type="text/javascript">
 $(document).ready(function() {
  var data = {};
  var options = {};
  data.Blog = <?php echo json_encode($blog); ?>;
  data.PopularPosts = <?php echo json_encode($popularPosts); ?>;


  options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
  options.PublicPath = <?php echo json_encode(url('')); ?>;

  data.API_URLs = options;

  ko.applyBindings(FormViewModel(data), document.getElementById("page-blog"));
});

</script>
@endsection
