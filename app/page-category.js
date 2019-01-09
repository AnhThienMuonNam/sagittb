var CategoryViewModel = function(data) {
    self.products = ko.observableArray(data.Products || []);
    self.optionSorts= ko.observableArray([  { id:1, name:'Tên từ A - Z' },
                                            { id:2, name:'Tên từ Z - A' },
                                            { id:3, name:'Giá giảm dần' },
                                            { id:4, name:'Giá tăng dần' }
                                        ]);
    self.optionSortId = ko.observable(1);

    self.category= ko.observable(data.Category || []);



    self.ImagePath = ko.observable(data.API_URLs.ImagePath || null);
    self.PublicPath = ko.observable(data.API_URLs.PublicPath || null);


    self.CurrentPage = ko.observable(1);
    self.getFirstImage = function(stringPath){
        var result="";
        if(stringPath){
             var splittedArray = stringPath.split(",");
             if(splittedArray.length>0)
                result=splittedArray[0];
        }
        return result ? result : stringPath;
    };


    function getIdsFromObjectArray(array){
        var result = [];
        if(array){
            for(var i=0; i<array.length; i++){
                result.push(array[i].id);
            }
        }
        return result;
    };








    self.formatMoney = function(number) {
        var val=parseInt(number);
        return val.toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        }) + "(đ)" ;
    };

    self.seeMoreProducts = function(){
        $.ajaxSetup({ headers: {'X-CSRF-Token': $('#_token').val()} });
        $.ajax({
            url: data.API_URLs.SeeMoreProducts,
            beforeSend: function(){
                NProgress.start();
            },
            type: "POST",
            data: {
                    categoryId: self.category().id,
                    currentPage : self.CurrentPage(),
                    optionSortId: self.optionSortId()
                    },
            success: function(response){
                if(response.MoreProducts.length == 0){
                    alertify.warning('<strong>Đã hiển thị toàn bộ sản phẩm</strong>');
                }
                 self.products(self.products().concat(response.MoreProducts));
                 self.CurrentPage(self.CurrentPage()+1);
            },
            error: function(xhr, error){

            },
            complete: function(){
                 NProgress.done();
           },
        });
    };

}
