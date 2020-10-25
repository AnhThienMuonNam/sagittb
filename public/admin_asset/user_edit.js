function FormViewModel(data) {
  var self = this;
  self.Cities = ko.observableArray(data.Cities || []);

  self.userModel = new UserModel(self, data);
  self.NotifyErrors = ko.observable(null);

  self.editUser = function () {
    self.NotifyErrors('');

    let model = self.userModel.toJSON();

    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });

    $.ajax({
      url: data.API_URLs.EditUser,
      beforeSend: function () {
        NProgress.set(0.75);
      },
      type: "POST",
      data: model,
      success: function (response) {
        if (response.IsSuccess == true) {
          alertify.success('Cập nhật thành công');
        }
      },
      error: function (xhr, error) {
        // alert("Something went wrong :(")
      },
      complete: function () {
        NProgress.done();
      },
    });
  };

  self.createOrderView = function () {
    let userId = self.userModel.id();
    window.location.replace(data.API_URLs.CreateOrderView + "?userId=" + userId);
  }
}

var UserModel = function (parent, viewData) {
  var self = this;
  self.id = ko.observable(viewData.User.id);
  self.name = ko.observable(viewData.User.name);
  self.email = ko.observable(viewData.User.email);
  self.phone = ko.observable(viewData.User.phone || null);
  self.isAdmin = ko.observable(viewData.User.is_admin == 1 ? true : false);
  self.isOwner = ko.observable(viewData.User.is_owner == 1 ? true : false);
  self.isActive = ko.observable(viewData.User.is_active == 1 ? true : false);

  self.isExternalAccount = ko.observable(viewData.User.is_external_account == 1 ? true : false);
  self.historicalConsultant = ko.observable(viewData.User.historical_consultant);
  self.yearOB = ko.observable(viewData.User.year_ob);
  self.monthOB = ko.observable(viewData.User.month_ob);
  self.dayOB = ko.observable(viewData.User.day_ob);

  self.timeOfBirthStr = ko.observable();
  self.hourOB = ko.observable(viewData.User.hour_ob);
  self.minuteOB = ko.observable(viewData.User.minute_ob);

  self.changeBirthDay = function () {
    let value = $('#sBirthDay').val();
    if (value) {
      let tempDate = value.split('-');
      if (tempDate.length == 3) {
        self.yearOB(tempDate[0]);
        self.monthOB(tempDate[1]);
        self.dayOB(tempDate[2]);
      }
    }
  };

  self.timeOfBirthStr.subscribe(function (value) {
    if (value) {
      let tempDate = value.split(':');
      if (tempDate.length == 2) {
        self.hourOB(tempDate[0]);
        self.minuteOB(tempDate[1]);
      }
    }
  });

  self.address = ko.observable(viewData.User.address);
  self.district = ko.observable(viewData.User.district);
  self.city = ko.observable(viewData.User.city);
  self.city_id = ko.observable(viewData.User.city_id);
  self.city_id.subscribe(function (value) {
    if (value) {
      let city = viewData.Cities.find(x => x.id === value);
      if (city) {
        self.city = ko.observable(city.name);
      }
    } else {
      self.city = ko.observable('');
    }
  });
  self.lichsuTracuus = ko.observableArray(viewData.User.lichsu_tracuus || []);

  function init() {
    if (viewData.User.year_ob > 0) {
      $('#sBirthDay').datepicker('setDate', new Date(viewData.User.year_ob, viewData.User.month_ob - 1, viewData.User.day_ob));

    }
    let hour = viewData.User.hour_ob ? viewData.User.hour_ob : 0;
    let minute = viewData.User.minute_ob ? viewData.User.minute_ob : 0;
    self.timeOfBirthStr(hour + ':' + minute);
  }

  init();

  UserModel.prototype.toJSON = function () {
    return {
      id: ko.utils.unwrapObservable(this.id),
      name: ko.utils.unwrapObservable(this.name),
      email: ko.utils.unwrapObservable(this.email),
      phone: ko.utils.unwrapObservable(this.phone),
      is_admin: ko.utils.unwrapObservable(this.isAdmin() == true ? 1 : 0),
      is_owner: ko.utils.unwrapObservable(this.isOwner() == true ? 1 : 0),
      is_active: ko.utils.unwrapObservable(this.isActive() == true ? 1 : 0),
      is_external_account: ko.utils.unwrapObservable(this.isExternalAccount() == true ? 1 : 0),
      historical_consultant: ko.utils.unwrapObservable(this.historicalConsultant),
      year_ob: ko.utils.unwrapObservable(this.yearOB),
      month_ob: ko.utils.unwrapObservable(this.monthOB),
      day_ob: ko.utils.unwrapObservable(this.dayOB),
      hour_ob: ko.utils.unwrapObservable(this.hourOB),
      minute_ob: ko.utils.unwrapObservable(this.minuteOB),
      address: ko.utils.unwrapObservable(this.address),
      district: ko.utils.unwrapObservable(this.district),
      city: ko.utils.unwrapObservable(this.city),
      city_id: ko.utils.unwrapObservable(this.city_id),
      lichsu_tracuus: ko.utils.unwrapObservable(this.lichsuTracuus)
    }
  }
}
