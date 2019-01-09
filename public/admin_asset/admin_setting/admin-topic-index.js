function FormViewModel(data) {
    // Data
    var self = this;
    self.Topics = ko.observableArray(data.Topics || [])
    self.removeTopic = function(obj) {
        alertify.confirm("Xác nhận","Bạn có chắc chắn muốn xóa?",
          function(){
            $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.DeleteTopic,
                type: "POST",
                data: { Id : obj.Id },
                success: function(response){
                    if(response.isSuccess){
                         self.Topics.remove(obj);
                         alertify.success(response.message);
                      }
                      if(!response.isSuccess){
                         alertify.error(response.message);
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
