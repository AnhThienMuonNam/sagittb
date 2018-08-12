var FormViewModel = function(data) {
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);

    self.NotifyErrors = ko.observable(null);

    self.Token = ko.observable(data.Token || null);
    self.NewPassword = ko.observable(null);
    self.NewPasswordx2 = ko.observable(null);

    self.changePassword = function(){
        self.NotifyErrors('');
        if(!self.NewPassword() || !self.NewPasswordx2()){
            self.NotifyErrors('Bạn chưa nhập đủ thông tin bắt buộc*');
            return;
        }
        $.ajaxSetup({ headers: {'X-CSRF-Token': $('#_token').val()}  });
        $.ajax({
            url: data.API_URLs.ResetPassWord,
            type: "POST",
            beforeSend: function() {
                NProgress.start();
            },
            data: { 
                    Token : self.Token(),
                    Password : self.NewPassword(),
                    Passwordx2 : self.NewPasswordx2(),
                    }, 
            success: function(response){
                if(response.IsSuccess == true){
                    alertify.success('<i class="fa fa-bell" aria-hidden="true"></i><strong> Đổi mật khẩu thành công </strong>');
                    setTimeout(function(){ location.reload(); }, 3000);
                }
                if(response.IsSuccess == false){
                    self.NotifyErrors(response.message ? response.message : 'Đổi mật khẩu thất bại')
                }
            },
            error: function(xhr, error){
                for(item in xhr.responseJSON){
                    // self.notifyError.push(xhr.responseJSON[item]);
                }
                //  $(window).scrollTop(0);
            },
            complete: function(){
                self.NewPassword(null);
                self.NewPasswordx2(null);
                NProgress.done();
            },
        });
    };
    
}




