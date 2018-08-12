@extends('page2.layout.master')

@section('css')

@endsection


@section('content') 
<section>
    <div class="inner-bg1">
      <div class="inner-head wow fadeInDown">
        <h3>VỀ CHÚNG TÔi</h3>
      </div>
    </div>
  </section>
  <!--About Us-->
  <section class="content-section specific-module">
    <div class="col-lg-8  div-center div-center2">
      <div class="specific-content">
        <h5 class="black wow fadeInDown">Discover Our Jewellery</h5>
        <h1 class="title-h wow fadeInDown"> Collections </h1>
        <div class="wow fadeIn text-style">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vulputate nisi vel metus scelerisque, eu auctor mauris fringilla. Mauris hendrerit congue sapien, quis aliquet velit tempus sed. Sed ac purus augue.</p>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div class="container">
      <div class="col-md-6 about-left wow fadeInLeft">&nbsp;</div>
      <div class="col-md-6  wow fadeInRight">
        <div class="about-text">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras commodo varius vehicula. Mauris porta metus vitae nulla dignissim egestas. Aliquam sed molestie eros, in pharetra purus. Praesent consequat porta viverra. Praesent gravida dapibus condimentum. Vestibulum vel lacus aliquet, laoreet mi eu, tempor est. Quisque volutpat finibus tristique.  Praesent gravida dapibus condimentum. Vestibulum vel lacus aliquet, laoreet mi eu, tempor est. Quisque volutpat finibus tristique.</p>
          <p class="marg-0"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras commodo varius vehicula. Mauris porta metus vitae nulla dignissim egestas. Aliquam sed molestie eros, in pharetra purus. Praesent consequat porta viverra. Praesent gravida dapibus condimentum. Vestibulum vel lacus aliquet, laoreet mi eu, tempor est. Quisque volutpat finibus tristique. Duis at nibh eget nulla pretium pretium. Quisque arcu sem, dignissim eu egestas quis, vulputate non mauris.  Praesent gravida dapibus condimentum. Vestibulum vel lacus aliquet, laoreet mi eu, tempor est. Quisque volutpat finibus tristique.  Praesent gravida dapibus condimentum.  Praesent gravida dapibus condimentum. Vestibulum vel lacus aliquet, laoreet  </p>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </section>

  <div class="clearfix"></div>
  <!--testimonials-->
  <div class="tetpbg">
    <div class="container">
      <div class="row">
        <div class='col-md-12 text-center'>
          <div class="title-box  wow fadeIn">
            <h2>Hear what our <span>clients</span> say</h2>
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
                  <div class="col-sm-9 col-center text-center"> <img class="img-circle" src="images/testimonial-be.jpg" alt="" title=""> </div>
                  <div class="col-sm-9 col-center">
                    <div class="clients text-center"><img src="images/coma.jpg" class="coma1" alt="" title="">  Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller  <img src="images/coma2.jpg" class="coma12" alt="" title=""></div>
                    <p class="clients-name">- Clients name - </p>
                  </div>
                </div>
              </div>
              <!-- Quote 2 -->
              <div class="item">
                <div class="row">
                  <div class="col-sm-9 col-center text-center"> <img class="img-circle" src="images/testimonial-be2.jpg" alt="" title=""> </div>
                  <div class="col-sm-9 col-center">
                    <div class="clients text-center"><img src="images/coma.jpg" class="coma1" alt="" title="">  Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller   <img src="images/coma2.jpg" class="coma12" alt="" title=""></div>
                    <p class="clients-name"> - Clients name - </p>
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

@endsection

@section('script') 


@endsection