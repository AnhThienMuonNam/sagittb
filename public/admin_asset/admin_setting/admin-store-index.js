function FormViewModel(data) {
    // Data
    var self = this;
   
    self.Stores = ko.observableArray(data.Stores || null);
   
    self.removeStore = function(obj){
        alertify.confirm("Xác nhận","Bạn có chắc chắn muốn xóa?",
          function(){
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.DeleteStore,
                type: "POST",
                data: { Id : obj.Id }, 
                success: function(response){
                    self.Stores.remove(obj);
                    alertify.success(response.message);
                },
                error: function(xhr, error){
                    alert("Something went wrong :(")
                },
            });
          },
          function(){
            
          });

    };
  
}

