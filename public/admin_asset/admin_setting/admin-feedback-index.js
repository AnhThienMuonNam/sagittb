function FormViewModel(data) {
    // Data
    var self = this;
   
    self.Feedbacks = ko.observableArray(data.Feedbacks || null);
   
    self.removeFeedback = function(obj){
        alertify.confirm("Xác nhận","Bạn có chắc chắn muốn xóa?",
          function(){
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.DeleteFeedback,
                type: "POST",
                data: { Id : obj.Id }, 
                success: function(response){
                    self.Feedbacks.remove(obj);
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

