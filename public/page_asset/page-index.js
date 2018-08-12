var HeaderViewModel = function(data) {
    self.CartItemsIndex = ko.observableArray([]);
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);

    self.getCart = function() {
        $.ajax({
            url: data.API_URLs.GetCart,
            type: "GET",
            success: function(response){
                self.CartItemsIndex([]);
                convertToObservable(response.cartData);
               // self.CartItemsIndex(response.cartData);
               // self.TotalCartIndex(getTotalCart(response.cartData));
               $('#cartContentModal').modal('show');
            },
            error: function(xhr, error){
                alert("Something went wrong :(")
            },
        });
    };
    function convertToObservable(data){
        if(data){
            for(var i = 0; i<data.length;i++){
                var item = data[i];
                var newItem = new CartItemIndexViewModel(item);
                self.CartItemsIndex.push(newItem);
            }
        }
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

    self.removeCartItemIndex=function(obj){
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });
        $.ajax({
            url: data.API_URLs.RemoveCartItem,
            type: "POST",
            data: { Id : obj.Id() },
            beforeSend: function(){
                NProgress.start();
            }, 
            success: function(response){
                self.CartItemsIndex.remove(obj);
                alertify.success('<i class="fa fa-bell" aria-hidden="true"></i><strong> Đã xóa sản phẩm "'+obj.Item().Name+'" khỏi giỏ hàng</strong>');
            },
            error: function(xhr, error){
                alert("Something went wrong :(")
            },
            complete: function(){
                NProgress.done();
          },
        });
    };

    self.formatMoneyIndex = function(number) {
        var val=parseInt(number);
        var result = val.toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        }) + "đ" ;
        return result;
    };
}

var CartItemIndexViewModel = function(data){
    var self = this;
    self.Id = ko.observable(data.id || null);
    self.Qty = ko.observable(data.qty || null);
    self.Price = ko.observable(data.price || null);
    self.Item = ko.observable(data.item || null);
}


