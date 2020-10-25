function FormViewModel(data) {
    var self = this;
    self.Cities = ko.observableArray(data.Cities || []);

    self.userModel = new UserModel(self, data);
    self.NotifyErrors = ko.observable(null);

    function createUser(redirectToCreateOrder) {
        self.NotifyErrors('');
        if (!self.userModel.validateDateTimeOB()) {
            self.NotifyErrors('Ngày giờ sinh không hợp lệ');
            return;
        }
        let model = self.userModel.toJSON();

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('#_token').val()
            }
        });

        $.ajax({
            url: data.API_URLs.CreateUser,
            beforeSend: function () {
                NProgress.set(0.75);
            },
            type: "POST",
            data: model,
            success: function (response) {
                if (response.IsSuccess == true) {
                    alertify.success('Thêm thành công');
                    if (redirectToCreateOrder) {
                        window.location.replace(data.API_URLs.CreateOrderView + "?userId=" + response.UserId);
                    } else {
                        location.reload();
                    }
                }
            },
            error: function (xhr, error) {
                let responseJSON = xhr.responseJSON;
                let commaKey = '';

                for (var key in responseJSON) {
                    if (responseJSON.hasOwnProperty(key)) {
                        self.NotifyErrors(self.NotifyErrors() + commaKey + responseJSON[key][0]);
                        commaKey = ', ';
                    }
                }
            },
            complete: function () {
                NProgress.done();
            }
        });
    };

    self.createUserAndOrder = function () {
        createUser(true);
    };

    self.createUserNoRedirect = function () {
        createUser(false);
    };
}

var UserModel = function (parent, viewData) {
    var self = this;
    self.id = ko.observable('');
    self.name = ko.observable('');
    self.email = ko.observable('');
    self.phone = ko.observable('');
    self.isAdmin = ko.observable(false);
    self.isOwner = ko.observable(false);
    self.isActive = ko.observable(true);
    self.isExternalAccount = ko.observable(true);
    self.historicalConsultant = ko.observable('');
    self.password = ko.observable('Welcome@sagitt');

    self.yearOB = ko.observable(0);
    self.monthOB = ko.observable(0);
    self.dayOB = ko.observable(0);

    self.timeOfBirthStr = ko.observable('');
    self.hourOB = ko.observable(0);
    self.minuteOB = ko.observable(0);

    self.address = ko.observable('');
    self.district = ko.observable('');
    self.city = ko.observable('');
    self.city_id = ko.observable('');

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

    self.validateDateTimeOB = function () {
        if (self.yearOB() < 0) {
            return false;
        }
        if (self.hourOB() < 0 || self.hourOB() > 24) {
            return false;
        }
        if (self.minuteOB() < 0 || self.minuteOB() > 61) {
            return false;
        }
        return true;
    }

    UserModel.prototype.toJSON = function () {
        return {
            id: ko.utils.unwrapObservable(this.id),
            name: ko.utils.unwrapObservable(this.name),
            email: ko.utils.unwrapObservable(this.email),
            phone: ko.utils.unwrapObservable(this.phone),
            password: ko.utils.unwrapObservable(this.password),
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
            city_id: ko.utils.unwrapObservable(this.city_id)
        }
    }
}
