function FormViewModel(data) {
  var self = this;
  self.name = ko.observable('');
  self.gender = ko.observable('');
  self.isLunar = ko.observable('');
  self.day = ko.observable('');
  self.month = ko.observable('');
  self.year = ko.observable('');
  self.gio = ko.observable('');
  self.phut = ko.observable('');
  self.fixhour = ko.observable('');
  self.year_xem = ko.observable('2019');

  self.tatAch = ko.observable('(Trống)');
  self.sucKhoe = ko.observable('(Trống)');
  self.thanVuong_dungThan = ko.observable('(Thân vượng & Dụng thần)');

  self.search = function (obj) {
    $.ajaxSetup({
      headers: { 'X-CSRF-Token': $('#_token').val() }
    });
    $.ajax({
      url: data.API_URLs.GetAdvisory,
      beforeSend: function () {
        NProgress.start();
      },
      type: "POST",
      data: {
        name: encodeURI(self.name()),
        isLunar: self.isLunar(),
        day: self.day(),
        month: self.month(),
        year: self.year(),
        gio: self.gio(),
        phut: self.phut(),
        fixhour: self.fixhour(),
        gender: self.gender(),
        year_xem: self.year_xem()
      },
      success: function (response) {
        var data = response;
        self.tatAch(data.tatAch);
        self.sucKhoe(data.sucKhoe);
        self.thanVuong_dungThan(data.thanVuong_dungThan);
      },
      error: function (xhr, error) {
      },
      complete: function () {
        NProgress.done();
      },
    });
  };

  self.copy = function () {

  }
}
