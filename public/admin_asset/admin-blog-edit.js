var FormViewModel = function (data) {
    // Data
    var self = this;
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.NotifyErrors = ko.observable(null);
    self.blogModel = new BlogModel(data);

    self.saveBlog = function(){
        self.NotifyErrors('');
        self.showErrorValidations();
        if(self.hasErrors()) return;

        var model = self.blogModel.toJSON();

        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('#_token').val()}
        });
        $.ajax({
            url: data.API_URLs.EditBlog,
            beforeSend: function(){
                NProgress.start();
            },
            type: "POST",
            data: model,
            success: function(data){
                if(data.IsSuccess == true){
                    alertify.success('Cập nhật bài viết thành công');
                }
            },
            error: function(xhr, error){
                // alert("Something went wrong :(")
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

var BlogModel = function (data){
    var self = this;
    self.Id = ko.observable(data.blog.id);
    self.Name = ko.observable(data.blog.name);
    self.IsActive = ko.observable(data.blog.is_active == 1 ? true : false);
    self.Description = ko.observable(data.blog.description);
    self.Meta_Description = ko.observable(data.blog.meta_description);
    self.Image = ko.observable(data.blog.image);
    self.Content = ko.observable(data.blog.content);

    var listTags = data.blog.tags ? data.blog.tags.split(",") : [];
    self.Tags = ko.observableArray(listTags);
    self._Tags = ko.observableArray(listTags);
    self.removeImages = ko.observableArray([]);

    BlogModel.prototype.toJSON = function () {
      var content = CKEDITOR.instances['editor1'].getData();
      self.Content(escape(content));
       var model = {
           id: ko.utils.unwrapObservable(this.Id),
           name: ko.utils.unwrapObservable(this.Name),
           is_active: ko.utils.unwrapObservable(this.IsActive() == true ? 1 : 0),
           description: ko.utils.unwrapObservable(this.Description),
           meta_description: ko.utils.unwrapObservable(this.Meta_Description),
           image: ko.utils.unwrapObservable(this.Image),
           content: ko.utils.unwrapObservable(this.Content),
           tags: ko.utils.unwrapObservable(this.Tags() ? this.Tags().toString() : ''),
       };

       return model;
   };

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
              self.Image(res);
              $('#uploadFile').val("");
          },
          error: function(xhr, error){

          },
          complete: function(){
               NProgress.done();
         },
      });
    };

    self.changeTag = function(){
       self.Tags($('#flowerTags').val());
    };

    function Init() {
        CKEDITOR.instances['editor1'].setData(unescape(self.Content()));
    };

    Init();
}
