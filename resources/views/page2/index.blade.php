 @extends('page2.layout.master')

 @section('css')
 <style>
   .category-in_cusom_h4 {
     margin: 0;
     padding: 10px 0;
     font-size: 20px;
     text-align: center;
     background: #dfb859;
     text-transform: capitalize;
   }

   @media (max-width: 1024px) {
     .footer-logos .owl-nav {
       top: -20%;

     }

     .categoryImageIndex img {
       max-width: 100% !important;
     }
   }
 </style>
 @endsection

 @section('content')
 <div id="page-single">
   <!--slider-->
   <section>
     <div class='fluidHeight'>
       <div class='sliderContainer'>
         <div class='iosSlider'>
           <div class='slider'>
             @foreach($Topics as $item)
             <div class='item'>
               <div class='title-css'>
                 <h4>{{$item->line1}}</h4>
                 <h3>{{$item->line2}}</h3>
                 <h5>{{$item->line3}}</h5>
                 <p class="shopbt"><a href="{{url($item->url)}}" class="hvr-icon-wobble-horizontal">XEM NGAY</a></p>
               </div>
               <img src="{{asset('images/'.$item->image)}}" alt="" title="" />
             </div>
             @endforeach
           </div>
         </div>
       </div>
     </div>
   </section>

   <!-- Popular Collections-->
   <section class="content-section specific-module tetpbg">
     <div class="div-center">
       <div class="specific-content">
         <h1 class="title-h wow fadeInDown" style="text-transform: none;">Sản phẩm mới</h1>
         <!-- ko if: IsShowLoading() == true -->
         <div style="text-align: center;"> <img src="{{asset('images/default/loading.gif')}}"> </div>
         <!-- /ko -->

       </div>
       <div class="flex-sp-moi" style="display: flex; align-items: center; flex-wrap: wrap;">

         <!-- ko foreach: HotProducts -->
         <div class="col-md-3 col-sm-3 col-xs-6 text-center wow fadeIn" style="float: none">
           <div class="box-css"> <a data-bind="attr:{href: PublicPath()+'/san-pham/'+$data.alias+'/'+$data.id}">
               <img data-bind="attr: { src: ImagePath() + '/' + getFirstImage($data.images) }" class="img-responsive" alt="" style="display: table-cell; margin: 0 auto;max-height: 285px;min-width: 50px;">
               <div class="opacitybox white">
                 <div class="boxcontent">
                   <h4 class="white" data-bind="text: $data.name"></h4>
                   <h3 class="white" data-bind="text: formatMoney($data.price)"></h3>
                 </div>
               </div>
             </a>
           </div>
         </div>
         <!-- /ko -->
       </div>
       <div class="clearfix"></div>
       <!-- <div class="View-all  wow fadeInDown"><a href="#">XEM THÊM >>><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div> -->
       <div class="clearfix"></div>
     </div>
     <div class="clearfix"></div>
   </section>
   <!-- Jewelleries for every Occasion-->
   <section class="content-section text-center product-bg">
     <div class="col-md-8 col-center">
       <div class="title-heading  wow fadeInUp">
         <h3>BLOG <a href="{{url('blog')}}" target="_blank" style="font-size:12px; font-style: italic;">(Xem thêm)</a></h3>
       </div>
       <!-- ko if: IsShowLoading() == true -->
       <div style="text-align: center;"> <img src="{{asset('images/default/loading.gif')}}"> </div>
       <!-- /ko -->
     </div>
     <div class="clearfix"></div>
     <div class="img-div3">
       <!-- ko foreach: NewestBlogs -->
       <div class="col-md-6 col-sm-6 wow fadeInLeft"> <a data-bind="attr:{href: PublicPath()+'/blog/'+$data.alias+'/'+$data.id}" class="right-img">
           <div><img data-bind="attr: { src: ImagePath() + '/' + $data.image, title: $data.name}" class="img-responsive grayscale" alt=""></div>
         </a>
         <div class="clearfix"></div>
       </div>
       <!-- /ko -->
     </div>
     <div class="clearfix"></div>
     <div class="clearfix"></div>
   </section>

   <!--best of our store-->
   <section class="content-section">
     <div class="best-div">
       <div class="best-of-our-store">
         <h2 class="wow fadeInUp" style="text-transform: none;">Bán nhiều nhất</h2>
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
               &nbsp;&nbsp;<samp></samp></p>
           </div>
           @endforeach
         </div>
       </div>
       <div class="clearfix"></div>
     </div>
     <div class="clearfix"></div>
   </section>
   <!--shop by category-->

   <section class="content-section" style="background: #f4f4f4;padding-bottom: 0px;">
     <div class="best-div" style="background: #f4f4f4;">
       <div class="best-of-our-store">
         <h2 class="wow fadeInUp" style="text-transform: none;">Danh mục sản phẩm</h2>
         <div class="popular-brands footer-logos content-section categoryImageIndex" style="background: #f4f4f4;">
           <div id="owl-demo" class="owl-carousel owl-carousel-2 wow fadeInDown">
             @foreach($MenuCategories as $item)
             <div class="item">
               <figure class="effect-moses">
                 <a href="{{url('danh-muc/'.$item->alias.'/'.$item->id)}}">
                   <img src="{{asset('images/'.$item->image)}}" alt="" title="" />
                 </a>
               </figure>
               <h4 class="category-in_cusom_h4"><a style="color: #fff;" href="{{url('danh-muc/'.$item->alias.'/'.$item->id)}}">{{$item->name}}</a></h4>
             </div>
             @endforeach
           </div>
         </div>
       </div>
       <div class="clearfix"></div>
     </div>
     <div class="clearfix"></div>
   </section>

   <section>
     <div class="tetpbg" style="background: #fff;">
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
                       <div class="clients text-center"><img src="{{asset('images/coma.jpg')}}" class="coma1" alt="" title=""> cũng bình thuờng <img src="{{asset('images/coma2.jpg')}}" class="coma12" alt="" title=""></div>
                       <p class="clients-name">- Thiện said - </p>
                     </div>
                   </div>
                 </div>
                 <!-- Quote 2 -->
                 <div class="item">
                   <div class="row">
                     <div class="col-sm-9 col-center text-center"> <img class="img-circle" src="{{asset('images/testimonial-be2.jpg')}}" alt="" title=""> </div>
                     <div class="col-sm-9 col-center">
                       <div class="clients text-center"><img src="{{asset('images/coma.jpg')}}" class="coma1" alt="" title=""> Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller <img src="{{asset('images/coma2.jpg')}}" class="coma12" alt="" title=""></div>
                       <p class="clients-name"> - Tao said - </p>
                     </div>
                   </div>
                 </div>
               </div>
               <!-- Carousel Buttons Next/Prev -->
               <a data-slide="prev" href="#quote-carousel" class="left left-arrow"><i class="fa fa-chevron-left"></i></a> <a data-slide="next" href="#quote-carousel" class="right right-arrow"><i class="fa fa-chevron-right"></i></a>
             </div>
           </div>
         </div>
         <div class="clearfix"></div>
       </div>
       <div class="clearfix"></div>
     </div>
   </section>

   <!--latest jewellery collection-->
   <section class="bg-2 content-section" style="background: #f4f4f4;">
     <h2 class="text-center  wow fadeInDown">INSTAGRAM <a href="https://www.instagram.com/sagittb_com/" target="_blank" style="font-size:12px; font-style: italic;">(Xem thêm)</a></h2>
     <!-- ko if: IsShowInstagramLoading() == true -->
     <div style="text-align: center;"> <img src="{{asset('images/default/loading.gif')}}"> </div>
     <!-- /ko -->
     <div class="clearfix"></div>
     <div class="section">
       <link rel="stylesheet" type="text/css" href="{{asset('css/set2.css')}}" />
       <div id="masonry-7" class="masonry one_column full-width">
         <div class="content img-div">
           <ul>
             <!-- ko foreach: ObjIns -->
             <li class="wow fadeIn">
               <div class="grid">
                 <figure class="effect-apollo"> <img alt="" style="max-height:280px;" data-bind="attr: { src: $data.images.standard_resolution.url }" />
                   <figcaption>
                     <p data-bind="text: $data.caption.text"></p>
                     <a data-bind="attr: { href: $data.link }">View more</a>
                   </figcaption>
                 </figure>
               </div>
             </li>
             <!-- /ko -->
           </ul>
         </div>
       </div>
     </div>
   </section>
 </div>
 <div class="clearfix"></div>

 @endsection

 @section('script')
 <script src="{{asset('page_asset/page-index.js')}}"></script>

 <script type="text/javascript" src="{{asset('js/scrolltopcontrol.js')}}"></script>

 <script type="text/javascript">
   $(document).ready(function() {
     var data = {};
     var options = {};

     options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
     options.PublicPath = <?php echo json_encode(url('')); ?>;
     options.GetProductsIndex = <?php echo json_encode(url('getProductsIndex')); ?>;
     options.GetInstagram = <?php echo json_encode(url('getInstagram')); ?>;

     data.API_URLs = options;
     ko.applyBindings(IndexViewModel(data), document.getElementById("page-single"));

   });
 </script>
 @endsection