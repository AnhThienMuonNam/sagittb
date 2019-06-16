function FormViewModel(data) {
  var self = this;
  self.Products = ko.observableArray(data.Products || []);
  self.Categories = ko.observableArray(data.Categories || []);

  self.sCategoryId = ko.observable(null);
  self.sIsActive = ko.observable(null);
  self.sKeyword = ko.observable(null);

  self.search = function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });
    $.ajax({
      url: data.API_URLs.Search,
      beforeSend: function() {
        NProgress.set(0.75);
      },
      type: "POST",
      data: {
        sKeyword: self.sKeyword(),
        sCategoryId: self.sCategoryId(),
        sIsActive: self.sIsActive(),
      },
      success: function(response) {
        self.Products(response.result);
      },
      error: function(xhr, error) {
      },
      complete: function() {
        NProgress.done();
      },
    });
  };

  self.removeProduct = function(obj) {
    alertify.confirm("Xác nhận", "Bạn có chắc chắn muốn xóa?",
      function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-Token': $('#_token').val()
          }
        });
        $.ajax({
          url: data.API_URLs.DeleteProduct,
          type: "POST",
          data: {
            id: obj.id
          },
          success: function(response) {
            if(response.IsSuccess == true){
                 self.Products.remove(obj);
                 alertify.success("Đã xoá thành công");
              }
          },
          error: function(xhr, error) {
          },
        });
      },
      function() {

      });
  };
}
