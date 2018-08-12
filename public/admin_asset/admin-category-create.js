var FormViewModel = function (data) {
    // Data
    var self = this;
    self.NotifyErrors = ko.observable(null);
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.categoryImage = ko.observable(null);
    self.categoryName = ko.observable(null);
    self.categoryIsActive = ko.observable(false);
    self.categoryIsCustom = ko.observable(false);

    self.currentKieudays = ko.observableArray([]);

    self.kieudayViewModel = ko.observable(new KieudayViewModel());

    self.idNewKieuday  = ko.observable(false);

    self.uploadImages = function(){
        var file_data = $('#uploadFile').prop('files')[0];
        var form_data = new FormData();
        form_data.append('uploadFile', file_data);
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });

        $.ajax({
            url: data.API_URLs.UploadImage,
            beforeSend: function(){
                 NProgress.set(0.75);
            },
            type: "POST",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res){
                self.categoryImage(res);
                $('#uploadFile').val("");
            },
            error: function(xhr, error){
                // alert("Something went wrong :(")
            },
            complete: function(){
                 NProgress.done();
           },
        });
    };



    self.addKieuday = function(){
        self.kieudayViewModel(new KieudayViewModel());
        self.idNewKieuday(true);
        $('#modal-kieuday').modal();
    };

    self.editKieuday = function(obj){
        self.idNewKieuday(false);
        self.kieudayViewModel(new KieudayViewModel(obj.toJSON()));
        $('#modal-kieuday').modal();
    };

    self.removeKieuday = function(obj){
        self.currentKieudays.remove(obj);
    };

    self.saveKieuday = function(){
        self.kieudayViewModel().showErrorValidations();
        if(self.kieudayViewModel().hasErrors()) return;

        if(self.idNewKieuday() == true){
            self.kieudayViewModel().id(self.currentKieudays().length + 1);
            self.kieudayViewModel().name(self.kieudayViewModel().fakeName());
            self.currentKieudays.push(self.kieudayViewModel());
        } else if(self.idNewKieuday() == false){
            var item = self.currentKieudays().filter(function(i){ return i.id() == self.kieudayViewModel().id();})[0];
            if(item){
                item.name(self.kieudayViewModel().fakeName());
            }
        }

        $('#modal-kieuday').modal('toggle');
    };


    self.saveCategory = function(){
        self.NotifyErrors('');
        if(!self.categoryName() || !self.categoryImage()) {
            self.NotifyErrors('Dữ liệu nhập chưa đủ');
            return;
        }


        if(self.categoryIsCustom()){
            if(self.currentKieudays().length == 0) {
                self.NotifyErrors('Dữ liệu nhập chưa đủ');
                return;
            }
        }

        var model = {
            categoryName: self.categoryName(),
            categoryIsActive: self.categoryIsActive() == true ? 1 : 0,
            categoryIsCustom: self.categoryIsCustom() == true ? 1 : 0,
            kieudays: self.currentKieudays(),
            categoryImage: self.categoryImage()
        }

        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });
        $.ajax({
            url: data.API_URLs.CreateCategory,
            beforeSend: function(){
                NProgress.start();
            },
            type: "POST",
            data: model,
            success: function(data){
              if(data.IsSuccess == true){
                  alertify.success('Thêm danh mục thành công');
              }
            },
            error: function(xhr, error){
                alert("Something went wrong :(")
            },
            complete: function(){
                NProgress.done();
            },
        });
    };

}


var KieudayViewModel = function (data) {
    var self = this;
    self.id = ko.observable(data && data.id ? data.id : null);
    self.name = ko.observable(data && data.name ? data.name : null);

    self.hasErrors = ko.observable(false);
    self.showErrorValidations = function () {
        var errors = ko.validation.group(self);
        if(errors().length > 0){
            errors.showAllMessages(true);
            self.hasErrors(true);
        }else{
            self.hasErrors(false);
        }
    };
    self.fakeName = ko.observable(data ? data.name : null).extend({ required: { params: true, message: 'Chưa có tên' } });

    KieudayViewModel.prototype.toJSON = function() {
        var model = {
                id: ko.utils.unwrapObservable(this.id),
                name: ko.utils.unwrapObservable(this.name),
            };

        return model;
    };
}
