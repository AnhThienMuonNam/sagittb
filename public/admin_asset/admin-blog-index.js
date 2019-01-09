function FormViewModel(data) {
    // Data
    var self = this;
    self.Blogs = ko.observableArray(data.Blogs || [])
    self.Keyword = ko.observable(null);
    self.searchBlog = function() {
         self.Blogs(data || []);
       if(self.Keyword()){
            self.Blogs(self.Blogs().filter(function(item){
                return item.Name.toUpperCase().indexOf(self.Keyword().toUpperCase()) !== -1 ||
                        item.Alias.toUpperCase().indexOf(self.Keyword().toUpperCase()) !== -1;
                })
            );
       }
    };

    self.removeBlog = function(obj) {
        alertify.confirm("Xác nhận","Bạn có chắc chắn muốn xóa?",
          function(){
            $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.DeleteBlog,
                type: "POST",
                data: { Id : obj.Id },
                success: function(response){
                    if(response.isSuccess){
                         self.Blogs.remove(obj);
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
