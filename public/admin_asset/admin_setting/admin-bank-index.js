function FormViewModel(data) {
    // Data
    var self = this;
   
    self.Banks = ko.observableArray(data.Banks || null);
   
    self.removeBank = function(obj){
        alertify.confirm("Xác nhận","Bạn có chắc chắn muốn xóa?",
          function(){
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.DeleteBank,
                type: "POST",
                data: { Id : obj.Id }, 
                success: function(response){
                    self.Banks.remove(obj);
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

