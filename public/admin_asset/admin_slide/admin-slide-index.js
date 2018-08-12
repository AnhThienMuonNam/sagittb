function FormViewModel(data) {
    // Data
    var self = this;
   
    self.Slides = ko.observableArray(data.Slides || null);
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.Keyword = ko.observable(null);
    
    self.removeSlide = function(obj){
        alertify.confirm("Xác nhận","Bạn có chắc chắn muốn xóa?",
          function(){
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.RemoveSlide,
                type: "POST",
                data: { Id : obj.Id }, 
                success: function(response){
                    self.Slides.remove(obj);
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

    self.search = function(obj){
      
    };
}

