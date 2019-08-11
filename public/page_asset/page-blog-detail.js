function FormViewModel(data) {
    var self = this;
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);

    self.Blog = ko.observable(data.Blog || null)
    self.PopularPosts = ko.observableArray(data.PopularPosts || [])

    self.showContent = function (text) {
        if (text) {
            return unescape(text);
        }
        return '';
    }
}
