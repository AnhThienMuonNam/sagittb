function FormViewModel(data) {
    var self = this;
    self.Orders = ko.observableArray(data.Orders || []);
    self.OrderStatues = ko.observableArray(data.OrderStatues || []);
    self.Cities = ko.observableArray(data.Cities || []);

    // self.Categories = ko.observableArray(data.Categories || []);
    // self.CategoryId = ko.observable(null);
    self.Keyword = ko.observable(null);
    self.OrderStatusId = ko.observable(1);
    // self.PaymentMethodId = ko.observable(null);
    self.Fromdate = ko.observable(null);
    self.Todate = ko.observable(null);
    self.Id = ko.observable(null);
    self.CityId = ko.observable(null);

    self.IsViewRemindButtonClick = ko.observable(false);

    self.search = function() {
       $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });
        $.ajax({
            url: data.API_URLs.SearchOrder,
            type: "POST",
            data: {
                    Keyword : self.Keyword(),
                    Id : self.Id(),
                    OrderStatusId : self.OrderStatusId(),
                    Fromdate : self.Fromdate(),
                    Todate : self.Todate(),
                    CityId : self.CityId(),
                    },
            beforeSend: function(){
                NProgress.set(0.75);
            },
            success: function(response){
                if(response){
                  self.IsViewRemindButtonClick(false);
                    self.Orders(response.Orders);
                }
            },
            error: function(xhr, error){
                console.log(xhr.responseText);
                // alert("Something went wrong :(")
            },
            complete: function(){
                NProgress.done();
          },
        });
    };


    self.formatMoney = function(number) {
        var val=parseInt(number);
        return val.toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        }) + "đ" ;
    };
     self.changeSFromDate=function(){
        self.Fromdate($('#sFromDate').val());
     };

      self.changeSToDate=function(){
        self.Todate($('#sToDate').val());
     };

     self.exportOrder = function() {
       $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });
        $.ajax({
             cache: false,
            url: data.API_URLs.ExportOrder,
            type: "POST",
            data: {
                    sKeyword : self.Keyword(),
                    sPhone : self.Phone(),
                    // sPaymentMethodId : self.PaymentMethodId(),
                    sOrderStatusId : self.OrderStatusId(),
                    sFromdate : self.Fromdate(),
                    sTodate : self.Todate(),
                    sIsPaid : self.IsPaid(),
            },
            success: function(response){
                var a = document.createElement("a");
                a.href = response.file;
                a.download = response.name;
                document.body.appendChild(a);
                a.click();
                a.remove();
            },
            error: function(xhr, error){
                console.log(xhr.responseText);
            },
        });
    };

    self.viewExpiredOrder = function(){
      $.ajaxSetup({
           headers: {'X-CSRF-Token': $('#_token').val()}
       });
       $.ajax({
           url: data.API_URLs.ViewExpiredOrder,
           type: "POST",
           beforeSend: function(){
               NProgress.set(0.75);
           },
           success: function(response){
               if(response){
                   self.IsViewRemindButtonClick(false);
                   self.Orders(response.Orders);
               }
           },
           error: function(xhr, error){
               console.log(xhr.responseText);
           },
           complete: function(){
               NProgress.done();
         },
       });
    }

    self.viewRemindOrder = function(){
      $.ajaxSetup({
           headers: {'X-CSRF-Token': $('#_token').val()}
       });
       $.ajax({
           url: data.API_URLs.ViewRemindOrder,
           type: "POST",
           beforeSend: function(){
               NProgress.set(0.75);
           },
           success: function(response){
               if(response){
                   self.IsViewRemindButtonClick(true);
                   self.Orders(response.Orders);
               }
           },
           error: function(xhr, error){
               console.log(xhr.responseText);
               // alert("Something went wrong :(")
           },
           complete: function(){
               NProgress.done();
         },
       });
    }

    self.sendEmailRemindOrder = function(obj){
      $.ajaxSetup({
           headers: {'X-CSRF-Token': $('#_token').val()}
       });
       $.ajax({
           url: data.API_URLs.SendEmailRemindOrder,
           type: "POST",
           data: { Id : obj.id },
           beforeSend: function(){
               NProgress.set(0.75);
           },

           success: function(response){
               if(response && response.IsSuccess == true){
                   alertify.success('Đã gửi email nhắc nhở');
                   self.Orders.remove(obj);
               }
           },
           error: function(xhr, error){
               console.log(xhr.responseText);
               // alert("Something went wrong :(")
           },
           complete: function(){
               NProgress.done();
         },
       });
    }
}
