var FormViewModel = function(data) {
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);



    self.Id = ko.observable(data.User.id || null);
    self.Name = ko.observable(data.User.name || null);
    self.Email = ko.observable(data.User.email || null);
    self.Phone = ko.observable(data.User.phone || null);
    self.Address = ko.observable(data.User.address || null);
    self.District = ko.observable(data.User.district || null);
    self.City = ko.observable(data.User.city ? data.User.city.name : null);
    self.CityId = ko.observable(data.User.city_id || null);

    self.Cities = ko.observableArray(data.Cities || []);
    self.CityId.subscribe(function(value){
        if(value){
            var item = self.Cities().filter(function(i){ return i.id == value; })[0];
            if(item){
                self.City(item.name);
            }
        }else{
            self.City('');
        }
    });

    self.Genders = ko.observableArray([{id: -1, name: 'Chưa xác định'},{id: 0, name: 'Nữ'},{id: 1, name: 'Nam'}]);
    self.Gender = ko.observable(data.User.gender || -1);


    self.Hours = ko.observableArray(generateMasterData(0,23));
    self.Minutes = ko.observableArray(generateMasterData(0,59));
    self.Years = ko.observableArray(generateMasterData(1990,2050));
    self.Months = ko.observableArray(generateMasterData(1,12));
    self.Days = ko.observableArray(generateMasterData(1,31));

    self.YearOb = ko.observable(data.User.year_ob || null);
    self.MonthOb = ko.observable(data.User.month_ob || null);
    self.DayOb = ko.observable(data.User.day_ob || null);
    self.HourOb = ko.observable(data.User.hour_ob || null);
    self.MinuteOb = ko.observable(data.User.minute_ob || null);

  self.YearOb.subscribe(function(val){
    calculatorDaysFromMonthandYear(val, self.MonthOb());
  });
  self.MonthOb.subscribe(function(val){
    calculatorDaysFromMonthandYear(self.YearOb(), val);
  });
    function generateMasterData(minVal, maxVal){
      var result = [];
      for(var i = minVal; i <= maxVal; i++){
        result.push(i);
      }
      return result;
    };

    function calculatorDaysFromMonthandYear(seletedYear, seletedMonth){
      var isLeapYear = false;
      if ((seletedYear % 4 == 0 && seletedYear % 100 != 0 && seletedYear % 400 !==0) ||
          (seletedYear % 100 == 0 && seletedYear % 400 == 0)){
        isLeapYear = true;
      }
      if (seletedMonth == 2 && isLeapYear == true){
        self.Days(generateMasterData(1,29));
      } else if (seletedMonth == 2 && isLeapYear == false){
          self.Days(generateMasterData(1,28));
      } else if (seletedMonth == 1 || seletedMonth == 3 || seletedMonth == 5 || seletedMonth == 7
              || seletedMonth == 8 || seletedMonth == 10 || seletedMonth == 12){
          self.Days(generateMasterData(1,31));
      } else {
        self.Days(generateMasterData(1,30));
      }

    };

    self.NotifyErrors = ko.observable(null);
    self.WhichAction = ko.observable(0);

    self.SuccessNotifyForPopup = ko.observable(null);

    self.openPopupGetOTPForUpdateInfo = function(){
        self.WhichAction(1);
        $("#modalGetOTPCodePageProfile").modal()
    };

    self.openPopupGetOTPForChangePassword = function(){
        self.WhichAction(2);
        $("#modalGetOTPCodePageProfile").modal()
    };

    self.OTPCode = ko.observable(null);

    self.UpdateUserCommon = function(){
      if(self.WhichAction() == 1){
        self.updateUser();
      } else if(self.WhichAction() == 2) {
        self.changePassword();
      }
    };

    self.GetOTP = function() {
       $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });
        $.ajax({
            url: data.API_URLs.GetOTP,
            type: "POST",
            data: {
                    Email : self.Email()
                    },
            success: function(response){

              self.SuccessNotifyForPopup('');
                if(response.IsSuccess == true){
                  self.SuccessNotifyForPopup('Mã xác thực đã được gửi vào email của bạn');
                }
            },
            error: function(xhr, error){
                console.log(xhr.responseText);
                // alert("Something went wrong :(")
            },
        });
    };







    self.updateUser = function(){
        self.NotifyErrors('');
        if(!self.Name() || !self.Phone()){
            self.NotifyErrors('Bạn chưa nhập đủ thông tin bắt buộc*');
            return;
        }
        $.ajaxSetup({ headers: {'X-CSRF-Token': $('#_token').val()}  });
        $.ajax({
            url: data.API_URLs.UpdateUser,
            type: "POST",
            data: {
                    Name : self.Name(),
                    Phone : self.Phone(),
                    Address : self.Address(),
                    District : self.District(),
                    City : self.City(),
                    CityId : self.CityId(),
                    YearOb : self.YearOb(),
                    MonthOb : self.MonthOb(),
                    DayOb : self.DayOb(),
                    HourOb : self.HourOb(),
                    MinuteOb : self.MinuteOb(),
                    Gender : self.Gender(),

                    },
            beforeSend: function() {
                NProgress.start();
            },
            success: function(response){
                if(response.IsSuccess == true){
                  $('#modalGetOTPCodePageProfile').modal('toggle');
                    alertify.success('<i class="fa fa-bell" aria-hidden="true"></i><strong> Cập nhật thành công </strong>');
                }
                // self.notifySuccess.push(response.message);
            },
            error: function(xhr, error){
                for(item in xhr.responseJSON){
                    // self.notifyError.push(xhr.responseJSON[item]);
                }
            },
            complete: function(){
                // $(window).scrollTop(0);
                NProgress.done();
            },
        });
    };

    self.OldPassword = ko.observable(null);
    self.NewPassword = ko.observable(null);
    self.NewPasswordx2 = ko.observable(null);

    self.changePassword = function(){
        self.NotifyErrors('');
        if(!self.OldPassword() || !self.NewPassword() || !self.NewPasswordx2()){
            self.NotifyErrors('Bạn chưa nhập đủ thông tin bắt buộc*');
            return;
        }
        $.ajaxSetup({ headers: {'X-CSRF-Token': $('#_token').val()}  });
        $.ajax({
            url: data.API_URLs.ChangePassWord,
            type: "POST",
            beforeSend: function() {
                NProgress.start();
            },
            data: {
                    OldPassword : self.OldPassword(),
                    NewPassword : self.NewPassword(),
                    NewPasswordx2 : self.NewPasswordx2(),
                    },
            success: function(response){
                if(response.IsSuccess == true){
                    $('#modalGetOTPCodePageProfile').modal('toggle');
                    alertify.success('<i class="fa fa-bell" aria-hidden="true"></i><strong> Đổi mật khẩu thành công </strong>');
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
                self.OldPassword(null);
                self.NewPassword(null);
                self.NewPasswordx2(null);
                NProgress.done();
            },
        });
    };

}
