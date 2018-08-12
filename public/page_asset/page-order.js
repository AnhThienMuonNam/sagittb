var FormViewModel = function(data) {
    self.Orders = ko.observableArray([]);
    self.OrderStatues = ko.observableArray(data.OrderStatues || []);
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);
    self.OrderStatusId = ko.observable(data.OrderStatues[0].id || null);

    self.formatMoney = function(number) {
        var val=parseInt(number);
        return val.toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        }) + "(đ)" ;
    };

    self.filterOrders = function(obj){
        self.OrderStatusId(obj.id);
        getOrders();
    };

    function getOrders(){
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });
        $.ajax({
            url: data.API_URLs.GetOrders,
            type: "POST",
            data: { orderStatusId : self.OrderStatusId() },
            beforeSend: function(){
                NProgress.start();
            }, 
            success: function(response){
                self.Orders(response.Orders);
                $(".btn-filter-order").removeClass("selected-btn-filter-order");
                var idOrderStatus = "#order-status-" + self.OrderStatusId();
                $(idOrderStatus).addClass("selected-btn-filter-order");
            },
            error: function(xhr, error){
               
            },
            complete: function(){
                 NProgress.done();
            },
        });
    };

    getOrders();
}

