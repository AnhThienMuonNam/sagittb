function FormViewModel(data) {
    var self = this;
    self.products = ko.observableArray(data.Products || []);
    self.categories = ko.observableArray(data.Categories || []);

    self.sCategoryId = ko.observable(null);
    self.sIsActive = ko.observable(null);
    self.sKeyword = ko.observable(null);

    self.search = function() {
       $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });
        $.ajax({
            url: data.API_URLs.Search,
            beforeSend: function(){
                 NProgress.set(0.75);
            },
            type: "POST",
            data: { 
                    sKeyword : self.sKeyword(),
                    sCategoryId : self.sCategoryId(),
                    sIsActive : self.sIsActive(),
                    }, 
            success: function(response){
               self.products(response.result);
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
   
    self.removeFlower = function(obj) {
         alertify.confirm("Xác nhận","Bạn có chắc chắn muốn xóa?",
          function(){
            $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });
        $.ajax({
            url: data.API_URLs.DeleteFlower,
            type: "POST",
            data: { Id : obj.Id }, 
            success: function(response){
                self.products.remove(obj);
                if(response && response.message){
                     alertify.success(response.message);
                  }
            },
            error: function(xhr, error){
                // alert("Something went wrong :(")
            },
        });
          },
          function(){
            
          });
    };
}


