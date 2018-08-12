function FormViewModel(data) {
    // Data
    var self = this;
    self.Categories = ko.observableArray(data.Categories || [])
    self.Keyword = ko.observable(null);
    self.searchCategory = function() {
         self.Categories(data || []);
       if(self.Keyword()){
            self.Categories(self.Categories().filter(function(item){
                return item.Name.toUpperCase().indexOf(self.Keyword().toUpperCase()) !== -1 || 
                        item.Alias.toUpperCase().indexOf(self.Keyword().toUpperCase()) !== -1;
                })
            );        
       }
    };

    self.removeCategory = function(obj) {
        alertify.confirm("Xác nhận","Bạn có chắc chắn muốn xóa?",
          function(){
            $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.DeleteCategory,
                type: "POST",
                data: { Id : obj.Id }, 
                success: function(response){
                    if(response.isSuccess){
                         self.Categories.remove(obj);
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


