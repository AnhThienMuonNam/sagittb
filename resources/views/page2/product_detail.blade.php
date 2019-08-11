@extends('page2.layout.master')

@section('css')
<style type="text/css">
  .delete {
    display: none;
  }

  .delete1 {
    display: block;
  }

  .removeItem:hover .delete {
    display: block
  }

  .removeItem:hover .delete1 {
    display: none
  }

  .btnpr {
    font-weight: bold;
    white-space: normal;
    display: inline-flex;
    background: #ffff;
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
  <section style="background: url({{asset('images/'.$Product->category->image)}});">
    <div class="inner-bg">
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
        <div class="cat-div" data-bind="with: masterViewModel">
          <div class="form-horizontal">
            <div class="form-group">
              <div class="col-sm-12">
                <h4>Xem can chi</h4>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <select class="form-control" style="padding-bottom:0px; padding-top:0px; border: solid 1px #abadb3; height: 35px;line-height: 35px;" data-bind="options: HoursRange, optionsCaption:'-- Chọn giờ --', optionsText: 'value', optionsValue: 'id', value: Hour_master"> </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <input type="text" readonly placeholder="Ngày tháng năm" id="sFromDate2_master" class="form-control mydatepicker" data-bind="event :{change: changeSFromDate2 }">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <button type="button" class="btn btn-default button-1" style="font-weight: bold; border-radius: 6px;" data-bind="click: calculateCanchi">Kết quả</button>
              </div>
            </div>
            <!-- ko if: IsShowMoreButton() == true -->
            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <p><span style="font-weight: bold;">Giờ: </span>&nbsp;<span data-bind="text: HourCanchi_master"></span></p>
                <p><span style="font-weight: bold;">Ngày: </span>&nbsp;<span data-bind="text: DayCanchi_master"></span></p>
                <p><span style="font-weight: bold;">Tháng: </span>&nbsp;<span data-bind="text: MonthCanchi_master"></span></p>
                <p><span style="font-weight: bold;">Năm: </span>&nbsp;<span data-bind="text: YearCanchi_master"></span></p>
              </div>
            </div>

            <div class="box-footer">
              <a data-bind="attr:{href: FilterProduct_master()+'/'+LunarYearTag_master()}" target="_blank" class="btn btn-default button-1" style="font-weight: bold; border-radius: 6px; color: #fff; ">S/p liên quan</a>
              <!-- ko if: IsShowLogin_master() == false && IsShowRegister_master() == false-->
              <a href="#" data-bind="click: TuVanButton" class="btn btn-default button-1  pull-right" style="font-weight: bold; border-radius: 6px; color: #fff;">T.vấn miễn phí</a>
              <!-- /ko -->
            </div>

            <!-- ko if: IsShowRegister_master() == true -->
            <br>
            <form class="form-horizontal">
              <!-- ko if: NotifyCreateUserErrors_master().length > 0 -->
              <div class="alert alert-danger">
                <!-- ko foreach: NotifyCreateUserErrors_master -->
                <span data-bind="text: $data"></span>
                <!-- /ko -->
              </div>
              <!-- /ko -->
              <!-- ko if: NotifyCreateUserSuccess_master -->
              <div class="alert alert-success">
                <span data-bind="text: NotifyCreateUserSuccess_master"></span>
                <hr />
                <a href="https://www.facebook.com/messages/t/SagittB" target="_blank" style="font-weight: bold;">*Ghi chú: Bấm vào đây nếu hệ thống không chuyển tới trang tư vấn.</a>
              </div>
              <!-- /ko -->

              <div class="form-group">
                <div class="col-sm-12">
                  <input type="email" class="form-control" placeholder="Email*" data-bind="value: Email_master" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <input type="email" class="form-control" placeholder="Số điện thoại" data-bind="value: Phone_master" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <input type="password" class="form-control" placeholder="Mật khẩu*" data-bind="value: Password_master" />
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-default button-1" style=" font-weight: bold;
         border-radius: 6px; " data-bind="click: createUser_master_tuvan">Đăng ký tài khoản</button>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="boder3"></div>
                  <p><a href="#" data-bind="click: ShowLoginModal_master">Đăng nhập</a></p>
                  <div class="boder3"></div>
                </div>
              </div>
            </form>
            <!-- /ko -->

            <!-- ko if: IsShowLogin_master() == true -->

            <form class="form-horizontal">
              <!-- ko if: NotifyErrors_master().length > 0 -->
              <div class="alert alert-danger">
                <!-- ko foreach: NotifyErrors_master -->
                <span data-bind="text: $data"></span>
                <!-- /ko -->
              </div>
              <!-- /ko -->
              <div class="form-group">
                <div class="col-sm-12">
                  <input type="email" class="form-control" placeholder="Email" data-bind="value: userEmail_master" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <input type="password" class="form-control" placeholder="Mật khẩu" data-bind="value: userPassword_master" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <button type="button" class="btn btn-default button-1" style=" font-weight: bold; border-radius: 6px;" data-bind="click: login_master_tuvan">Đăng Nhập</button>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="boder3"></div>
                  <p><a href="#" data-bind="click: ShowRegisterModal_master">
                      Đăng Ký Tài Khoản</a></p>
                  <div class="boder3"></div>
                </div>
              </div>
            </form>
            <!-- /ko -->

            <!-- /ko -->
          </div>
          <div class="clearfix"></div>
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
                  <div class="col-md-6 col-sm-9 col-xs-6">
                    <h3><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}">{{$item->name}}</a></h3>
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
                  <div class="col-md-6 col-sm-9 col-xs-6">
                    <h3><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}">{{$item->name}}</a></h3>
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
            <a class="left arrow-left" href="#carousel-example-generic2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right arrow-right" href="#carousel-example-generic2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
          </div>
        </div>
      </div>
      <!--right side -->
      <div class="col-md-9 div-left wow fadeInRight">

        <div class="clearfix"></div>

        <div style="display:block; position:relative; max-width:1015px; padding-left:0px; margin:0;">
          <div class="flexslider" style="margin: 0 0 1px !important;">
            <ul class="slides">
              @foreach( $Images as $item )
              <li data-thumb="{{asset('images/'.$item)}}">
                <img style="margin: 0 auto;" src="{{asset('images/'.$item)}}" />
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
              <select id="checkout-country" class="js-countries" data-bind="options: Kieudays, optionsText: 'name', optionsValue: 'id', value: KieudayId">
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
        <!-- ko if: IsCustom() == true -->
        <div class="share-icon">
          <a href="#" data-toggle="modal" data-target="#modalDesignProduct"> <i class="fa fa-puzzle-piece" aria-hidden="true"></i> <br>TỰ THIẾT KẾ</a>
        </div>
        <!-- /ko -->
        <div class="socialmedia">
          <ul>
            <li><a href="#" data-bind="click: addToWishList">
                <!-- ko if: IsInWishList() == true -->
                <i class="fa fa-heart" aria-hidden="true" style="color: #9D0808; "></i>
                <!-- /ko -->
                <!-- ko if: IsInWishList() == false -->
                <i class="fa fa-heart-o" aria-hidden="true"></i>
                <!-- /ko --></a>
            </li>
            <li><a href="#" title="Hồ điều ước"> <i class="fa fa-gift" aria-hidden="true"></i></a> </li>
            <li style="width: 80px;"><a href="https://www.facebook.com/messages/t/SagittB" target="_blank"><i class="fa fa-question" aria-hidden="true"></i>&nbsp;TƯ VẤN</a> </li>

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
              <p><img src="{{asset('images/products/line.jpg')}}" alt="" title="" style="width: 287px; height: 1px;"></p>
              <!-- <h6>SKU - 12458AF6</h6> -->
              <p data-bind="html: Description"></p>
              <p><img src="{{asset('images/products/line.jpg')}}" alt="" title=""></p>
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
                <h2>Sản phẩm liên quan</h2>
                <div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">

                      @foreach($RelatedProducts as $item)
                      <div class="product-scroll">
                        <div class="col-md-6 col-sm-3 col-xs-3"><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}"><img src="{{asset('images/'.preg_replace('/^([^,]*).*$/', '$1', $item->images))}}" style="display: table-cell; margin: 0 auto;max-height: 70px; min-width: 30px;" alt="" title="" class="img-responsive"></a></div>
                        <div class="col-md-6 col-sm-9 col-xs-9">
                          <h3><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}">{{$item->name}}</a></h3>
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
                        <div class="col-md-6 col-sm-9 col-xs-9">
                          <h3><a href="{{url('san-pham/'.$item->alias.'/'.$item->id)}}">{{$item->name}}</a></h3>
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
                  <a class="left arrow-left" href="#carousel-example-generic3" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right arrow-right" href="#carousel-example-generic3" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
                </div>
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
      <div class="modal-content" style="height: auto;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tự thiết kế</h4>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" style="border-color: currentcolor currentcolor #cdcdcd; border-image: none; border-style: none none solid;
                   border-width: medium medium 1px; display: block; font-size: 13px; letter-spacing: 1px; padding: 10px 10px 10px 5px;
                   width: 100%; height: 38px;" placeholder="Bạn muốn đặt tên gì" data-bind="value: CustomName">
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
                      <input type="text" readonly style="border-color: currentcolor currentcolor #cdcdcd; border-image: none; border-style: none none solid;
                             border-width: medium medium 1px; display: block; font-size: 13px; letter-spacing: 1px; padding: 10px 10px 10px 5px;
                             width: 100%; height: 38px; cursor: pointer;" placeholder="Chọn hạt" data-bind="click: ShowAllPieces, value: SeletedPiece() ? SeletedPiece().name : ''">
                    </div>
                  </div>

                  <!-- ko if: IsVisibleAllPieces -->
                  <div class="col-md-12">
                    <span style="float: right; font-size: 10px;">Danh sách Hạt</span><br />
                    <ul class="list-group" style="background: #eee;display: table; margin-right: auto; margin-left: auto; margin-bottom: 0px;">
                      <!-- ko foreach: ServerPieces -->

                      <li class="list-group-item" style="display: inline-grid; padding: 5px 5px;" data-bind="click: $parent.SelectPiece, style: { background: $parent.SeletedPiece() && $parent.SeletedPiece().id == $data.id ? '#ddd' : '' }">

                        <img style="height: 50px; cursor: pointer; display: table; margin-left: auto; margin-right: auto;" data-bind="attr: { src: ImagePath() + '/' + $data.image, title: $data.name+' - ' + formatMoney($data.price) }" />
                      </li>
                      <!-- /ko -->

                    </ul>
                  </div>
                  <!-- /ko -->

                  <div class="col-md-6">
                    <span style="float: left;" data-bind="text: '&nbsp;' + SizeHatName()"></span>
                    <div class="form-group">
                      <select id="checkout-country" class="js-countries" data-bind="options: SizeHats, optionsText: 'name', optionsValue: 'id', value: CustomSizeHatId ">
                      </select>
                    </div>
                  </div>
                  <div class="col-md-7 col-xs-6">
                    <!-- ko if: SeletedPiece() && !IsVisibleAllPieces() -->
                    <div class="form-group">
                      <img style="height: 50px;" data-bind="attr: { src: ImagePath() + '/' + SeletedPiece().image }" />
                      <label for="exampleInputEmail1"><span data-bind="text: formatMoney(SeletedPiece().price) +'/hạt'"></span></label>
                    </div>
                    <!-- /ko -->
                    <!-- ko if: !SeletedPiece() -->
                    <div class="form-group">
                      <label for="exampleInputEmail1" style="font-size: 10px; font-style: italic;">*Chưa có hạt được chọn</label>
                    </div>
                    <!-- /ko -->
                  </div>
                  <div class="col-md-5 col-xs-6">
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
                      <input type="text" readonly style="border-color: currentcolor currentcolor #cdcdcd; border-image: none; border-style: none none solid;
                         border-width: medium medium 1px; display: block; font-size: 13px; letter-spacing: 1px; padding: 10px 10px 10px 5px;
                         width: 100%; height: 38px; cursor: pointer;" placeholder="Chọn charm" data-bind="click: ShowAllCharms, value: SeletedCharm() ? SeletedCharm().name : ''">
                    </div>
                  </div>
                  <!-- ko if: IsVisibleAllCharms -->

                  <div class="col-md-12">
                    <span style="float: right; font-size: 10px;">Danh sách Charm</span><br />
                    <ul class="list-group" style="background: #eee;display: table; margin-right: auto; margin-left: auto; margin-bottom: 0px;">
                      <!-- ko foreach: ServerCharms -->

                      <li class="list-group-item" style="display: inline-grid; padding: 5px 5px;" data-bind="click: $parent.SelectCharm, style: { background: $parent.SeletedCharm() && $parent.SeletedCharm().id == $data.id ? '#ddd' : '' }">

                        <img style="height: 50px; cursor: pointer; display: table; margin-left: auto; margin-right: auto;" data-bind="attr: { src: ImagePath() + '/' + $data.image, title: $data.name+' - ' + formatMoney($data.price) }" />
                      </li>

                      <!-- /ko -->

                    </ul>
                  </div>

                  <!-- /ko -->
                  <div class="col-md-7 col-xs-6">
                    <!-- ko if: SeletedCharm() && !IsVisibleAllCharms()-->
                    <div class="form-group">
                      <img style="height: 50px;" data-bind="attr: { src: ImagePath() + '/' + SeletedCharm().image }" />
                      <label for="exampleInputEmail1"><span data-bind="text: formatMoney(SeletedCharm().price) +'/charm'"></span></label>
                    </div>
                    <!-- /ko -->
                    <!-- ko if: !SeletedCharm() -->
                    <div class="form-group">
                      <label for="exampleInputEmail1" style="font-size: 10px; font-style: italic;">*Chưa có charm được chọn</label>
                    </div>
                    <!-- /ko -->
                  </div>
                  <div class="col-md-5 col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">&nbsp;</label>
                      <button type="button" data-bind="click: AddCharm" class="btn btn-default form-control" style="background:#dfb859; color: #fff; font-weight: bold;">+ CHARM</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
                <select id="checkout-country" class="js-countries" data-bind="options: Kieudays, optionsText: 'name', optionsValue: 'id', value: CustomKieudayId">
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
    data.CurrentUser = <?php echo json_encode(Auth::check() ? Auth::user() : null); ?>;

    data.Charms = <?php echo json_encode($Charms); ?>;

    data.SizeCoTays = [];

    data.IsInWishList = <?php echo json_encode($IsInWishList); ?>;
    data.User = <?php echo json_encode(Auth::User()); ?>;

    options.ImagePath = <?php echo json_encode(asset('/images')); ?>;
    options.PublicPath = <?php echo json_encode(url('')); ?>;
    options.AddToCart = <?php echo json_encode(url('addToCart')); ?>;
    options.AddToWishList = <?php echo json_encode(url('addToWishList')); ?>;
    options.GetPhongThuy = <?php echo json_encode(url('getPhongThuy')); ?>;
    options.FilterProduct_master = <?php echo json_encode(url('filter')); ?>;
    options.Login_master = <?php echo json_encode(url('login')); ?>;
    options.CreateUser_master = <?php echo json_encode(url('createUser')); ?>;

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