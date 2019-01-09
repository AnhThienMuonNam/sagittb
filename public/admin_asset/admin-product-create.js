function FormViewModel(data) {
  // Data
  var self = this;
  self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);

  self.images = ko.observableArray([]);

  self.tags = ko.observableArray([]);
  self.categories = ko.observableArray(data.Categories || []);
  self.name = ko.observable(null);
  self.isActive = ko.observable(true);
  self.isHot = ko.observable(false);
  self.description = ko.observable(null);
  self.metaDescription = ko.observable(null);
  self.pieces = ko.observableArray(data.Pieces || []);
  self.isCustom = ko.observable(false);
  self.categoryId = ko.observable(null);
  self.categoryId.subscribe(function(value) {
    if (value) {
      var seletedItem = self.categories().filter(function(i) {
        return i.id == value;
      })[0];
      if (seletedItem && seletedItem.is_custom == true) {
        self.isCustom(true);
      } else {
        self.isCustom(false);
      }
    }
  });

  self.SelectedPiece = ko.observable(null);
  self.quantityOfPieces = ko.observable(1);

  self.pieceId = ko.observable(null);
  self.pieceId.subscribe(function(value) {
    if (value) {
      var seletedItem = self.pieces().filter(function(i) {
        return i.id == value;
      })[0];
      if (seletedItem) {
        self.SelectedPiece(seletedItem);
      } else {
        self.SelectedPiece(null);
      }
    }
  });

  self.quantityOfPieces.subscribe(function(quantityOfPieces) {
    calculatePrice(self.SelectedPiece(), quantityOfPieces);
  });

  self.SelectedPiece.subscribe(function(selectedPiece) {
    calculatePrice(selectedPiece, self.quantityOfPieces());
  });

  self.price = ko.observable(0);

  var calculatePrice = function(selectedPiece, quantityOfPieces) {
    if (selectedPiece && quantityOfPieces)
      self.price(parseInt(selectedPiece.price) * parseInt(quantityOfPieces));
    else
      self.price(0);
  }


  self.changeTag = function() {
    self.tags($('#flowerTags').val());
  };
  self.uploadImages = function() {
    var file_data = $('#uploadFile').prop('files')[0];
    var form_data = new FormData();
    form_data.append('uploadFile', file_data);
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });

    $.ajax({
      url: data.API_URLs.UploadImage,
      beforeSend: function() {
        NProgress.set(0.75);
      },
      type: "POST",
      data: form_data,
      cache: false,
      contentType: false,
      processData: false,
      success: function(res) {
        self.images.push(res);
        $('#uploadFile').val("");
      },
      error: function(xhr, error) {
        // alert("Something went wrong :(")
      },
      complete: function() {
        NProgress.done();
      },
    });
  };

  self.removeImage = function(obj) {
    var form_data = new FormData();
    form_data.append('deleteFile', obj);
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });

    $.ajax({
      url: data.API_URLs.DeleteImage,
      beforeSend: function() {
        NProgress.set(0.75);
      },
      type: "POST",
      data: form_data,
      cache: false,
      contentType: false,
      processData: false,
      success: function(res) {
        self.images.remove(obj);
      },
      error: function(xhr, error) {
        // alert("Something went wrong :(")
      },
      complete: function() {
        NProgress.done();
      },
    });
  };
  self.NotifyErrors = ko.observable(null);

  self.createProduct = function() {
    self.NotifyErrors('');
    if (!self.name() || !self.categoryId() || !self.pieceId() || !self.price() || self.images().length == 0) {
      self.NotifyErrors('Thông tin bắt buộc chưa đủ');
      return;
    }

    var model = {
      name: self.name(),
      price: self.price(),
      category_id: self.categoryId(),
      piece_id: self.pieceId(),
      quantity_of_pieces: self.quantityOfPieces(),
      tags: self.tags().toString(),
      description: self.description(),
      meta_description: self.metaDescription(),
      is_active: self.isActive(),
      is_hot: self.isHot(),
      images: self.images().toString()
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });

    $.ajax({
      url: data.API_URLs.CreateProduct,
      beforeSend: function() {
        NProgress.set(0.75);
      },
      type: "POST",
      data: model,
      success: function(response) {
        if (response.IsSuccess == true) {
          alertify.success('Tạo sản phẩm thành công');
          setTimeout(function() {
            location.reload();
          }, 3000);
        }
      },
      error: function(xhr, error) {
        // alert("Something went wrong :(")
      },
      complete: function() {
        NProgress.done();
      },
    });
  };
}
