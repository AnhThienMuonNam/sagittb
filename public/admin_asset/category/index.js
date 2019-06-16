function FormViewModel(data) {
    var self = this;
    self.Categories = ko.observableArray(data.Categories || [])
    self.removeCategory = function(obj) {
        alertify.confirm("Xác nhận","Bạn có chắc chắn muốn xóa?",
          function(){
            $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.DeleteCategory,
                type: "POST",
                data: { id : obj.id },
                success: function(response){
                    if(response.IsSuccess == true){
                         self.Categories.remove(obj);
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
