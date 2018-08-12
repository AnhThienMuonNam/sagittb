function FormViewModel(data) {
    // Data
    var self = this;
   
    self.Policiesb = ko.observableArray(data.Policiesb || null);
   
    self.removePolicyb = function(obj){
        alertify.confirm("Xác nhận","Bạn có chắc chắn muốn xóa?",
          function(){
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.DeletePolicyb,
                type: "POST",
                data: { Id : obj.Id }, 
                success: function(response){
                    self.Policiesb.remove(obj);
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

