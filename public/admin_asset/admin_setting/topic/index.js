function FormViewModel(data) {
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
                data: { id : obj.id },
                success: function(response){
                  if(response.IsSuccess == true){
                       self.Topics.remove(obj);
                       alertify.success("Đã xoá thành công");
                    }
                },
                error: function(xhr, error){
                },
            });
          },
          function(){

          });
    };
}
