function FormViewModel(data) {
    var self = this;
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);
    self.Order = ko.observable(data.Order || null);
    self.OrderDetails = ko.observableArray(data.Order.order_details || null);


    self.Sizes = ko.observableArray(data.Sizes || []);
    self.Kieudays = ko.observableArray(data.Kieudays || []);
    self.Charms = ko.observableArray(data.Charms || []);
  
    self.SizeCoTays = ko.observableArray(data.SizeCoTays || []);
    self.Pieces = ko.observableArray(data.Pieces || []);

    self.EstimatedDeliveries = ko.observableArray(data.EstimatedDeliveries || []);
    self.EstimatedDeliveryId = ko.observable(data.Order.estimated_delivery_id || []);

    self.OrderId = ko.observable(data.Order.id || null);

    self.OrderStatues = ko.observableArray(data.OrderStatues || []);
    self.OrderStatusId = ko.observable(data.Order.order_status_id || null);

    self.PaymentMethods = ko.observableArray(data.PaymentMethods || []);
    self.PaymentMethodId = ko.observable(data.Order.payment_method_id || null);

    self.IsPaid = ko.observable(data.Order.is_paid || 0);

    self.formatMoney = function(number) {
        var val=parseInt(number);
        return val.toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        }) + "(đ)" ;
    };


    self.detailItem = function(cart){
        var items = cart.sub_order_details;
        var result = "";


        if(cart.product_size_id){
            var sizeName = self.Sizes().filter(function(x){ return x.id == cart.product_size_id; })[0].name;
            if(result){
                result = result + '<br />Kích thước: ' + sizeName;
            } else {
                result = 'Kích thước: ' + sizeName;
            }
        }
        if(cart.product_kieuday_id){
            var kieudayName = self.Kieudays().filter(function(x){ return x.id == cart.product_kieuday_id; })[0].name;
            if(result){
                result = result + '<br />Cách đan dây: ' + kieudayName;
            } else {
                result = 'Cách đan dây: ' + kieudayName;
            }
        }
        if(cart.product_size_co_tay_id){
            var itemName = self.SizeCoTays().filter(function(x){ return x.id == cart.product_size_co_tay_id; })[0].name;
            if(result){
                result = result + '<br />Size cổ tay: ' + itemName;
            } else {
                result = 'Size cổ tay: ' + itemName;
            }
        }

        if(items){
          var listGroupByPieceId =  groupBy(items,'piece_id');

          if(listGroupByPieceId && listGroupByPieceId.length > 0) {
            result = result +'<br />Hạt x S.lg: ';
            for (var i = 0; i < listGroupByPieceId.length; i++) {
              var listGroupBySize = groupBy(listGroupByPieceId[i],'piece_size');
              if(listGroupBySize.length > 0 && listGroupBySize[0][0].piece_size == -1){

              } else {
              for (var j = 0; j < listGroupBySize.length; j++) {
                  if (i == listGroupByPieceId.length - 1 && j == listGroupBySize.length - 1){
                    result = result + listGroupBySize[j][0].piece_name +' ('+ listGroupBySize[j][0].piece_size +') x ' + listGroupBySize[j].length;
                  } else {
                    result = result + listGroupBySize[j][0].piece_name +' ('+ listGroupBySize[j][0].piece_size +') x ' + listGroupBySize[j].length + '; ';
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

    self.saveOrder = function() {
       $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });
        $.ajax({
            url: data.API_URLs.SaveOrder,
            type: "POST",
            data: {
                    orderId : self.OrderId(),
                    orderStatusId : self.OrderStatusId(),
                    isPaid : self.IsPaid(),
                    paymentMethodId: self.PaymentMethodId(),
                    estimatedDeliveryId:self.EstimatedDeliveryId()
                    },
            success: function(response){
                if(response.IsSuccess == true){
                    alertify.success('Cập nhật đơn hàng thành công');
                    setTimeout(function(){ location.reload(); }, 3000);
                }
            },
            error: function(xhr, error){
                // alert("Something went wrong :(")
            },
        });
    };

}
