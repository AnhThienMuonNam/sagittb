function FormViewModel(data) {
    // Data
    var self = this;
   
    self.Policies = ko.observableArray(data.Policies || null);
   
    self.removePolicy = function(obj){
        alertify.confirm("Xác nhận","Bạn có chắc chắn muốn xóa?",
          function(){
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.DeletePolicy,
                type: "POST",
                data: { Id : obj.Id }, 
                success: function(response){
                    self.Policies.remove(obj);
                    alertify.success(response.message);
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

