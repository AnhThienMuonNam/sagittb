var FormViewModel = function(data) {
    var self = this;
    self.NotifySuccess = ko.observable(null);
    self.Carts = ko.observableArray(convertToCartObservableArray(data.Carts) || []);

    self.Charms = ko.observableArray(data.Charms || []);
    self.Cities = ko.observableArray(data.Cities || []);
    self.Banks = ko.observableArray(data.Banks || []);
    self.SizeHats = ko.observableArray(data.SizeHats || []);

    self.PaymentMethods = ko.observableArray(data.PaymentMethods || []);

    self.IsVisibleBankDetail = ko.observable(false);
    self.BankName = ko.observable('');
    self.BankNumber = ko.observable('');
    self.BankOwner = ko.observable('');
    self.BankBrand = ko.observable('');

    function convertToCartObservableArray(array){
        var result = [];
        if(array){
          for(var i=0;i<array.length;i++){
              var newItem = new CartViewModel(array[i]);
              result.push(newItem);
          }
        }
        return result;
    };

    self.ShowBankInfo = function(obj){
      self.IsVisibleBankDetail(true);
      self.BankName(obj.name);
      self.BankNumber(obj.bank_number);
      self.BankOwner(obj.owner);
      self.BankBrand(obj.bank_brand);
    };

    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);

   self.checkoutViewModel = ko.observable(new CheckoutViewModel(null, self));

    self.TempPrice = ko.observable(calculatorPrice(data.Carts) || 0);
    function calculatorPrice(carts){
        var result = 0;
        if(carts){
            for(var i = 0; i<carts.length; i++){
                result = parseInt(result)+parseInt(carts[i].price);
            }
        }
        return result;
    };

    self.isUseUserInfo = ko.observable(false);
    self.isUseUserInfo.subscribe(function(value){
       if(value) {
            if(data && data.User) {
               self.checkoutViewModel(new CheckoutViewModel(data.User, self));
            }
       } else {
         self.checkoutViewModel(new CheckoutViewModel(null, self));
       }
    });

    self.checkout = function(){
        self.checkoutViewModel().showErrorValidations();
        if(self.checkoutViewModel().hasErrors() == true) return;

        alertify.confirm("Xác nhận","Chắc chắn thông tin của bạn chính xác, đây là thông tin để giao hàng cho bạn. <hr>Bạn có chắc chắn muốn đặt hàng?",
        function(ok){
            $.ajaxSetup({ headers: {'X-CSRF-Token': $('#_token').val()} });
            $.ajax({
                url: data.API_URLs.Checkout,
                beforeSend: function(){
                    NProgress.start();
                },
                type: "POST",
                data: self.checkoutViewModel().toJSON(),
                success: function(response){
                    if(response.IsSuccess == true){
                        var msg = 'Chúc mừng bạn đã đặt hàng thành công. Một mail thông báo đã được gửi vào email của bạn. <br>Đơn hàng của bạn có mã là '+ response.OrderId +'. <br><strong>Xin cám ơn!</strong>';
                        self.NotifySuccess(msg);
                        self.Carts([]);
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        window.location.replace(data.API_URLs.ThankYou);
                    }
                },
                error: function(xhr, error){
                    // alert("Something went wrong :(")

                },
                complete: function(){
                    NProgress.done();
                },
            });
        },
        function(cancel){

        });

    };

    self.formatMoney = function(number) {
        var val=parseInt(number);
        return val.toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        }) + "(đ)" ;
    };


    self.getFirstImage = function(stringPath){
        var result="";
        if(stringPath){
             var splittedArray = stringPath.split(",");
             if(splittedArray.length>0)
                result=splittedArray[0];
        }
        return result ? result : stringPath;
    };

    self.detailItem = function(cart){
        var items = cart.details();
        var result = "";

        if(cart.sizehat()){
              if(result){
                  result = result + '<br />Kích thước hạt: ' + cart.sizehat();
              } else {
                  result = 'Kích thước hạt: ' + cart.sizehat();
              }
        }
        if(cart.kieuday()){
            if(result){
                result = result + '<br />Cách đan dây: ' + cart.kieuday();
            } else {
                result = 'Cách đan dây: ' + cart.kieuday();
            }
        }
        if(cart.sizevong()){
            if(result){
                result = result + '<br />Size dây/vòng: ' + cart.sizevong();
            } else {
                result = 'Size dây/vòng: ' + cart.sizevong();
            }
        }
        if(cart.charm()){
            var charmName = self.Charms().filter(function(x){ return x.id == cart.charm(); })[0].name;
            if(result){
                result = result + ' - Charm: ' + charmName;
            } else {
               result = 'Charm: ' + charmName;
            }
        }

        if(items){
          var listGroupByPieceId =  groupBy(items,'itemId');

          if(listGroupByPieceId && listGroupByPieceId.length > 0) {
            if(result) {
              result = result +'<br />Items: ';
            } else {
              result = result +'Hạt x S.lg: ';
            }

            for (var i = 0; i < listGroupByPieceId.length; i++) {
              var listGroupBySize = groupBy(listGroupByPieceId[i],'itemSize');
              var listCharms = [];
              for (var j = 0; j < listGroupBySize.length; j++) {
                  if (i == listGroupByPieceId.length - 1 && j == listGroupBySize.length - 1){
                    if(listGroupBySize[j][0].itemSize === "-1"){
                      result = result + listGroupBySize[j][0].itemName + ' x ' + listGroupBySize[j].length;
                    } else {
                      result = result + listGroupBySize[j][0].itemName +' ('+ listGroupBySize[j][0].itemSize +') x ' + listGroupBySize[j].length;
                    }
                  } else {
                      if(listGroupBySize[j][0].itemSize === "-1"){
                        result = result + listGroupBySize[j][0].itemName +' x ' + listGroupBySize[j].length + '; ';

                      }else {
                        result = result + listGroupBySize[j][0].itemName +' ('+ listGroupBySize[j][0].itemSize +') x ' + listGroupBySize[j].length + '; ';

                      }
                  }
                }
              }
          }
        }
        return result ? result : '<span style="font-style: italic; font-size:12px;">Không áp dụng</span>';
    };


    function groupBy(xs, key) {
      var result =  xs.reduce(function(rv, x) {
        (rv[x[key]] = rv[x[key]] || []).push(x);
        return rv;
      }, {});
      return Object.keys(result).map(function (key) { return result[key]; });
    };


    self.minusItem = function(obj){
        if(obj.quanlity() > 1){
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.MinusItem,
                beforeSend: function(){
                    NProgress.start();
                },
                type: "POST",
                data: { cartId : obj.cartId() },
                success: function(response){
                    if(response){
                        obj.quanlity(response.quanlity);
                        obj.price(response.price);
                        self.TempPrice(self.TempPrice() - (response.price/response.quanlity));
                    }
                },
                error: function(xhr, error){
                    // alert("Something went wrong :(")
                },
                complete: function(){
                    NProgress.done();
                },
            });
        }
    };

    self.plusItem = function(obj){
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });
        $.ajax({
            url: data.API_URLs.PlusItem,
            beforeSend: function(){
                NProgress.start();
            },
            type: "POST",
            data: { cartId : obj.cartId() },
            success: function(response){
                if(response){
                    obj.quanlity(response.quanlity);
                    obj.price(response.price);
                    self.TempPrice(self.TempPrice() + (response.price/response.quanlity));
                }
            },
            error: function(xhr, error){
                // alert("Something went wrong :(")
            },
            complete: function(){
                NProgress.done();
            },
        });
   };

   self.removeItem = function(obj){
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });
        $.ajax({
            url: data.API_URLs.RemoveItem,
            beforeSend: function(){
                NProgress.start();
            },
            type: "POST",
            data: { cartId : obj.cartId() },
            success: function(response){
              if(response == true){
                self.TempPrice(self.TempPrice() - obj.price());
                self.Carts.remove(obj);
                alertify.success('<i class="fa fa-bell" aria-hidden="true"></i><strong> Đã xóa sản phẩm "'+obj.name()+'" khỏi giỏ hàng</strong>');
              }
            },
            error: function(xhr, error){
                // alert("Something went wrong :(")
            },
            complete: function(){
                NProgress.done();
            },
        });
   };

   self.checkoutViewModel().hideErrorValidations();

}



var CartViewModel = function(data) {
    var self = this;
    self.cartId = ko.observable(data.cartId || null);
    self.is_custom = ko.observable(parseInt(data.is_custom) == 1 ? true : false);
    self.id = ko.observable(data.id || null);
    self.image = ko.observable(data.image || null);
    self.details = ko.observableArray(data.details || []);
    self.name = ko.observable(data.name || null);
    self.price = ko.observable(data.price || null);
    self.quanlity = ko.observable(data.quanlity || null);
    self.sizehat = ko.observable(data.sizehat || null);
    self.kieuday = ko.observable(data.kieuday || null);
    self.charm = ko.observable(data.charm || null);
    self.alias = ko.observable(data.alias || null);
    self.sizevong = ko.observable(data.sizevong || null);
}


var CheckoutViewModel = function(option, parent) {
    var self = this;

    self.CustomerName = ko.observable(option ? option.name : null).extend({ required: { params: true, message: 'Bạn chưa nhập họ tên' } });
    self.CustomerPhone = ko.observable(option ? option.phone : null).extend({ required: { params: true, message: 'Bạn chưa nhập số điện thoại' } });
    self.CustomerEmail = ko.observable(option ? option.email : null).extend({ required: { params: true, message: 'Bạn chưa nhập email' } });
    self.CustomerAddress = ko.observable(option ? option.address : null).extend({ required: { params: true, message: 'Bạn chưa nhập số nhà, tên đường, phường/xã' } });
    self.CustomerDistrict = ko.observable(option ? option.district : null).extend({ required: { params: true, message: 'Bạn chưa nhập quận/huyện' } });
    self.CustomerCity = ko.observable(option ? option.city : null);
    self.CustomerNote = ko.observable(null);

    self.CustomerCityId = ko.observable(null).extend({ required: { params: false, message: 'Bạn chưa chọn tỉnh/thành phố' } });
    self.CustomerPaymentMethodId = ko.observable(null).extend({ required: { params: false, message: 'Bạn chưa chọn hình thức thanh toán' } });
    self.IsShipCod = ko.observable(false);

    self.CustomerCityId.subscribe(function(value){
        if(value){
            var city = parent.Cities().filter(function(i){
                return i.id == value;
            })[0];
            if(value){
                self.CustomerCity(city.name);
                if(!city.is_ship_cod){
                    self.IsShipCod(true);
                    self.CustomerPaymentMethodId(2);
                }else{
                    self.IsShipCod(false);
                }
            }
        } else {
            self.CustomerCity('');
            self.IsShipCod(false);
        }
    });
    CheckoutViewModel.prototype.toJSON = function() {
        var model = {
                        CustomerName: ko.utils.unwrapObservable(this.CustomerName),
                        CustomerPhone: ko.utils.unwrapObservable(this.CustomerPhone),
                        CustomerEmail: ko.utils.unwrapObservable(this.CustomerEmail),
                        CustomerAddress: ko.utils.unwrapObservable(this.CustomerAddress),
                        CustomerDistrict: ko.utils.unwrapObservable(this.CustomerDistrict),
                        CustomerCity: ko.utils.unwrapObservable(this.CustomerCity),
                        CustomerNote: ko.utils.unwrapObservable(this.CustomerNote),
                        CustomerCityId: ko.utils.unwrapObservable(this.CustomerCityId),
                        CustomerPaymentMethodId: ko.utils.unwrapObservable(this.CustomerPaymentMethodId),
                    };

        return model;
    };
    self.hasErrors = ko.observable(false);
    self.showErrorValidations = function () {
        var errors = ko.validation.group(self);
        if(errors().length > 0){
            errors.showAllMessages(true);
            self.hasErrors(true);
        }else{
            self.hasErrors(false);
        }
    };

    self.hideErrorValidations = function(){
        var errors = ko.validation.group(self);
        if(errors().length > 0){
            errors.showAllMessages(false);
        }
    };
}
