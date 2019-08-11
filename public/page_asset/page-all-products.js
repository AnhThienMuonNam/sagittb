var AllProductViewModel = function (data) {
    self.Flowers = ko.observableArray(data.Flowers || []);
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);
    self.IsShowSeeMoreButton = ko.observable(true);
    self.addToCart = function (obj) {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('#_token').val() }
        });
        $.ajax({
            url: data.API_URLs.AddToCart,
            type: "POST",
            data: { Id: obj.Id },
            beforeSend: function () {
                NProgress.start();
            },
            success: function (response) {
                alertify.success('<i class="fa fa-bell" aria-hidden="true"></i><strong> Đã thêm sản phẩm "' + obj.Name + '" vào giỏ hàng</strong>');
            },
            error: function (xhr, error) {

            },
            complete: function () {
                NProgress.done();
            },
        });
    };
    self.CurrentPage = ko.observable(1);
    self.getFirstImage = function (stringPath) {
        var result = "";
        if (stringPath) {
            var splittedArray = stringPath.split(",");
            if (splittedArray.length > 0)
                result = splittedArray[0];
        }
        return result ? result : stringPath;
    };


    self.formatMoney = function (number) {
        var val = parseInt(number);
        return val.toFixed(0).replace(/./g, function (c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        }) + "đ";
    };

    self.seeMore = function () {
        var sKeyword = getParameterByName('keyword');
        var sTag = getParameterByName('tag');
        $.ajaxSetup({ headers: { 'X-CSRF-Token': $('#_token').val() } });
        $.ajax({
            url: data.API_URLs.SeeMore,
            beforeSend: function () {
                NProgress.start();
            },
            type: "POST",
            data: {
                sKeyword: sKeyword,
                sTag: sTag,
                CurrentPage: self.CurrentPage()
            },
            success: function (response) {
                if (response.flowers.length == 0) {
                    alertify.success('Đã hết sản phẩm');
                    self.IsShowSeeMoreButton(false);
                }
                self.Flowers(self.Flowers().concat(response.flowers));
                self.CurrentPage(self.CurrentPage() + 1);
            },
            error: function (xhr, error) {

            },
            complete: function () {
                NProgress.done();
            },
        });
    };

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
}




