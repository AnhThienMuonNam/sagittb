var IndexViewModel = function (data) {
    self.HotProducts = ko.observableArray([]);
    self.ObjIns = ko.observableArray([]);
    self.NewestBlogs = ko.observableArray([]);
    self.IsShowLoading = ko.observable(true);
    self.IsShowInstagramLoading = ko.observable(true);

    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);

    self.formatMoney = function (number) {
        var val = parseInt(number);
        return val.toFixed(0).replace(/./g, function (c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        }) + "(đ)";
    };
    self.getFirstImage = function (stringPath) {
        var result = "";
        if (stringPath) {
            var splittedArray = stringPath.split(",");
            if (splittedArray.length > 0)
                result = splittedArray[0];
        }
        return result ? result : stringPath;
    };

    function getProductsIndex() {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('#_token').val() }
        });
        $.ajax({
            url: data.API_URLs.GetProductsIndex,
            type: "POST",
            data: {},
            success: function (response) {
                self.IsShowLoading(false);
                self.HotProducts(response.HotProducts);
                self.NewestBlogs(response.NewestBlogs);
            },
            error: function (xhr, error) {

            }
        });
    };

    function getInstagram() {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('#_token').val() }
        });
        $.ajax({
            url: data.API_URLs.GetInstagram,
            type: "POST",
            data: {},
            success: function (response) {
                self.IsShowInstagramLoading(false);
                if (response.ObjIns && response.ObjIns.length > 0) {
                    let result = response.ObjIns.slice(0, 8);
                    self.ObjIns(result);
                }
            },
            error: function (xhr, error) {
                self.IsShowInstagramLoading(false);
            },
        });
    };

    function init() {
        getProductsIndex();
        getInstagram();
    }

    init();
}
