var FormViewModel = function (data) {
    // Data
    var self = this;
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.NotifyErrors = ko.observable(null);

    self.categoryId = ko.observable(data.category.id || null);
    self.categoryName = ko.observable(data.category.name || null).extend({ required: { params: true, message: 'Danh mục chưa có tên' } });
    self.categoryImage = ko.observable(data.category.image || null);
    self.categoryIsActive = ko.observable(data && data.category.is_active == 1 ? true: false);
    self.categoryIsCustom = ko.observable(data && data.category.is_custom == 1 ? true: false);

    self.currentKieudays = ko.observableArray(convertToColorKieudayViewModel(data.currentKieudays) || []);

    self.kieudayViewModel = ko.observable(new ColorKieudayViewModel());

     self.uploadImages = function(){
        var file_data = $('#uploadFile').prop('files')[0];
        var form_data = new FormData();
        form_data.append('uploadFile', file_data);
         form_data.append('categoryId', self.categoryId());
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

    function convertToMaterialCharmViewModel(array){
        var result = [];
        if(array){
            for(var i=0;i<array.length;i++){
                var newItem = new MaterialCharmViewModel(array[i]);
                result.push(newItem);
            }
        }
        return result;
    };


    function convertToColorKieudayViewModel(array){
        var result = [];
          if(array){
            for(var i=0;i<array.length;i++){
                var newItem = new ColorKieudayViewModel(array[i]);
                result.push(newItem);
            }
        }
        return result;
    };

  
    self.idNewKieuday  = ko.observable(false);

    self.addKieuday = function(){
        self.kieudayViewModel(new ColorKieudayViewModel());
        self.idNewKieuday(true);
        $('#modal-kieuday').modal();
    };

    self.editKieuday = function(data){
        self.idNewKieuday(false);
        self.kieudayViewModel(new ColorKieudayViewModel(data.toJSON()));
        $('#modal-kieuday').modal();
    };

    self.saveKieuday = function(){
        self.kieudayViewModel().showErrorValidations();
        if(self.kieudayViewModel().hasErrors()) return;
        if(self.idNewKieuday() == true){
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

    self.removeKieuday = function(obj){
        alertify.confirm("Xác nhận","Bạn có chắc chắn xóa?",
            function (ok) {
                if(obj.id()){
                    obj.is_deleted(true);
                }else{
                    self.currentKieudays.remove(obj);
                }
            }, function(cancel) { });
    };





    self.saveCategory = function(){
        self.NotifyErrors('');
        self.showErrorValidations();
        if(self.hasErrors()) return;


        if(self.categoryIsCustom()){
            if(self.currentKieudays().filter(function(i){return !i.is_deleted() }).length == 0) {

                self.NotifyErrors('Dữ liệu nhập chưa đầy đủ');
                return;
            }
        }

        var model = {
            categoryId: self.categoryId(),
            categoryName: self.categoryName(),
            categoryIsActive: self.categoryIsActive() == true ? 1 : 0,
            categoryIsCustom: self.categoryIsCustom() == true ? 1 : 0,
            kieudays: self.currentKieudays(),
        }

        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });
        $.ajax({
            url: data.API_URLs.EditCategory,
            beforeSend: function(){
                NProgress.start();
            },
            type: "POST",
            data: model,
            success: function(data){
                if(data.IsSuccess == true){
                    alertify.success('Cập nhật thành công');
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

}



var ColorKieudayViewModel = function (data) {
    var self = this;
    self.id = ko.observable(data ? data.id : null);
    self.name = ko.observable(data ? data.name : null);
    self.is_deleted = ko.observable(data ? data.is_deleted : false);
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

    ColorKieudayViewModel.prototype.toJSON = function() {
        var model = {
                id: ko.utils.unwrapObservable(this.id),
                name: ko.utils.unwrapObservable(this.name),
                is_deleted: ko.utils.unwrapObservable(this.is_deleted),
            };

        return model;
    };
}


 var MaterialCharmViewModel = function (data) {
    var self = this;
    self.id = ko.observable(data ? data.id : null);
    self.name = ko.observable(data ? data.name : null);
    self.price = ko.observable(data ? data.price : null);
    self.is_deleted = ko.observable(data ? data.is_deleted : false);
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
    self.fakePrice = ko.observable(data ? data.price : null).extend({ required: { params: true, message: 'Chưa có giá' } });

    MaterialCharmViewModel.prototype.toJSON = function() {
        var model = {
                id: ko.utils.unwrapObservable(this.id),
                name: ko.utils.unwrapObservable(this.name),
                price: ko.utils.unwrapObservable(this.price),
                is_deleted: ko.utils.unwrapObservable(this.is_deleted),
            };

        return model;
    };
}
