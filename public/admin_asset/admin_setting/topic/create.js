var FormViewModel = function (data) {
    // Data
    var self = this;
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.NotifyErrors = ko.observable(null);
    self.topicModel = new TopicModel(data);

    self.saveTopic = function () {
        self.NotifyErrors('');
        self.showErrorValidations();
        if (self.hasErrors()) return;

        var model = self.topicModel.toJSON();

        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('#_token').val() }
        });
        $.ajax({
            url: data.API_URLs.CreateTopic,
            beforeSend: function () {
                NProgress.start();
            },
            type: "POST",
            data: model,
            success: function (data) {
                if (data.IsSuccess == true) {
                    alertify.success('Tạo Topic thành công');
                    self.topicModel = new TopicModel(data);
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

var TopicModel = function (data) {
    var self = this;
    self.Id = ko.observable(null);
    self.Line1 = ko.observable('');
    self.Line2 = ko.observable('');
    self.Line3 = ko.observable('');
    self.Url = ko.observable('');
    self.IsActive = ko.observable(true);
    self.Image = ko.observable('');

    TopicModel.prototype.toJSON = function () {
        var model = {
            id: ko.utils.unwrapObservable(this.Id),
            line1: ko.utils.unwrapObservable(this.Line1),
            line2: ko.utils.unwrapObservable(this.Line2),
            line3: ko.utils.unwrapObservable(this.Line3),
            url: ko.utils.unwrapObservable(this.Url),
            is_active: ko.utils.unwrapObservable(this.IsActive() == true ? 1 : 0),
            image: ko.utils.unwrapObservable(this.Image),
        };

        return model;
    };

    self.uploadImages = function () {
        var file_data = $('#uploadFile').prop('files')[0];
        var form_data = new FormData();
        form_data.append('uploadFile', file_data);
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('#_token').val() }
        });

        $.ajax({
            url: data.API_URLs.UploadImage,
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

            },
            complete: function () {
                NProgress.done();
            },
        });
    };
}
