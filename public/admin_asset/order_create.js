var FormViewModel = function(data) {
    var self = this;
    self.NotifyErrors = ko.observable(null);
    self.Products = ko.observable(data.Products);
    self.EstimatedDeliveries = ko.observableArray(data.EstimatedDeliveries || []);
    self.OrderStatues = ko.observableArray(data.OrderStatues || []);
    self.PaymentMethods = ko.observableArray(data.PaymentMethods || []);
    self.Users = ko.observableArray(data.Users || []);
    self.Cities = ko.observableArray(data.Cities || []);

    self.orderModel = new OrderModel(self, data);

    self.saveOrder = function() {
        self.NotifyErrors('');
        self.showErrorValidations();
        if (self.hasErrors()) return;

        let model = self.orderModel.toJSON();

        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('#_token').val() }
        });
        $.ajax({
            url: data.API_URLs.CreateOrder,
            beforeSend: function() {
                NProgress.start();
            },
            type: "POST",
            data: model,
            success: function(data) {
                if (data.IsSuccess == true) {
                    alertify.success('Thêm thành công');
                    location.reload();
                }
            },
            error: function(xhr, error) {
                let responseJSON = xhr.responseJSON;
                let commaKey = '';
                for (var key in responseJSON) {
                    if (responseJSON.hasOwnProperty(key)) {
                        self.NotifyErrors(self.NotifyErrors() + commaKey + responseJSON[key][0]);
                        commaKey = ', ';
                    }
                }
            },
            complete: function() {
                NProgress.done();
            },
        });
    };

    self.hasErrors = ko.observable(false);
    self.showErrorValidations = function() {
        var errors = ko.validation.group(self);
        if (errors().length > 0) {
            errors.showAllMessages(true);
            self.hasErrors(true);
        } else {
            self.hasErrors(false);
        }
    };

    self.formatMoney = function(number) {
        var val = parseInt(number);
        return val.toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        }) + "(đ)";
    };
}

var OrderModel = function(parent, viewData) {
    var self = this;
    self.customer_id = ko.observable(viewData.UserId || 0);
    self.customer_name = ko.observable('');
    self.customer_email = ko.observable('');

    self.customer_city = ko.observable('');
    self.customer_city_id = ko.observable('');

    self.customer_district = ko.observable('');
    self.customer_address = ko.observable('');

    self.customer_phone = ko.observable(0);
    self.customer_note = ko.observable('');

    self.estimated_delivery_id = ko.observable();
    self.order_status_id = ko.observable(0);
    self.payment_method_id = ko.observable(0);
    self.is_paid = ko.observable(0);

    self.orderDetails = ko.observableArray([]);

    self.customer_id.subscribe(function(value) {
        if (value) {
            let user = viewData.Users.find(x => x.id === value);
            if (user) {
                self.customer_name(user.name);
                self.customer_email(user.email);
                self.customer_phone(user.phone);
                self.customer_city_id(user.city_id);
                self.customer_district(user.district ? user.district : '');
                self.customer_address(user.address ? user.address : '');
            }
        } else {
            self.customer_name('');
            self.customer_email('');
            self.customer_phone(0);
            self.customer_city_id('');
            self.customer_district('');
            self.customer_address('');
        }
    });

    self.customer_city_id.subscribe(function(value) {
        if (value) {
            let city = viewData.Cities.find(x => x.id === value);
            if (city) {
                self.customer_city = ko.observable(city.name);
            }
        } else {
            self.customer_city = ko.observable('');
        }
    });

    OrderModel.prototype.toJSON = function() {
        return {
            customer_id: ko.utils.unwrapObservable(this.customer_id),
            customer_name: ko.utils.unwrapObservable(this.customer_name),
            customer_email: ko.utils.unwrapObservable(this.customer_email),
            customer_city: ko.utils.unwrapObservable(this.customer_city),
            customer_city_id: ko.utils.unwrapObservable(this.customer_city_id),

            customer_district: ko.utils.unwrapObservable(this.customer_district),
            customer_address: ko.utils.unwrapObservable(this.customer_address),
            customer_phone: ko.utils.unwrapObservable(this.customer_phone),
            customer_note: ko.utils.unwrapObservable(this.customer_note),

            estimated_delivery_id: ko.utils.unwrapObservable(this.estimated_delivery_id),
            order_status_id: ko.utils.unwrapObservable(this.order_status_id),
            payment_method_id: ko.utils.unwrapObservable(this.payment_method_id),

            is_paid: ko.utils.unwrapObservable(this.is_paid() == true ? 1 : 0),

            order_details: ko.toJS(this.orderDetails)
        };
    };

    self.addOrderDetail = function() {
        let newOrderDetail = new OrderDetailModel(self, viewData);

        self.orderDetails.push(newOrderDetail);
    };

    self.removeOrderDetail = function(item) {
        self.orderDetails.remove(item);
    };
}

var OrderDetailModel = function(parent, viewData) {
    var self = this;
    self.product_id = ko.observable('');
    self.product_name = ko.observable('');
    self.product_price = ko.observable('');
    self.product_quanlity = ko.observable(1);
    self.product_image = ko.observable(1);
    self.product_alias = ko.observable(1);
    self.category_id = ko.observable('');
    self.category_name = ko.observable('');

    self.product_note = ko.observable('');

    self.product_id.subscribe(function(value) {
        if (value) {
            let product = viewData.Products.find(x => x.id === value);
            if (product) {
                self.product_name(product.name);
                self.product_price(product.price);
                self.product_image(product.images);
                self.product_alias(product.alias);
                self.category_id(product.category_id);
                self.category_name(product.category.name);
            }
        }
    });
}