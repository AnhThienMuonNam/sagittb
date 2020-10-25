var FormViewModel = function (data) {
    // Data
    var self = this;
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.NotifyErrors = ko.observable(null);
    self.categoryModel = new CategoryModel(data);

    self.saveCategory = function () {
        self.NotifyErrors('');
        self.showErrorValidations();
        if (self.hasErrors()) return;

        var model = self.categoryModel.toJSON();

        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('#_token').val() }
        });
        $.ajax({
            url: data.API_URLs.CreateCategory,
            beforeSend: function () {
                NProgress.start();
            },
            type: "POST",
            data: model,
            success: function (data) {
                if (data.IsSuccess == true) {
                    alertify.success('Thêm thành công');
                    location.reload();
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
            },
        });
    };

    self.hasErrors = ko.observable(false);
    self.showErrorValidations = function () {
        var errors = ko.validation.group(self);
        if (errors().length > 0) {
            errors.showAllMessages(true);
            self.hasErrors(true);
        } else {
            self.hasErrors(false);
        }
    };

}


var CategoryModel = function (parent) {
    var self = this;
    self.Id = ko.observable(null);
    self.Name = ko.observable('');
    self.IsActive = ko.observable(true);
    self.IsCustom = ko.observable(false);
    self.Image = ko.observable('');
    self.SizeHatName = ko.observable('');
    self.SizeVongName = ko.observable('');
    self.KieudayName = ko.observable('');

    self.Kieudays = ko.observableArray([]);
    self.SizeHats = ko.observableArray([]);
    self.SizeVongs = ko.observableArray([]);

    self.changeSizeVong = function () {
        self.SizeVongs($('#sizeVongsList').val());
    };

    CategoryModel.prototype.toJSON = function () {
        var model = {
            id: ko.utils.unwrapObservable(this.Id),
            name: ko.utils.unwrapObservable(this.Name),
            is_active: ko.utils.unwrapObservable(this.IsActive() == true ? 1 : 0),
            is_custom: ko.utils.unwrapObservable(this.IsCustom() == true ? 1 : 0),
            size_hat_name: ko.utils.unwrapObservable(this.SizeHatName),
            sizevong_name: ko.utils.unwrapObservable(this.SizeVongName),
            kieuday_name: ko.utils.unwrapObservable(this.KieudayName),
            image: ko.utils.unwrapObservable(this.Image),

            sizevongs: ko.utils.unwrapObservable(this.SizeVongs().length > 0 ? this.SizeVongs().toString() : ''),
            kieudays: ko.utils.unwrapObservable(this.Kieudays),
            sizehats: ko.utils.unwrapObservable(this.SizeHats)
        };

        return model;
    };

    self.addSizeHat = function () {
        var newObject = {
            name: '',
            value: null
        };
        self.SizeHats.push(newObject);
    };

    self.removeSizeHat = function (item) {
        self.SizeHats.remove(item);
    };

    self.addKieuday = function () {
        var newObject = {
            name: '',
            value: null
        };
        self.Kieudays.push(newObject);
    };

    self.removeKieuday = function (item) {
        self.Kieudays.remove(item);
    };

    self.uploadImages = function () {
        var file_data = $('#uploadFile').prop('files')[0];
        var form_data = new FormData();
        form_data.append('uploadFile', file_data);
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('#_token').val() }
        });

        $.ajax({
            url: parent.API_URLs.UploadImage,
            beforeSend: function () {
                NProgress.set(0.75);
            },
            type: "POST",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
                self.Image(res);
                $('#uploadFile').val("");
            },
            error: function (xhr, error) {
                // alert("Something went wrong :(")
            },
            complete: function () {
                NProgress.done();
            },
        });
    };
}
