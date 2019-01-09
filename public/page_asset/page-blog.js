function FormViewModel(data) {
    var self = this;
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);

    self.Blogs = ko.observableArray(data.Blogs || [])
    self.OldBlogs = ko.observableArray(data.OldBlogs || [])
    self.PopularPosts = ko.observableArray(data.PopularPosts || [])

    self.Keyword = ko.observable(null);


    // self.removeCategory = function(obj) {
    //     alertify.confirm("Xác nhận","Bạn có chắc chắn muốn xóa?",
    //       function(){
    //         $.ajaxSetup({
    //         headers: {'X-CSRF-Token': $('#_token').val()}
    //         });
    //         $.ajax({
    //             url: data.API_URLs.DeleteCategory,
    //             type: "POST",
    //             data: { Id : obj.Id },
    //             success: function(response){
    //                 if(response.isSuccess){
    //                      self.Categories.remove(obj);
    //                      alertify.success(response.message);
    //                   }
    //                   if(!response.isSuccess){
    //                      alertify.error(response.message);
    //                   }
    //             },
    //             error: function(xhr, error){
    //                 // alert("Something went wrong :(")
    //             },
    //         });
    //       },
    //       function(){
    //
    //       });
    // };
}
