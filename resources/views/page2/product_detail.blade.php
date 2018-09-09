@extends('page2.layout.master')

@section('css')
<style type="text/css">

.delete{
  display: none;
}
.delete1{
  display: block;
}
.removeItem:hover .delete {
 display:block
}
.removeItem:hover .delete1 {
 display:none
}
.btnpr{
  font-weight:bold;
  white-space:normal;
  display:inline-flex;
  background:#ffff;
  color: #dfb859;
  border: 1px solid #dfb859;
  border-radius: 7px;
}
.btnpr:hover {
    background-color: #dfb859;
    color: white;
}

</style>
@endsection


@section('content')
<!--page heading-->
<div id="page-single">
<section>
  <div class="inner-bg" style="background: url({{asset('images/'.$Product->category->image)}}) no-repeat center;">
    <div class="inner-head wow fadeInDown">
      <h3 style="background-color: rgba(0, 0, 0, 0.4); display: inline-block;padding: 10px;">{{$Product->name}}</h3>
    </div>
  </div>
</section>
<!--page heading-->
<!--container-->
<div class="container" data-bind="with: productModel">
  <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
  <div class="shop-in">
    <div class="col-md-12">
      <!--breadcrumbs -->
      <div class="bread2">
        <ul>
          <li><a href="{{url('')}}">TRANG CHỦ</a></li>
          <li>/</li>
          <li><a data-bind="text: Product().category.name, attr:{href: PublicPath()+'/danh-muc/'+Product().category.alias+'/'+Product().category.id}"></a></li>
          <li>/</li>
          <li data-bind="text: Name()"></li>
        </ul>
      </div>
      <!--breadcrumbs -->
    </div>
    <div class="clearfix"> </div>
    <!--Left side -->
    <div class="col-md-3 col-sm-3 div-none2 wow fadeInLeft">
      <div class="cat-div">
       <div class="col-md-12 col-sm-12 col-xs-4">
        <p>Xem màu sắc hợp phong thủy, hợp tuổi</p>
      </div>

      <div class="col-md-12 col-sm-12">
        <div class="form-group">
          <input type="number" placeholder="Năm sinh" class="form-control input-sm" data-bind="value: Nam">
        </div>
      </div>
      <div class="col-md-12 col-sm-12">
        <div class="form-group">
          <div class="secure">
            <a href="#" data-bind="click: getPhongThuy" style="height:35px; line-height: 35px;
            border-radius: 7px;">XEM</a>
          </div>
         <!-- <button style="background:#DDCA22; color: #1e1c1c; font-weight: bold;" type="button" class="btn" data-bind="click: getPhongThuy">XEM</button> -->
       </div>
     </div>
     <div class="clearfix"></div>
     <div data-bind="with: phongThuy" >
    <div class="clearfix"></div>
    <hr>

    <div class="col-md-12 col-sm-12 col-xs-12">
      <p><span style="font-weight: bold;">Mệnh:</span>&nbsp;<span data-bind="text: Menh"></span></p>
      <p><span style="font-weight: bold;">Tương sinh:</span>&nbsp;<span data-bind="text: TuongSinh"></span></p>
      <p><span style="font-weight: bold;">Hòa hợp:</span>&nbsp;<span data-bind="text: HoaHop"></span></p>
      <p><span style="font-weight: bold;">Chế khắc:</span>&nbsp;<span data-bind="text: CheKhac"></span></p>
      <p><span style="font-weight: bold;">Bị khắc:</span>&nbsp;<span data-bind="text: BiKhac"></span></p>
    </div>

    <div class="clearfix"></div>
    <hr>
    <div class="col-md-6 col-sm-12" >
      <div class="form-group">
            <button type="button" class="btn btnpr">
               <span style="text-align: center; font-size: 12px;">Xem thêm</span>
             </button>
      </div>
    </div>
    <div class="col-md-6 col-sm-12" >
      <div class="form-group">
            <button type="button" class="btn btnpr" >
               <span style="text-align: center; font-size: 12px;">Tư vấn</span>
             </button>
      </div>
    </div>
    <div class="clearfix"></div>
    </div>
  </div>
  <div class="cat-div">
    <h2>Sản phẩm liên quan</h2>
    <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
        @foreach($RelatedProducts as $item)
          <div class="product-scroll">
            <div class="col-md-6 col-sm-3 col-xs-6"><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}"><img src="{{asset('images/'.preg_replace('/^([^,]*).*$/', '$1', $item->images))}}" style="display: table-cell; margin: 0 auto;max-height: 70px; min-width: 30px;" alt="" title="" class="img-responsive"></a></div>
            <div class="col-md-6 col-sm-9 col-xs-6"> <h3><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}">{{$item->name}}</a></h3>
             <br>
              <h4>{{number_format($item->price, 0, ',', '.').'(đ)'}}</h4>
            </div>
          </div>
          <div class="clearfix"></div>
         @endforeach
        </div>
        @if(count($ProductSameMaterials) > 0)
        <div class="item">
        @foreach($ProductSameMaterials as $item)
          <div class="product-scroll">
            <div class="col-md-6 col-sm-3 col-xs-6"><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}"><img src="{{asset('images/'.preg_replace('/^([^,]*).*$/', '$1', $item->images))}}" style="display: table-cell; margin: 0 auto;max-height: 70px; min-width: 30px;" alt="" title="" class="img-responsive"></a></div>
            <div class="col-md-6 col-sm-9 col-xs-6"> <h3><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}">{{$item->name}}</a></h3>
             <br>
              @if($item->category->is_custom)
              <h4>{{number_format($item->price * $item->category->sizes->first()->value, 0, ',', '.').'(đ)'}}</h4>
              @else
              <h4>{{number_format($item->price, 0, ',', '.').'(đ)'}}</h4>
              @endif
            </div>
          </div>
          <div class="clearfix"></div>
         <hr>
         @endforeach
        </div>
        @endif
      </div>
      <!-- Controls -->
      <a class="left arrow-left" href="#carousel-example-generic2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right arrow-right" href="#carousel-example-generic2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
    </div>
  </div>
  <!--right side -->
  <div class="col-md-9 div-left wow fadeInRight">

    <div class="clearfix"></div>

    <div style="display:block; position:relative; max-width:1015px; padding-left:0px; margin:0;">
      <div class="flexslider" style="margin: 0 0 1px !important;">
        <ul class="slides">
          @foreach( $Images as $item )
          <li data-thumb="{{asset('images/'.$item)}}" >
            <img style="width: auto; height: 500px; margin: 0 auto;" src="{{asset('images/'.$item)}}" />
          </li>
          @endforeach
          <!-- items mirrored twice, total of 12 -->
        </ul>
      </div>

    <div class="clearfix">&nbsp;</div>
  </div>
  <!-- ko if: IsCustom() == true -->
  <div class="clearfix">&nbsp;</div>
  <div class="row">
    <div class="col-md-4">
      <span style="float: left;" data-bind="text: '&nbsp' + SizeHatName()"></span>
      <div class="form-group">
        <select id="checkout-country" class="js-countries" data-bind="options: SizeHats, optionsText: 'name', optionsValue: 'id', value: SizeHatId">
        </select>
      </div>
    </div>
    <div class="col-md-4">
     <span style="float: left;" data-bind="text: '&nbsp' + KieudayName()"></span>
     <div class="form-group">
      <select id="checkout-country" class="js-countries" data-bind="options: Kieudays, optionsText: $data, optionsValue: $data, value: KieudayId">
      </select>
    </div>
  </div>
 <div class="col-md-4">
  <span style="float: left;" data-bind="text: '&nbsp' + SizeVongName()"></span>
  <div class="form-group">
    <select id="checkout-country" class="js-countries" data-bind="options: SizeVongs, optionsText: $data, optionsValue: $data, value: SizeVongId">
    </select>
  </div>
</div>
</div>
<div class="clearfix"></div>

<!-- /ko -->

<div class="clearfix">&nbsp;</div>
<div class="price-2">
         <ul>
           <li class="tab1" style="background-color: #1e1c1c"> <span style="color: #DDCA22;" data-bind="text: formatMoney(Price())"></span></li>
           <li><a href="#" data-bind="click: addToCart"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> THÊM GIỎ HÀNG </a></li>
         </ul>
       </div>
       <div class="share-icon" >
        <a href="#" data-toggle="modal" data-target="#modalDesignProduct">  <i class="fa fa-puzzle-piece" aria-hidden="true"></i> <br>TỰ THIẾT KẾ</a>
        </div>
       <div class="socialmedia">
         <ul>
           <li><a href="#" data-bind="click: addToWishList"> <!-- ko if: IsInWishList() == true -->
                <i class="fa fa-heart" aria-hidden="true" style="color: #9D0808; "></i>
                <!-- /ko -->
                <!-- ko if: IsInWishList() == false -->
                <i class="fa fa-heart-o" aria-hidden="true"></i>
                <!-- /ko --></a>
            </li>
           <li><a href="#" title="Hồ điều ước">  <i class="fa fa-gift" aria-hidden="true"></i></a> </li>
           <li style="width: 80px;"><a href="#"><i class="fa fa-question" aria-hidden="true"></i>&nbsp;TƯ VẤN</a> </li>

         </ul>
       </div>
       <div class="read-full">
         <ul>
           <li><a data-toggle="collapse" data-target="#demo"> <span>XEM MÔ TẢ</span> </a></li>
           <li><a data-toggle="collapse" data-target="#demo"><img src="{{asset('images/products/arrow.jpg')}}" alt="" title=""></a> </li>
         </ul>
       </div>
       <div class="clearfix"></div>
<!-- //old button here -->

<div class="clearfix"></div>

<div id="demo" class="collapse">
  <div class="inner-div">
    <div class="col-md-12 col-sm-12 product-info">
      <h2>Thông tin sản phẩm</h2>
      <!-- <h6>SKU - 12458AF6</h6> -->
      <p data-bind="html: Description"></p>
      <p><img src="{{asset('images/products/line.jpg')}}"  alt="" title=""></p>
      <!-- <h2>Từ khóa</h2>
      <p>#tag1 #tag2 #00112233</p>
      <p><img src="{{asset('images/products/line.jpg')}}"  alt="" title=""></p> -->
    </div>
    <div class="clearfix"></div>
  </div>
</div>
</div>
<!--Left side -->
<div class="row">
  <div class="col-md-3 col-sm-3 div-none">
    <div class="row">
      <div class="col-sm-6 wow fadeIn">
        <div class="cat-div">
         <div class="col-md-12 col-sm-12 col-xs-4">
          <p>Xem màu sắc hợp phong thủy, hợp tuổi</p>
        </div>

        <div class="col-md-8 col-sm-8 col-xs-4">
          <div class="form-group">
            <input type="number" placeholder="Năm sinh" class="form-control input-sm" data-bind="value: Nam">
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 icon-div">
          <div class="form-group">
            <div class="secure">
              <a href="#" data-bind="click: getPhongThuy" style="height:35px; line-height: 35px;">XEM</a>
            </div>
         </div>
       </div>
       <div class="clearfix"></div>
       <div data-bind="with: phongThuy" >
      <div class="clearfix"></div>
      <hr>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <p><span style="font-weight: bold;">Mệnh:</span>&nbsp;<span data-bind="text: Menh"></span></p>
        <p><span style="font-weight: bold;">Tương sinh:</span>&nbsp;<span data-bind="text: TuongSinh"></span></p>
        <p><span style="font-weight: bold;">Hòa hợp:</span>&nbsp;<span data-bind="text: HoaHop"></span></p>
        <p><span style="font-weight: bold;">Chế khắc:</span>&nbsp;<span data-bind="text: CheKhac"></span></p>
        <p><span style="font-weight: bold;">Bị khắc:</span>&nbsp;<span data-bind="text: BiKhac"></span></p>
      </div>

      <div class="clearfix"></div>
      <hr>
      <div class="col-md-6 col-sm-6  col-xs-6" >
        <!-- <div class="form-group">
              <button type="button" class="btn btn-primary" style="font-weight:bold;white-space:normal;display:inline-flex;margin-left: auto;
    margin-right: auto;
    display: table;">
                 <span style="text-align: center; font-size: 12px;">Sản phẩm liên quan </span>
               </button>
        </div> -->
        <div class="form-group">
              <button type="button" class="btn btnpr">
                 <span style="text-align: center; font-size: 12px;">Xem thêm</span>
               </button>
        </div>
      </div>
      <div class="col-md-6 col-sm-6  col-xs-6" >
        <!-- <div class="form-group">
              <button type="button" class="btn btn-primary" style="font-weight:bold;white-space:normal;display:inline-flex;margin-left: auto;
    margin-right: auto;
    display: table;">
                 <span style="text-align: center; font-size: 12px;">Bạn cần tư vấn </span>
               </button>
        </div> -->
        <div class="form-group">
              <button type="button" class="btn btnpr">
                 <span style="text-align: center; font-size: 12px;">Tư vấn</span>
               </button>
        </div>
      </div>

      <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 wow fadeIn">
    <div class="cat-div">
      <h2>Sản phẩm liên quan</h2>
      <div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">

          @foreach($RelatedProducts as $item)
            <div class="product-scroll">
              <div class="col-md-6 col-sm-3 col-xs-3"><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}"><img src="{{asset('images/'.preg_replace('/^([^,]*).*$/', '$1', $item->images))}}" style="display: table-cell; margin: 0 auto;max-height: 70px; min-width: 30px;" alt="" title="" class="img-responsive"></a></div>
              <div class="col-md-6 col-sm-9 col-xs-9"> <h3><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}">{{$item->name}}</a></h3>
               <br>
                <h4>{{number_format($item->price, 0, ',', '.').'(đ)'}}</h4>
              </div>
            </div>
            <div class="clearfix"></div>

           @endforeach
          </div>

            @if(count($ProductSameMaterials) > 0)
          <div class="item">
          @foreach($ProductSameMaterials as $item)
          <div class="product-scroll">
            <div class="col-md-6 col-sm-3 col-xs-3"><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}"><img src="{{asset('images/'.preg_replace('/^([^,]*).*$/', '$1', $item->images))}}" style="display: table-cell; margin: 0 auto;max-height: 70px; min-width: 30px;" alt="" title="" class="img-responsive"></a></div>
            <div class="col-md-6 col-sm-9 col-xs-9"> <h3><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}">{{$item->name}}</a></h3>
             <br>
              @if($item->category->is_custom)
              <h4>{{number_format($item->price * $item->category->sizes->first()->value, 0, ',', '.').'(đ)'}}</h4>
              @else
              <h4>{{number_format($item->price, 0, ',', '.').'(đ)'}}</h4>
              @endif
            </div>
          </div>
          <div class="clearfix"></div>
         <hr>
         @endforeach
          </div>
          @endif
        </div>
        <!-- Controls -->
        <a class="left arrow-left" href="#carousel-example-generic3" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right arrow-right" href="#carousel-example-generic3" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>


<!-- Modal -->
 <div class="modal" id="modalDesignProduct" role="dialog" data-bind="with: productModel">
   <div class="modal-dialog modal-lg">
     <div class="modal-content"  style="height: auto;">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Tự thiết kế</h4>
       </div>
       <div class="modal-body">

         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                 <input type="text"
                 style="border-color: currentcolor currentcolor #cdcdcd; border-image: none; border-style: none none solid;
                   border-width: medium medium 1px; display: block; font-size: 13px; letter-spacing: 1px; padding: 10px 10px 10px 5px;
                   width: 100%; height: 38px;"
                   placeholder="Bạn muốn đặt tên gì" data-bind="value: CustomName" >
               </div>
             </div>
       </div>
         <div class="row">
              <div class="col-md-7">
                <div class="panel panel-default">
                   <div class="panel-body">
                     <div class="col-md-6">
                         <span style="float: left;">&nbsp;HẠT</span>
                         <div class="form-group">
                           <input type="text" readonly
                           style="border-color: currentcolor currentcolor #cdcdcd; border-image: none; border-style: none none solid;
                             border-width: medium medium 1px; display: block; font-size: 13px; letter-spacing: 1px; padding: 10px 10px 10px 5px;
                             width: 100%; height: 38px; cursor: pointer;"
                             placeholder="Chọn hạt" data-bind="click: ShowAllPieces, value: SeletedPiece() ? SeletedPiece().name : ''" >
                         </div>
                     </div>

                   <div class="col-md-6">
                     <span style="float: left;" data-bind="text: '&nbsp;' + SizeHatName()"></span>
                     <div class="form-group">
                       <select id="checkout-country" class="js-countries" data-bind="options: SizeHats, optionsText: 'name', optionsValue: 'id', value: CustomSizeHatId ">
                       </select>
                     </div>
                 </div>
                 <div class="col-md-7">
                   <!-- ko if: SeletedPiece() -->
                   <div class="form-group" >
                        <img style="height: 50px;" data-bind="attr: { src: ImagePath() + '/' + SeletedPiece().image }" />
                        <label for="exampleInputEmail1"><span data-bind="text: formatMoney(SeletedPiece().price) +'/hạt'"></span></label>
                   </div>
                  <!-- /ko -->
                  <!-- ko if: !SeletedPiece() -->
                  <div class="form-group" >
                       <label for="exampleInputEmail1" style="font-size: 10px; font-style: italic;">*Chưa có hạt được chọn</label>
                  </div>
                 <!-- /ko -->
                 </div>
                 <div class="col-md-5">
                   <div class="form-group">
                        <label for="exampleInputEmail1">&nbsp;</label>
                      <button type="button" data-bind="click: AddPiece" class="btn btn-default form-control" style="background:#dfb859; color: #fff; font-weight: bold;">+ HẠT</button>

                     </div>
                 </div>
               </div>
         </div>
          </div>

           <div class="col-md-5">
             <div class="panel panel-default">
                <div class="panel-body">
                   <div class="col-md-7">
                     <span style="float: left;">&nbsp;CHARM</span>
                     <div class="form-group">
                       <input type="text" readonly
                       style="border-color: currentcolor currentcolor #cdcdcd; border-image: none; border-style: none none solid;
                         border-width: medium medium 1px; display: block; font-size: 13px; letter-spacing: 1px; padding: 10px 10px 10px 5px;
                         width: 100%; height: 38px; cursor: pointer;"
                         placeholder="Chọn charm" data-bind="click: ShowAllCharms, value: SeletedCharm() ? SeletedCharm().name : ''" >
                     </div>
                   </div>
                   <div class="col-md-5">
                     <div class="form-group">
                          <label for="exampleInputEmail1">&nbsp;</label>
                          <button type="button" data-bind="click: AddCharm" class="btn btn-default form-control" style="background:#dfb859; color: #fff; font-weight: bold;">+ CHARM</button>
                       </div>
                   </div>

                   <div class="col-md-7">
                     <!-- ko if: SeletedCharm() -->
                     <div class="form-group" >
                          <img style="height: 50px;" data-bind="attr: { src: ImagePath() + '/' + SeletedCharm().image }" />
                          <label for="exampleInputEmail1"><span data-bind="text: formatMoney(SeletedCharm().price) +'/charm'"></span></label>
                     </div>
                    <!-- /ko -->
                    <!-- ko if: !SeletedCharm() -->
                    <div class="form-group" >
                         <label for="exampleInputEmail1" style="font-size: 10px; font-style: italic;">*Chưa có charm được chọn</label>
                    </div>
                   <!-- /ko -->
                   </div>
                 </div>
             </div>
         </div>

         </div>
           <!-- ko if: IsVisibleAllPieces -->
           <div class="row">
               <div class="col-md-12"  style="">
                  <span style="float: right; font-size: 10px;">Danh sách Hạt</span><br/>
                 <ul class="list-group" style="background: #eee;display: table; margin-right: auto; margin-left: auto; margin-bottom: 0px;">
                  <!-- ko foreach: ServerPieces -->

                  <li class="list-group-item" style="display: inline-grid; padding: 5px 5px;"
                    data-bind="click: $parent.SelectPiece, style: { background: $parent.SeletedPiece() && $parent.SeletedPiece().id == $data.id ? '#ddd' : '' }">

                  <img style="height: 50px; cursor: pointer; display: table; margin-left: auto; margin-right: auto;"
                        data-bind="attr: { src: ImagePath() + '/' + $data.image, title: $data.name+' - ' + formatMoney($data.price) }" />
                  </li>

                  <!-- /ko -->

                </ul>
               </div>
           </div>
           <hr>
           <!-- /ko -->

           <!-- ko if: IsVisibleAllCharms -->
           <div class="row">
               <div class="col-md-12"  style="">
                 <span style="float: right; font-size: 10px;">Danh sách Charm</span><br/>
                 <ul class="list-group" style="background: #eee;display: table; margin-right: auto; margin-left: auto; margin-bottom: 0px;">
                  <!-- ko foreach: ServerCharms -->

                  <li class="list-group-item" style="display: inline-grid; padding: 5px 5px;"
                    data-bind="click: $parent.SelectCharm, style: { background: $parent.SeletedCharm() && $parent.SeletedCharm().id == $data.id ? '#ddd' : '' }">

                  <img style="height: 50px; cursor: pointer; display: table; margin-left: auto; margin-right: auto;"
                        data-bind="attr: { src: ImagePath() + '/' + $data.image, title: $data.name+' - ' + formatMoney($data.price) }" />
                  </li>

                  <!-- /ko -->

                </ul>
               </div>
           </div>
           <hr>
           <!-- /ko -->

         <div class="row">
             <!-- ko if: Pieces().length > 0 -->
            <div class="col-md-12">
              <label style="font-size: 11px; font-style: italic; text-align: center;">
             Sản phẩm của bạn
              </label>
            </div>
              <!-- /ko -->
            <div class="col-md-12">
               <ul class="list-group">
                <!-- ko foreach: Pieces -->
                <li class="list-group-item removeItem" style="display: inline-grid; border: 0px; padding: 1px 3px;">
                  <a class='delete' href="#" data-bind="click: $parent.RemoveItem" style="text-align: center;"><span class="glyphicon glyphicon-remove"></span></a>
                    <span class='delete1'>&nbsp</span>
                    <img style="height: 35px; cursor: pointer;" data-bind="attr: { src: ImagePath() + '/' + $data.itemImage }, click: $parent.ViewDetailFromSelectedItem" />
                      <span style="font-size: 9px;" data-bind="text: $data.itemSize == -1 ? 'Charm' : 'Hạt'"></span>
                </li>
                <!-- /ko -->
              </ul>
         </div>
       </div>

      <div class="row">
              <div class="col-md-3">
                <span style="float: left;" data-bind="text: '&nbsp;' + KieudayName()"></span>
                <div class="form-group">
                  <select id="checkout-country" class="js-countries" data-bind="options: Kieudays, optionsText: $data, optionsValue: $data, value: CustomKieudayId">
                  </select>
                </div>
            </div>

            <div class="col-md-3">
              <span style="float: left;" data-bind="text: '&nbsp;' + SizeVongName()"></span>
              <div class="form-group">
                <select id="checkout-country" class="js-countries" data-bind="options: SizeVongs, optionsText: $data, optionsValue: $data, value: CustomSizeVongId">
                </select>
              </div>
          </div>
        </div>

        <div class="row">
           <div class="col-md-12">
              <label style="float: right; border-width: 1px; border-style: solid;padding: 10px; background: #1e1c1c; ">
              <span style="color: #DDCA22; font-size: 16px;font-weight: bold;" data-bind="text: Pieces().length + ' hạt - ' + formatMoney(CustomPrice())"></span>
              </label>
            </div>
      </div>

       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" style="background:#dfb859; color: #fff; font-weight: bold;" data-bind="click: AddCustomProductToCart">THÊM GIỎ HÀNG</button>
         <button type="button" class="btn btn-default" style="color: #1e1c1c;" data-dismiss="modal">ĐÓNG</button>
       </div>
     </div>
   </div>
 </div>


</div>
<!--container-->
<div class="clearfix"></div>


@endsection

@section('script')
<!-- amazingslider- product details -->


<script src="{{asset('page_asset/page-single.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var data = {};
    var options = {};
    data.Product = <?php echo json_encode($Product); ?>;
    data.Pieces = <?php echo json_encode($Pieces); ?>;

    data.Charms = <?php echo json_encode($Charms); ?>;

    data.SizeCoTays = [];

    data.IsInWishList = <?php echo json_encode($IsInWishList); ?>;
    data.User = <?php echo json_encode(Auth::User()); ?>;

    options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
    options.PublicPath = <?php echo json_encode(url('')); ?>;
    options.AddToCart = <?php echo json_encode(url('addToCart')); ?>;
    options.AddToWishList = <?php echo json_encode(url('addToWishList')); ?>;
    options.GetPhongThuy = <?php echo json_encode(url('getPhongThuy')); ?>;

    data.API_URLs = options;
    ko.applyBindings(SingleViewModel(data), document.getElementById("page-single"));


    $('.flexslider').flexslider({
      animation: "slide",
      controlNav: "thumbnails",
      animationLoop: true,
      slideshow: false,
      rtl: true
    });
  });

</script>
@endsection
