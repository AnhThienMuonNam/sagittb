function FormViewModel(data) {
    // Data
    var self = this;
   
    self.Image = ko.observable(null);
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);

    self.uploadImages = function(){
        var file_data = $('#uploadFile').prop('files')[0];
        var form_data = new FormData();
        form_data.append('uploadFile', file_data);
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });

        $.ajax({
            url: data.API_URLs.UploadImage,
            type: "POST",
            data: form_data, 
            cache: false,
            contentType: false,
            processData: false,
            success: function(res){
                if(self.Image()){
                    self.removeImage(self.Image());
                }
                self.Image(res);
                $('#uploadFile').val("");
            },
            error: function(xhr, error){
                alert("Something went wrong :(")
            },
        });
    };

    self.removeImage = function(obj){
        var form_data = new FormData();
        form_data.append('deleteFile', obj);
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });

        $.ajax({
            url: data.API_URLs.DeleteImage,
            type: "POST",
            data: form_data, 
            cache: false,
            contentType: false,
            processData: false,
            success: function(res){
                // self.Images.remove(obj);
            },
            error: function(xhr, error){
                alert("Something went wrong :(")
            },
        });
    };
}

