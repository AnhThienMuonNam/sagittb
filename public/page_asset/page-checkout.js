var CheckoutViewModel = function(data) {
    var self = this;
    self.Carts = ko.observableArray(data.Carts || []);
  
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);
    

    self.CustomerName = ko.observable(null);
    self.CustomerPhone = ko.observable(null);
    self.CustomerEmail = ko.observable(null);
    self.CustomerAddress = ko.observable(null);
    self.CustomerDistrict = ko.observable(null);
    self.CustomerCity = ko.observable(null);
    self.CustomerNote = ko.observable(null);

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
                self.CustomerName(data.User.name);
                self.CustomerPhone(data.User.phone);
                self.CustomerEmail(data.User.email);
                self.CustomerAddress(data.User.address);
                self.CustomerDistrict(data.User.district);
                self.CustomerCity(data.User.city);
            }
       } else {
            self.CustomerName(null);
            self.CustomerPhone(null);
            self.CustomerEmail(null);
            self.CustomerAddress(null);
            self.CustomerDistrict(null);
            self.CustomerCity(null);
       }
    });
   

    self.checkout = function(){
        var model =  {  CustomerName : self.CustomerName(), 
                        CustomerEmail : self.CustomerEmail(),
                        CustomerPhone : self.CustomerPhone(),
                        CustomerAddress : self.CustomerAddress(),
                        CustomerDistrict : self.CustomerDistrict(),
                        CustomerCity : self.CustomerCity(),
                        CustomerNote : self.CustomerNote()
                    };

        $.ajaxSetup({ headers: {'X-CSRF-Token': $('#_token').val()} });
        $.ajax({
            url: data.API_URLs.Checkout,
            beforeSend: function(){
                NProgress.start();
            },
            type: "POST",
            data: model, 
            success: function(response){
                if(response.IsSuccess == true)
                    window.location.replace(data.API_URLs.ThankYou);
            },
            error: function(xhr, error){
                // alert("Something went wrong :(")
              
            },
            complete: function(){
                NProgress.done();
            },
        });
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


    self.formatMoney = function(number) {
        var val = parseInt(number);
        return val.toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        }) + "đ" ;
    };

}

