var MasterViewModel = function(data) {
    var self = this;
    self.userEmail_master = ko.observable(null);
    self.userPassword_master = ko.observable(null);
    self.NotifyErrors_master = ko.observableArray([]);

    self.login_master = function(){
        self.NotifyErrors_master.removeAll();
        if(!self.userEmail_master() || !self.userPassword_master()){
            self.NotifyErrors_master.push('Bạn chưa nhập đủ thông tin bắt buộc*');
            return;
        }
         $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.Login_master,
                beforeSend: function(){
                    NProgress.start();
                },
                type: "POST",
                data: { 
                        email : self.userEmail_master(),
                        password : self.userPassword_master(),
                        }, 
                success: function(response){
                    if(response.IsSuccess == true){
                        location.reload();
                    }
                    else if(response.IsSuccess == false){
                        self.NotifyErrors_master.push('Email hoặc mật khẩu không chính xác');
                    }
                },
                error: function(xhr, error){
                    for(item in xhr.responseJSON){
                        self.NotifyErrors_master.push(xhr.responseJSON[item]);
                    }
                },
                complete: function(){
                    NProgress.done();
                },
        });
    };

    self.logout_master = function(){
         $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.Logout_master,
                beforeSend: function(){
                    NProgress.start();
                },
                type: "POST",
                success: function(response){
                    if(response){
                        location.reload();
                   }
                },
                error: function(xhr, error){
                },
                complete: function(){
                    NProgress.done();
                },
        });
    };

    self.Name_master = ko.observable(null);
    self.Email_master = ko.observable(null);
    self.Phone_master = ko.observable(null);
    self.Password_master = ko.observable(null);
    self.Passwordx2_master = ko.observable(null);
    self.NotifyCreateUserErrors_master = ko.observableArray([]);
    self.NotifyCreateUserSuccess_master = ko.observable(null);
    
    self.createUser_master = function(){
        self.NotifyCreateUserErrors_master.removeAll();
        self.NotifyCreateUserSuccess_master('');
        if(!self.Name_master() || !self.Email_master() || !self.Phone_master() || !self.Password_master() || !self.Passwordx2_master()){
            self.NotifyCreateUserErrors_master.push('Bạn chưa nhập đủ thông tin bắt buộc*');
            return;
        }
        if(self.Password_master() !== self.Passwordx2_master()){
            self.NotifyCreateUserErrors_master.push('Mật khẩu không trùng nhau');
            return;
        }
         $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.CreateUser_master,
                beforeSend: function(){
                    NProgress.start();
                },
                type: "POST",
                data: { 
                        Name : self.Name_master(),
                        Email : self.Email_master(),
                        Phone : self.Phone_master(),
                        Password : self.Password_master(),
                        Passwordx2 : self.Passwordx2_master(),
                        }, 
                success: function(response){
                    if(response.IsSuccess == true){
                        self.Name_master('');
                        self.Email_master('');
                        self.Phone_master('');
                        self.Password_master('');
                        self.Passwordx2_master('');
                        self.NotifyCreateUserSuccess_master('Tài khoản của bạn đã tạo thành công');
                    }
                },
                error: function(xhr, error){
                    for(item in xhr.responseJSON){
                        self.NotifyCreateUserErrors_master.push(xhr.responseJSON[item]);
                    }
                },
                complete: function(){
                    NProgress.done();
                },
        });
    };

    self.EmailResetPassword = ko.observable(null);
    self.NotifySendEmailResetPasswordError = ko.observable(null);
    self.NotifySendEmailResetPasswordSuccess = ko.observable(null);
    
    self.sendEmailResetPassword = function(){
        self.NotifySendEmailResetPasswordError('');
        self.NotifySendEmailResetPasswordSuccess('');
        if(!self.EmailResetPassword()){
            self.NotifySendEmailResetPasswordError('Bạn chưa nhập email');
            return;
        }
       
         $.ajaxSetup({
                headers: {'X-CSRF-Token': $('#_token').val()}
            });
            $.ajax({
                url: data.API_URLs.SendEmailResetPassword,
                beforeSend: function(){
                    NProgress.start();
                },
                type: "POST",
                data: { 
                        Email : self.EmailResetPassword(),
                        }, 
                success: function(response){
                    if(response.IsSuccess == true){
                        self.EmailResetPassword('');
                        self.NotifySendEmailResetPasswordSuccess('Đã gửi mail khôi phục mật khẩu vào email của bạn');
                    } else if(response.IsSuccess == false){
                        self.NotifySendEmailResetPasswordError('Email này chưa đăng ký tài khoản nào');
                    }
                },
                error: function(xhr, error){
                    for(item in xhr.responseJSON){
                        // self.NotifyCreateUserErrors_master.push(xhr.responseJSON[item]);
                    }
                },
                complete: function(){
                    NProgress.done();
                },
        });
    };
    // self.Categories = ko.observableArray(data.Categories || []);
    // self.TotalPriceIndex = ko.observable(null);
    // self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    // self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);

    // self.getFirstImage = function(stringPath){
    //     var result="";
    //     if(stringPath){
    //          var splittedArray = stringPath.split(",");
    //          if(splittedArray.length>0)
    //             result=splittedArray[0];
    //     }
    //     return result ? result : stringPath;
    // };

    //  self.formatMoney = function(number) {
    //     var val=parseInt(number);
    //     return val.toFixed(0).replace(/./g, function(c, i, a) {
    //         return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
    //     }) + "đ" ;
    // };
}


