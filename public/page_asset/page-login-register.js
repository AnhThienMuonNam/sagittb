var LoginRegisterViewModel = function(data) {
    self.Name = ko.observable(null);
    self.Email = ko.observable(null);
    self.PhoneNumber = ko.observable(null);
    self.Password = ko.observable(null);
    self.Password_confirmation = ko.observable(null);
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);
    self.notifySuccess = ko.observableArray([]);
    self.notifyError = ko.observableArray([]);

    self.register = function(){
        self.notifyError.removeAll();
        self.notifySuccess.removeAll();
        
     $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.register,
                beforeSend: function(){
                    NProgress.start();
                },
                type: "POST",
                data: { 
                        Name : self.Name(),
                        Email : self.Email(),
                        PhoneNumber : self.PhoneNumber() ,
                        Password : self.Password() ,
                        Password_confirmation : self.Password_confirmation() 
                        }, 
                success: function(response){
                    self.Name(null);
                    self.Email(null);
                    self.PhoneNumber(null);
                    self.Password(null);
                    self.Password_confirmation(null);
                    self.notifySuccess.push('Đăng ký tài khoản thành công');
                },
                error: function(xhr, error){
                    for(item in xhr.responseJSON){
                        self.notifyError.push(xhr.responseJSON[item]);
                    }
                },
                complete: function(){
                    NProgress.done();
                },
        });
    };
    
}




