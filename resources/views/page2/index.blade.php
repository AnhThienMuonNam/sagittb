 @extends('page2.layout.master')


@section('content')
 <!--slider-->
  <section>
    <div class = 'fluidHeight'>
      <div class = 'sliderContainer'>
        <div class = 'iosSlider'>
          <div class = 'slider'>
            @foreach($Topics as $item)
            <div class = 'item'>
              <div class = 'title-css'>
                <h4>{{$item->line1}}</h4>
                <h3>{{$item->line2}}</h3>
                <h5>{{$item->line3}}</h5>
                <p class="shopbt"><a href="product.html" class="hvr-icon-wobble-horizontal">XEM NGAY </a></p>
              </div>
              <img src = "{{asset('images/'.$item->image)}}"  alt="" title="" />
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Popular Collections-->
  <section  class="content-section specific-module">
    <div class="div-center">
      <div class="specific-content">
        <h1 class="title-h wow fadeInDown" style="text-transform: none;">Sản phẩm mới</h1>
      </div>
      @foreach($HotProducts as $item)
      <div class="col-md-3 col-sm-3 col-xs-6 text-center wow fadeIn">
        <div class="box-css"> <a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}">
          <img src="{{asset('images/'.preg_replace('/^([^,]*).*$/', '$1', $item->images))}}" class="img-responsive" alt="" style="display: table-cell; margin: 0 auto;max-height: 285px;min-width: 50px;">
          <div class="opacitybox white">
            <div class="boxcontent">
              <h4 class="white">{{$item->name}}</h4>

                <h3 class="white">{{number_format($item->price, 0, ',', '.').'(đ)'}}</h3> </div>

          </div>
          </a>
        </div>
      </div>
      @endforeach
      <div class="clearfix"></div>
      <!-- <div class="View-all  wow fadeInDown"><a href="#">XEM THÊM >>><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div> -->
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </section>
  <!-- Jewelleries for every Occasion-->
  <!-- <section class="content-section text-center product-bg">
    <div class="col-md-8 col-center">
      <div class="title-heading  wow fadeInUp">
        <h3>Jewelleries for every Occasion</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="img-div3">
      <div class="col-md-6 col-sm-6 wow fadeInLeft"> <a href="product.html" class="right-img">
        <div><img src="images/products/2.jpg" class="img-responsive grayscale" alt="" title=""></div>
        </a>
        <div class="clearfix"></div>
      </div>
      <div class="col-md-6 col-sm-6 wow fadeInRight"> <a href="product.html" class="right-img">
        <div><img src="images/products/1.jpg" class="img-responsive grayscale" alt="" title=""></div>
        </a> </div>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
  </section> -->
  <!--best of our store-->
  <section class="content-section">
    <div class="best-div">

        <div class="best-of-our-store">
          <h2 class="wow fadeInUp"  style="text-transform: none;">Bán nhiều nhất</h2>
          <div class="owl-carousel owl-theme wow fadeIn">
             @foreach($BestProducts as $item)
            <div class="item img-title">
              <div class="owl-item-boder">
                <div class="hover-div">
                  <div class="our-store"> <a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}"><img src="{{asset('images/search.svg')}}" width="35"></a> </div>
                  <img src="{{asset('images/'.preg_replace('/^([^,]*).*$/', '$1', $item->images))}}" alt="" title="" class="img-responsive" style="display: table-cell; margin: 0 auto;max-height: 285px; min-width: 50px;">
                <!--   <div class="round-circles">Top sale</div> -->
                </div>
              </div>
              <h4><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}">{{$item->name}}</a></h4>
              <p class="price">

                <span>{{number_format($item->price, 0, ',', '.').'(đ)'}}</span>

                &nbsp;&nbsp;<samp><!-- $56.00 --></samp></p>
            </div>
            @endforeach
          </div>
        </div>

      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </section>
  <!--shop by category-->
  <section  class="content-section category">
    <div class="category-in">
      <h1 class="text-center wow fadeInUp"  style="text-transform: none;">Danh mục sản phẩm</h1>
      <div id="myCarousel" class="carousel slide wow fadeIn">
        <!-- Carousel items -->
        <div class="carousel-inner">
          <div class="item active">
            <ul>
              @foreach($MenuCategories as $item)
              <li>
                <div class="grid" style="padding-top: 10px;">
                  <figure class="effect-moses" >
                    <div class="zoom-hover"> <a href="{{url('danh-muc/'.$item->alias.'/'.$item->id)}}"><span class="glyphicon glyphicon-search"></span></a> </div>
                    <img src="{{asset('images/'.$item->image)}}" alt="" title="" class="img-responsive" style="max-height: 200px; width: 400px;"> </figure>
                </div>
                <h2><a style="color: white;" href="{{url('danh-muc/'.$item->alias.'/'.$item->id)}}">{{$item->name}}</a></h2>
              </li>
              @endforeach



            </ul>
            <!--/row-->
            <!--/row-->
          </div>
          <!--/item-->

          <!--/row-->
          <!--/item-->
          <!--/item-->
        </div>
        <!--/carousel-inner-->
       <!--  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-left fa-4"></i></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-right fa-4"></i></a>  -->
      </div>
    </div>
    <div class="clearfix"></div>
  </section>
  <!--latest jewellery collection-->
  @if(Auth::check())
  <section class="bg-2 content-section ">
    <h2 class="text-center  wow fadeInDown" style="text-transform: lowercase;">SẢN PHẨM YÊU THÍCH <a href="{{url('user/wish-list')}}" style="font-size:12px; font-style: italic;">(Xem thêm)</a></h2>
    <div class="clearfix"></div>
    <div class="section">
      <link rel="stylesheet" type="text/css" href="{{asset('css/set2.css')}}" />
      <div id="masonry-7" class="masonry one_column full-width">
        <div class="content img-div">
          <ul>
          @foreach($ProductsInWistlist as $item)
            <li class="wow fadeIn">
              <div class="grid">
                <figure class="effect-apollo"> <img alt="" title="" src="{{asset('images/'.preg_replace('/^([^,]*).*$/', '$1', $item->images))}}" style="display: table-cell; margin: 0 auto; max-height: 400px;"/>
                  <figcaption>
                    <h2>{{$item->name}}</h2>
                    <p>{{str_limit($item->description, 25)}}</p>
                    <a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}">View more</a> </figcaption>
                </figure>
              </div>
            </li>
          @endforeach

          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="clearfix"></div>
  <div class="tetpbg">
    <div class="container">
      <div class="row">
        <div class='col-md-12 text-center'>
          <div class="title-box  wow fadeIn" style="max-width: 540px;">
            <h2>Khách hàng nói gì về chúng tôi</h2>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class='row'>
        <div class='col-md-12 col-center'>
          <div class="carousel slide wow fadeIn" data-ride="carousel" id="quote-carousel">
            <!-- Carousel Slides / Quotes -->
            <div class="carousel-inner">
              <!-- Quote 1 -->
              <div class="item active">
                <div class="row">
                  <div class="col-sm-9 col-center text-center"> <img class="img-circle" src="{{asset('images/testimonial-be.jpg')}}" alt="" title=""> </div>
                  <div class="col-sm-9 col-center">
                    <div class="clients text-center"><img src="{{asset('images/coma.jpg')}}" class="coma1" alt="" title="">  cũng bình thuờng  <img src="{{asset('images/coma2.jpg')}}" class="coma12" alt="" title=""></div>
                    <p class="clients-name">- Thiện said - </p>
                  </div>
                </div>
              </div>
              <!-- Quote 2 -->
              <div class="item">
                <div class="row">
                  <div class="col-sm-9 col-center text-center"> <img class="img-circle" src="{{asset('images/testimonial-be2.jpg')}}" alt="" title=""> </div>
                  <div class="col-sm-9 col-center">
                    <div class="clients text-center"><img src="{{asset('images/coma.jpg')}}" class="coma1" alt="" title="">  Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller   <img src="{{asset('images/coma2.jpg')}}" class="coma12" alt="" title=""></div>
                    <p class="clients-name"> - Tao said - </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Carousel Buttons Next/Prev -->
            <a data-slide="prev" href="#quote-carousel" class="left left-arrow"><i class="fa fa-chevron-left"></i></a> <a data-slide="next" href="#quote-carousel" class="right right-arrow"><i class="fa fa-chevron-right"></i></a> </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="clearfix"></div>

  @endif
  <!--Popular Brands-->


  </section>
  <!--footer-->
  @endsection


@section('script')
<script type="text/javascript" src="{{asset('js/scrolltopcontrol.js')}}"></script>
@endsection
