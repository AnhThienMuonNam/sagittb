var WishListViewModel = function (data) {
    self.products = ko.observableArray(data.Products || []);
    self.optionSorts = ko.observableArray([{ id: 1, name: 'Tên từ A - Z' },
    { id: 2, name: 'Giá tăng dần' },
    { id: 3, name: 'Giá giảm dần' }
    ]);
    self.optionSortId = ko.observable(1);

    self.Categories = ko.observableArray(data.Categories || []);

    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);


    self.getFirstImage = function (stringPath) {
        var result = "";
        if (stringPath) {
            var splittedArray = stringPath.split(",");
            if (splittedArray.length > 0)
                result = splittedArray[0];
        }
        return result ? result : stringPath;
    };
    self.listCategories = ko.observableArray(getIdsFromObjectArray(data.Categories) || []);

    function getIdsFromObjectArray(array) {
        var result = [];
        if (array) {
            for (var i = 0; i < array.length; i++) {
                result.push(array[i].id);
            }
        }
        return result;
    };

    self.filterCategories = function (obj) {
        var idCB = '#checkboxCategory-' + obj.id;
        if (!$(idCB).is(':checked')) {
            self.listCategories.remove(obj.id);
        } else {
            self.listCategories.push(obj.id);
        }
        getProductsFromFilters();
    };



    function getProductsFromFilters() {
        $.ajaxSetup({ headers: { 'X-CSRF-Token': $('#_token').val() } });
        $.ajax({
            url: data.API_URLs.FilterWishList,
            beforeSend: function () {
                // NProgress.start();
            },
            type: "POST",
            data: { listCategories: self.listCategories() },
            success: function (response) {
                if (response) {
                    self.products(response.Products);
                }

            },
            error: function (xhr, error) {

            },
            complete: function () {
                // NProgress.done();
            },
        });
    };

    self.formatMoney = function (number) {
        var val = parseInt(number);
        return val.toFixed(0).replace(/./g, function (c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        }) + "(đ)";
    };



}




