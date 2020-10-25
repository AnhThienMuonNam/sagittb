function FormViewModel(data) {
    var self = this;
    self.Blogs = ko.observableArray(data.Blogs || [])

    self.removeBlog = function(obj) {
        alertify.confirm("Xác nhận","Bạn có chắc chắn muốn xóa?",
          function(){
            $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.DeleteBlog,
                type: "POST",
                data: { id : obj.id },
                success: function(response){
                    if(response.IsSuccess == true){
                         self.Blogs.remove(obj);
                         alertify.success("Đã xoá thành công");
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
