function FormViewModel(data) {
    // Data
    var self = this;
   
    self.Logo = ko.observable(getRightLogo(data, "1"));
    self.Favicon = ko.observable(getRightLogo(data, "2"));
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);


    function getRightLogo(arrayIcon, typeInt){
        if(arrayIcon && arrayIcon.length > 0){
            var icon = arrayIcon.filter(function(item){
                return item.Type === typeInt;
            });
            if(icon && icon.length > 0){
                return icon[0].Logo;
            }
            else return null;           
        }
         else return null;
    }

    self.uploadImages = function(){
        alertify.confirm("Thông báo","Bạn có chắc muốn tiếp tục?", function (ok) {
            var file_data = $('#uploadFile').prop('files')[0];
            var form_data = new FormData();
            form_data.append('uploadFile', file_data);
            form_data.append('Type', 1);
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });

            $.ajax({
                url: data.API_URLs.EditLogo,
                type: "POST",
                data: form_data, 
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    NProgress.start();
                },
                success: function(response){
                    self.Logo(response.logo);
                    $('#uploadFile').val("");
                },
                error: function(xhr, error){
                },
                complete: function(){
                    NProgress.done();
                },
            });
        }, function(cancel){

        });
    };

     self.uploadFaviconImage = function(){
        alertify.confirm("Thông báo","Bạn có chắc muốn tiếp tục?", function (ok) {
            var file_data = $('#uploadFavicon').prop('files')[0];
            var form_data = new FormData();
            form_data.append('uploadFile', file_data);
            form_data.append('Type', 2);
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });

            $.ajax({
                url: data.API_URLs.EditLogo,
                type: "POST",
                data: form_data, 
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    NProgress.start();
                },
                success: function(response){
                    self.Favicon(response.logo);
                    $('#uploadFavicon').val("");
                },
                error: function(xhr, error){
                },
                complete: function(){
                    NProgress.done();
                },
            });
        }, function(cancel){

        });
    };
    
}

