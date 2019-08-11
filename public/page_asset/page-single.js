var SingleViewModel = function (data) {
  self.masterViewModel = new MasterViewModel(data);

  self.User = ko.observable(data.User || null);
  self.Product = ko.observable(data.Product || null);
  self.Id = ko.observable(data.Product.id || null);

  self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);
  self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);

  self.ServerPieces = ko.observableArray(data.Pieces || []);
  self.ServerCharms = ko.observableArray(data.Charms);

  self.SizeCoTays = ko.observableArray(data.SizeCoTays);

  self.IsInWishList = ko.observable(data.IsInWishList || false);

  self.addToWishList = function () {
    if (self.User()) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-Token': $('#_token').val()
        }
      });
      $.ajax({
        url: data.API_URLs.AddToWishList,
        type: "POST",
        data: {
          productId: self.Id(),
          isInWishList: self.IsInWishList() ? 1 : 0
        },
        beforeSend: function () {
          NProgress.start();
        },
        success: function (response) {
          if (response) {
            self.IsInWishList(response.isInWishList);
          }
        },
        error: function (xhr, error) {
          // alert("Something went wrong :(")
        },
        complete: function () {
          NProgress.done();
        },

      });
    } else {
      alertify.warning('<i class="fa fa-bell" aria-hidden="true" style="color: white;"></i> <strong style="color: white;">Xin lỗi! Chức năng này chỉ sử dụng được khi bạn đã đăng nhập</strong>');
    }
  };

  self.formatMoney = function (number) {
    var val = parseInt(number);
    return val.toFixed(0).replace(/./g, function (c, i, a) {
      return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
    }) + "đ";
  };

  self.Nam = ko.observable(null);
  self.phongThuy = ko.observable();

  self.getPhongThuy = function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });
    $.ajax({
      url: data.API_URLs.GetPhongThuy,
      type: "POST",
      data: {
        nam: self.Nam()
      },
      beforeSend: function () {
        NProgress.start();
      },
      success: function (response) {
        if (response && response.IsSuccess == true) {
          self.phongThuy(new PhongThuy(response.PhongThuy));
        }
      },
      error: function (xhr, error) {

      },
      complete: function () {
        NProgress.done();
      },

    });
  }

  self.productModel = ko.observable(new ProductModel(data));
}

var ProductModel = function (parent) {
  var self = this;
  self.Kieudays = ko.observableArray(parent.Product.category.kieudays || []);
  self.SizeVongs = ko.observableArray(parent.Product.category.sizevongs ? parent.Product.category.sizevongs.split(",") : []);
  self.SizeHats = ko.observableArray(parent.Product.category.size_hats || []);

  self.Id = ko.observable(parent.Product.id || null);
  self.Name = ko.observable(parent.Product.name || null);
  self.Description = ko.observable(parent.Product.description || null);
  self.KieudayName = ko.observable(parent.Product.category.kieuday_name || null);
  self.SizeVongName = ko.observable(parent.Product.category.sizevong_name || null);
  self.SizeHatName = ko.observable(parent.Product.category.size_hat_name || null);
  self.IsCustom = ko.observable(parent.Product.category.is_custom == 1 ? true : false || false);
  self.Price = ko.observable(parent.Product.price || 0);
  self.Alias = ko.observable(parent.Product.alias || '');

  self.KieudayId = ko.observable(null);
  self.SizeHatId = ko.observable(null);
  self.SizeVongId = ko.observable(null);

  self.SelectedSizeHat = ko.observable(null);
  self.SelectedKieuday = ko.observable(null);

  self.SizeHatId.subscribe(function (value) {
    if (value) {
      self.SelectedSizeHat(self.SizeHats().filter(function (item) {
        return item.id == value;
      })[0]);
      if (self.SelectedSizeHat()) {
        var newPrice = parseFloat(self.SelectedSizeHat().value) * parseInt(parent.Product.price);
        if (self.SelectedKieuday()) {
          newPrice = parseFloat(self.SelectedKieuday().value) + newPrice;
        }
        self.Price(newPrice);
      }
    }
  });

  self.KieudayId.subscribe(function (value) {
    if (value) {
      self.SelectedKieuday(self.Kieudays().filter(function (item) {
        return item.id == value;
      })[0]);
      if (self.SelectedKieuday()) {
        var newPrice = parseFloat(self.SelectedKieuday().value) + parseInt(parent.Product.price);
        if (self.SelectedSizeHat()) {
          newPrice = parseFloat(self.SelectedSizeHat().value) * newPrice;
        }
        self.Price(newPrice);
      }
    }
  });

  self.Image = ko.observable(getFirstImage(parent.Product.images));

  function getFirstImage(stringPath) {
    var result = "";
    if (stringPath) {
      var splittedArray = stringPath.split(",");
      if (splittedArray.length > 0)
        result = splittedArray[0];
    }
    return result;
  };

  self.addToCart = function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });
    $.ajax({
      url: parent.API_URLs.AddToCart,
      type: "POST",
      data: {
        id: self.Id(),
        name: self.Name(),
        price: self.Price(),
        image: self.Image(),
        sizehat: self.SelectedSizeHat() ? self.SelectedSizeHat().name : '',
        sizevong: self.SizeVongId(),
        kieuday: self.SelectedKieuday() ? self.SelectedKieuday().name : '',
        is_custom: 0,
        alias: self.Alias()
      },
      beforeSend: function () {
        NProgress.start();
      },
      success: function (response) {
        alertify.success('<i class="fa fa-bell" aria-hidden="true"></i><strong> Đã thêm sản phẩm "' + self.Name() + '" vào giỏ hàng</strong>');
      },
      error: function (xhr, error) { },
      complete: function () {
        NProgress.done();
      },

    });
  };

  self.Pieces = ko.observableArray([]);

  self.CustomSizeHatId = ko.observable(null);
  self.CustomSizeHatObject = ko.observable(null);
  self.CustomSizeHatId.subscribe(function (value) {
    if (value) {
      var selectedItem = self.SizeHats().filter(function (item) {
        return item.id == value;
      })[0];
      if (selectedItem) {
        self.CustomSizeHatObject(selectedItem);
      } else
        self.CustomSizeHatObject();
    }
  });

  self.CustomKieudayId = ko.observable(null);
  self.CustomKieudayObject = ko.observable(null);
  self.CustomKieudayId.subscribe(function (value) {
    if (value) {
      var newPrice = 0;
      self.CustomKieudayObject(self.Kieudays().filter(function (item) {
        return item.id == value;
      })[0]);
      if (self.CustomKieudayObject()) {
        var pieces = self.Pieces();
        for (var i = 0; i < pieces.length; i++) {
          newPrice = newPrice + (parseInt(pieces[i].itemPrice) * pieces[i].itemSizeValue);
        }
      }
      newPrice = newPrice + parseInt(self.CustomKieudayObject().value);
    }
    self.CustomPrice(newPrice);
  });
  self.CustomCharmId = ko.observable(null);
  self.CustomSizeVongId = ko.observable(null);
  self.CustomName = ko.observable(parent.User ? 'Thiết kế bởi ' + parent.User.name : 'Đặt tên cho sản phẩm của bạn');

  //new feature
  self.SeletedPiece = ko.observable(null);
  self.SeletedPieceSizeId = ko.observable(null);

  self.SeletedCharm = ko.observable(null);

  self.IsVisibleAllPieces = ko.observable(false);
  self.IsVisibleAllCharms = ko.observable(false);

  self.ShowAllPieces = function () {
    self.IsVisibleAllPieces(!self.IsVisibleAllPieces());
    self.IsVisibleAllCharms(false);
  }

  self.SelectPiece = function (obj) {
    self.IsVisibleAllPieces(false);
    self.SeletedPiece(obj);
  }

  self.SelectCharm = function (obj) {
    self.IsVisibleAllCharms(false);
    self.SeletedCharm(obj);
  }

  self.ShowAllCharms = function () {
    self.IsVisibleAllPieces(false);
    self.IsVisibleAllCharms(!self.IsVisibleAllCharms());
  }

  self.CustomPrice = ko.observable(0);

  self.ViewDetailFromSelectedItem = function (obj) {
    if (obj) {
      if (obj.itemSize !== -1) {
        self.SeletedPiece(obj.fullItem);
        self.CustomSizeHatId(obj.itemSize);
      } else {
        self.SeletedCharm(obj.fullItem);
      }
    }
  };

  self.AddPiece = function () {
    if (self.SeletedPiece()) {
      if (self.Pieces().length >= 30) {
        alertify.warning('<i class="fa fa-bell" aria-hidden="true" style="color: white;"></i> <strong style="color: white;">Không được vượt quá 30 hạt</strong>');
        return;
      } else {
        var newItem = {
          id: new Date().getTime(),
          itemImage: self.SeletedPiece().image,
          itemName: self.SeletedPiece().name,
          itemId: self.SeletedPiece().id,
          itemPrice: self.SeletedPiece().price,
          itemSize: self.CustomSizeHatObject() ? self.CustomSizeHatObject().name : '',
          itemSizeValue: self.CustomSizeHatObject() ? self.CustomSizeHatObject().value : 1,
          fullItem: self.SeletedPiece()
        };

        self.Pieces.push(newItem);
        var price = self.CustomPrice() + (self.CustomSizeHatObject().value * parseInt(self.SeletedPiece().price));

        self.CustomPrice(price);
      }
    }
  };

  self.AddCharm = function () {
    if (self.SeletedCharm()) {
      var newItem = {
        id: new Date().getTime(),
        itemImage: self.SeletedCharm().image,
        itemName: self.SeletedCharm().name,
        itemId: self.SeletedCharm().id,
        itemPrice: self.SeletedCharm().price,
        itemSize: -1,
        itemSizeValue: 1,
        fullItem: self.SeletedCharm()
      };

      self.Pieces.push(newItem);
      var price = self.CustomPrice() + parseInt(self.SeletedCharm().price);
      self.CustomPrice(price);
    }
  };

  self.RemoveItem = function (obj) {
    self.Pieces.remove(obj);
    var price = self.CustomPrice() - parseInt(obj.itemPrice);
    self.CustomPrice(price);
  };

  self.AddCustomProductToCart = function () {
    if (self.Pieces().length == 0 || !self.CustomName()) {
      alertify.warning('<i class="fa fa-bell" aria-hidden="true" style="color: white;"></i> <strong style="color: white;">Chưa có hạt hoặc bạn chưa nhập tên sản phẩm của bạn</strong>');
      return;
    }

    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });
    $.ajax({
      url: parent.API_URLs.AddToCart,
      type: "POST",
      data: {
        name: self.CustomName(),
        price: self.CustomPrice(),
        charm: self.CustomCharmId(),
        kieuday: self.CustomKieudayObject().name,
        categoryIsCustom: 1,
        details: self.Pieces(),
        sizevong: self.CustomSizeVongId()
      },
      beforeSend: function () {
        NProgress.start();
      },
      success: function (response) {
        alertify.success('<i class="fa fa-bell" aria-hidden="true"></i><strong> Đã thêm sản phẩm "' + self.CustomName() + '" vào giỏ hàng</strong>');
      },
      error: function (xhr, error) { },
      complete: function () {
        NProgress.done();
      },

    });
  };
}

var PhongThuy = function (option) {
  self.Menh = ko.observable(option ? option.phong_thuy.menh : null);
  self.TuongSinh = ko.observable(option ? option.phong_thuy.tuong_sinh : null);
  self.HoaHop = ko.observable(option ? option.phong_thuy.hoa_hop : null);
  self.CheKhac = ko.observable(option ? option.phong_thuy.che_khac : null);
  self.BiKhac = ko.observable(option ? option.phong_thuy.bi_khac : null);
}
