function FormViewModel(data) {
  // Data
  var self = this;
  self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);

  var listImages = data.Product.images ? data.Product.images.split(",") : [];
  self.images = ko.observableArray(listImages);
  self.removeImages = ko.observableArray([]);

  var listTags = data.Product.tags ? data.Product.tags.split(",") : [];
  self.tags = ko.observableArray(listTags);
  self._tags = ko.observableArray(listTags);

  self.categories = ko.observableArray(data.Categories || []);
  self.pieces = ko.observableArray(data.Pieces || []);

  self.id = ko.observable(data.Product.id || null);
  self.name = ko.observable(data.Product.name || null);
  self.isActive = ko.observable(data.Product.is_active || false);
  self.isHot = ko.observable(data.Product.is_hot || false);
  self.description = ko.observable(data.Product.description || null);
  self.metaDescription = ko.observable(data.Product.meta_description || null);

  self.isCustom = ko.observable(false);

  self.categoryId = ko.observable(data.Product.category_id || null);
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

  self.pieceId = ko.observable(data.Product.piece_id || null);

  self.SelectedPiece = ko.observable(self.pieces().filter(function(i) {
    return i.id == self.pieceId();
  })[0] || null);


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

  self.quantityOfPieces = ko.observable(data.Product.quantity_of_pieces || 1);

  self.quantityOfPieces.subscribe(function(quantityOfPieces) {
    calculatePrice(self.SelectedPiece(), quantityOfPieces);
  });
  self.SelectedPiece.subscribe(function(selectedPiece) {
    calculatePrice(selectedPiece, self.quantityOfPieces());
  });

  self.price = ko.observable(data.Product.price || 0);

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
    self.removeImages.push(obj);
    self.images.remove(obj);
  };
  self.NotifyErrors = ko.observable(null);

  self.editProduct = function() {
    self.NotifyErrors('');
    if (!self.name() || !self.categoryId() || !self.pieceId() || !self.price() || self.images().length == 0) {
      self.NotifyErrors('Thông tin bắt buộc chưa đủ');
      return;
    }
    var model = {
      id: self.id(),
      name: self.name(),
      price: self.price(),
      category_id: self.categoryId(),
      piece_id: self.pieceId(),
      quantity_of_pieces: self.quantityOfPieces(),
      tags: self.tags().toString(),
      description: self.description(),
      meta_description: self.metaDescription(),
      is_active: self.isActive() ? 1 : 0,
      is_hot: self.isHot() ? 1 : 0,
      images: self.images().toString(),
      removeImages: self.removeImages()
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });

    $.ajax({
      url: data.API_URLs.EditProduct,
      beforeSend: function() {
        NProgress.set(0.75);
      },
      type: "POST",
      data: model,
      success: function(response) {
        if (response.IsSuccess == true) {
          alertify.success('Cập nhật thành công');
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
