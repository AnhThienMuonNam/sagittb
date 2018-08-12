var HomeViewModel = function(data) {
    self.Categories = ko.observableArray(data.Categories || []);
    self.TotalPriceIndex = ko.observable(null);
    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);

    self.getFirstImage = function(stringPath){
        var result="";
        if(stringPath){
             var splittedArray = stringPath.split(",");
             if(splittedArray.length>0)
                result=splittedArray[0];
        }
        return result ? result : stringPath;
    };

     self.formatMoney = function(number) {
        var val=parseInt(number);
        return val.toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        }) + "đ" ;
    };
}


