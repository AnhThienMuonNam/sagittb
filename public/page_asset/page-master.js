var MasterViewModel = function(data) {
  var self = this;
  self.FilterProduct_master = ko.observable(data.API_URLs.FilterProduct_master || null);

  self.userEmail_master = ko.observable(null);
  self.userPassword_master = ko.observable(null);
  self.NotifyErrors_master = ko.observableArray([]);

  var hoursRange = [{
      id: 0,
      value: 'Từ 00:00 - 01:00'
    },
    {
      id: 1,
      value: 'Từ 01:00 - 03:00'
    },
    {
      id: 2,
      value: 'Từ 03:00 - 05:00'
    },
    {
      id: 3,
      value: 'Từ 05:00 - 07:00'
    },
    {
      id: 4,
      value: 'Từ 07:00 - 09:00'
    },
    {
      id: 5,
      value: 'Từ 09:00 - 11:00'
    },
    {
      id: 6,
      value: 'Từ 11:00 - 13:00'
    },
    {
      id: 7,
      value: 'Từ 13:00 - 15:00'
    },
    {
      id: 8,
      value: 'Từ 15:00 - 17:00'
    },
    {
      id: 9,
      value: 'Từ 17:00 - 19:00'
    },
    {
      id: 10,
      value: 'Từ 19:00 - 21:00'
    },
    {
      id: 11,
      value: 'Từ 21:00 - 23:00'
    },
    {
      id: -1,
      value: 'Từ 23:00 - 00:00'
    },
  ];

  var cungPhi = [
    {
      nam: {
              so: 7,
              cung: 'Đoài',
              menh: 'Kim',
              huong: 'Tây'
            },
      nu: {
            so: 8,
            cung: 'Cân',
            menh: 'Thổ',
            huong: 'Đông Bắc'
          }
    },
    {
      nam: {
              so: 6,
              cung: 'Càn',
              menh: 'Kim',
              huong: 'Tây Bắc'
            },
      nu: {
            so: 9,
            cung: 'Ly',
            menh: 'Hoả',
            huong: 'Nam'
          }
    },
    {
      nam: {
              so: 5,
              cung: 'Khôn',
              menh: 'Thổ',
              huong: 'Tây Nam'
            },
      nu: {
            so: 1,
            cung: 'Khảm',
            menh: 'Thuỷ',
            huong: 'Bắc'
          }
    },
    {
      nam: {
            so: 4,
            cung: 'Tôn',
            menh: 'Mộc',
            huong: 'Đông Nam'
          },
    nu: {
          so: 2,
          cung: 'Khôn',
          menh: 'Thổ',
          huong: 'Tây Nam'
        }
    },
    {
      nam: {
            so: 3,
            cung: 'Chân',
            menh: 'Mộc',
            huong: 'Đông'
          },
    nu: {
          so: 3,
          cung: 'Chân',
          menh: 'Mộc',
          huong: 'Đông'
        }
    },
    {
      nam: {
            so: 2,
            cung: 'Khôn',
            menh: 'Thổ',
            huong: 'Tây Nam'
          },
    nu: {
          so: 4,
          cung: 'Tôn',
          menh: 'Mộc',
          huong: 'Đông Nam'
        }
    },
    {
      nam: {
            so: 1,
            cung: 'Khảm',
            menh: 'Thuỷ',
            huong: 'Bắc'
          },
    nu: {
          so: 5,
          cung: 'Cân',
          menh: 'Thổ',
          huong: 'Đông Bắc'
        }
    },
    {
      nam: {
            so: 9,
            cung: 'Ly',
            menh: 'Hoả',
            huong: 'Nam'
          },
    nu: {
          so: 6,
          cung: 'Càn',
          menh: 'Kim',
          huong: 'Tây Bắc'
        }
    },
    {
      nam: {
            so: 8,
            cung: 'Cân',
            menh: 'Thổ',
            huong: 'Đông Bắc'
          },
    nu: {
          so: 7,
          cung: 'Đoài',
          menh: 'Kim',
          huong: 'Tây'
        }
    }
  ];

  self.HoursRange = ko.observableArray(hoursRange);

  self.login_master = function() {
    self.NotifyErrors_master.removeAll();
    if (!self.userEmail_master() || !self.userPassword_master()) {
      self.NotifyErrors_master.push('Bạn chưa nhập đủ thông tin bắt buộc*');
      return;
    }
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });
    $.ajax({
      url: data.API_URLs.Login_master,
      beforeSend: function() {
        NProgress.start();
      },
      type: "POST",
      data: {
        email: self.userEmail_master(),
        password: self.userPassword_master(),
      },
      success: function(response) {
        if (response.IsSuccess == true) {
          location.reload();
        } else if (response.IsSuccess == false) {
          self.NotifyErrors_master.push('Email hoặc mật khẩu không chính xác');
        }
      },
      error: function(xhr, error) {
        for (item in xhr.responseJSON) {
          self.NotifyErrors_master.push(xhr.responseJSON[item]);
        }
      },
      complete: function() {
        NProgress.done();
      },
    });
  };

  self.logout_master = function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });
    $.ajax({
      url: data.API_URLs.Logout_master,
      beforeSend: function() {
        NProgress.start();
      },
      type: "POST",
      success: function(response) {
        if (response) {
          location.reload();
        }
      },
      error: function(xhr, error) {},
      complete: function() {
        NProgress.done();
      },
    });
  };

  self.Email_master = ko.observable(null);
  self.Phone_master = ko.observable(null);
  self.Password_master = ko.observable(null);
  self.NotifyCreateUserErrors_master = ko.observableArray([]);
  self.NotifyCreateUserSuccess_master = ko.observable(null);

  self.createUser_master = function() {
    self.NotifyCreateUserErrors_master.removeAll();
    self.NotifyCreateUserSuccess_master('');
    if (!self.Email_master() || !self.Password_master()) {
      self.NotifyCreateUserErrors_master.push('Bạn chưa nhập đủ thông tin bắt buộc*');
      return;
    }

    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });
    $.ajax({
      url: data.API_URLs.CreateUser_master,
      beforeSend: function() {
        NProgress.start();
      },
      type: "POST",
      data: {
        Email: self.Email_master(),
        Phone: self.Phone_master(),
        Password: self.Password_master(),
      },
      success: function(response) {
        if (response.IsSuccess == true) {
          self.Email_master('');
          self.Phone_master('');
          self.Password_master('');
          self.NotifyCreateUserSuccess_master('Bạn đã đăng ký tài khoản thành công!');
        }
      },
      error: function(xhr, error) {
        for (item in xhr.responseJSON) {
          self.NotifyCreateUserErrors_master.push(xhr.responseJSON[item]);
        }
      },
      complete: function() {
        NProgress.done();
      },
    });
  };

  self.EmailResetPassword = ko.observable(null);
  self.NotifySendEmailResetPasswordError = ko.observable(null);
  self.NotifySendEmailResetPasswordSuccess = ko.observable(null);

  self.sendEmailResetPassword = function() {
    self.NotifySendEmailResetPasswordError('');
    self.NotifySendEmailResetPasswordSuccess('');
    if (!self.EmailResetPassword()) {
      self.NotifySendEmailResetPasswordError('Bạn chưa nhập email');
      return;
    }

    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });
    $.ajax({
      url: data.API_URLs.SendEmailResetPassword,
      beforeSend: function() {
        NProgress.start();
      },
      type: "POST",
      data: {
        Email: self.EmailResetPassword(),
      },
      success: function(response) {
        if (response.IsSuccess == true) {
          self.EmailResetPassword('');
          self.NotifySendEmailResetPasswordSuccess('Đã gửi mail khôi phục mật khẩu vào email của bạn');
        } else if (response.IsSuccess == false) {
          self.NotifySendEmailResetPasswordError('Email này chưa đăng ký tài khoản nào');
        }
      },
      error: function(xhr, error) {
        for (item in xhr.responseJSON) {
          // self.NotifyCreateUserErrors_master.push(xhr.responseJSON[item]);
        }
      },
      complete: function() {
        NProgress.done();
      },
    });
  };
  var TUAN = new Array("Ch\u1EE7 Nh\u1EADt", "Th\u1EE9 Hai", "Th\u1EE9 Ba", "Th\u1EE9 T\u01B0", "Th\u1EE9 N\u0103m", "Th\u1EE9 S\341u", "Th\u1EE9 B\u1EA3y");
  var THANG = new Array("Gi\u00EAng", "Hai", "Ba", "T\u01B0", "N\u0103m", "S\u00E1u", "B\u1EA3y", "T\u00E1m", "Ch\u00EDn", "M\u01B0\u1EDDi", "M\u1ED9t", "Ch\u1EA1p");
  var CAN = new Array("Gi\341p", "\u1EA4t", "B\355nh", "\u0110inh", "M\u1EADu", "K\u1EF7", "Canh", "T\342n", "Nh\342m", "Qu\375");
  var CHI = new Array("T\375", "S\u1EEDu", "D\u1EA7n", "M\343o", "Th\354n", "T\u1EF5", "Ng\u1ECD", "M\371i", "Th\342n", "D\u1EADu", "Tu\u1EA5t", "H\u1EE3i");
  var GIO_HD = new Array("110100101100", "001101001011", "110011010010", "101100110100", "001011001101", "010010110011");
  var TIETKHI = new Array("Xu\u00E2n ph\u00E2n", "Thanh minh", "C\u1ED1c v\u0169", "L\u1EADp h\u1EA1", "Ti\u1EC3u m\u00E3n", "Mang ch\u1EE7ng",
    "H\u1EA1 ch\u00ED", "Ti\u1EC3u th\u1EED", "\u0110\u1EA1i th\u1EED", "L\u1EADp thu", "X\u1EED th\u1EED", "B\u1EA1ch l\u1ED9",
    "Thu ph\u00E2n", "H\u00E0n l\u1ED9", "S\u01B0\u01A1ng gi\u00E1ng", "L\u1EADp \u0111\u00F4ng", "Ti\u1EC3u tuy\u1EBFt", "\u0110\u1EA1i tuy\u1EBFt",
    "\u0110\u00F4ng ch\u00ED", "Ti\u1EC3u h\u00E0n", "\u0110\u1EA1i h\u00E0n", "L\u1EADp xu\u00E2n", "V\u0169 Th\u1EE7y", "Kinh tr\u1EADp"
  );
  var lunarDay = 0;
  var lunarMonth = 0;
  var lunarYear = 0;
  var dayNumber = 0;
  var lunarYearCanId = 0;
  var lunarYearChiId = 0;

  function getYearCanChi(year) {
    lunarYearCanId = (year + 6) % 10;
    lunarYearChiId = (year + 8) % 12;
    return CAN[lunarYearCanId] + " " + CHI[lunarYearChiId];
  }

  function getMonthCanChi(yy, mm) {
    return CAN[(yy * 12 + mm + 3) % 10] + " " + CHI[(mm + 1) % 12];
  }

  function getDayCanChi(jd) {
    return CAN[(jd + 9) % 10] + " " + CHI[(jd + 1) % 12];
  }

  function getCanHour(jdn, targetHour) {
    var canIndexHour0 = (jdn - 1) * 2 % 10;
    var canIndex = canIndexHour0 + targetHour;
    if (canIndex > 9) {
      canIndex = canIndex - 10;
    }
    return CAN[canIndex];
  }

  self.Date_master = ko.observable();
  self.Hour_master = ko.observable();
  self.LunarYearTag_master = ko.observable('');

  self.changeSFromDate1 = function() {
    self.Date_master($('#sFromDate1_master').val());
  };

  self.changeSFromDate2 = function() {
    self.Date_master($('#sFromDate2_master').val());
  };

  function jdFromDate(dd, mm, yy) {
    var a, y, m, jd;
    a = INT((14 - mm) / 12);
    y = yy + 4800 - a;
    m = mm + 12 * a - 3;
    jd = dd + INT((153 * m + 2) / 5) + 365 * y + INT(y / 4) - INT(y / 100) + INT(y / 400) - 32045;
    if (jd < 2299161) {
      jd = dd + INT((153 * m + 2) / 5) + 365 * y + INT(y / 4) - 32083;
    }
    return jd;
  }

  function getNewMoonDay(k, timeZone) {

    var T, T2, T3, dr, Jd1, M, Mpr, F, C1, deltat, JdNew;
    T = k / 1236.85; // Time in Julian centuries from 1900 January 0.5
    T2 = T * T;
    T3 = T2 * T;
    dr = PI / 180;
    Jd1 = 2415020.75933 + 29.53058868 * k + 0.0001178 * T2 - 0.000000155 * T3;
    Jd1 = Jd1 + 0.00033 * Math.sin((166.56 + 132.87 * T - 0.009173 * T2) * dr); // Mean new moon
    M = 359.2242 + 29.10535608 * k - 0.0000333 * T2 - 0.00000347 * T3; // Sun's mean anomaly
    Mpr = 306.0253 + 385.81691806 * k + 0.0107306 * T2 + 0.00001236 * T3; // Moon's mean anomaly
    F = 21.2964 + 390.67050646 * k - 0.0016528 * T2 - 0.00000239 * T3; // Moon's argument of latitude
    C1 = (0.1734 - 0.000393 * T) * Math.sin(M * dr) + 0.0021 * Math.sin(2 * dr * M);
    C1 = C1 - 0.4068 * Math.sin(Mpr * dr) + 0.0161 * Math.sin(dr * 2 * Mpr);
    C1 = C1 - 0.0004 * Math.sin(dr * 3 * Mpr);
    C1 = C1 + 0.0104 * Math.sin(dr * 2 * F) - 0.0051 * Math.sin(dr * (M + Mpr));
    C1 = C1 - 0.0074 * Math.sin(dr * (M - Mpr)) + 0.0004 * Math.sin(dr * (2 * F + M));
    C1 = C1 - 0.0004 * Math.sin(dr * (2 * F - M)) - 0.0006 * Math.sin(dr * (2 * F + Mpr));
    C1 = C1 + 0.0010 * Math.sin(dr * (2 * F - Mpr)) + 0.0005 * Math.sin(dr * (2 * Mpr + M));
    if (T < -11) {
      deltat = 0.001 + 0.000839 * T + 0.0002261 * T2 - 0.00000845 * T3 - 0.000000081 * T * T3;
    } else {
      deltat = -0.000278 + 0.000265 * T + 0.000262 * T2;
    };
    JdNew = Jd1 + C1 - deltat;
    return INT(JdNew + 0.5 + timeZone / 24);
  }

  function getSunLongitude(jdn, timeZone) {

    var T, T2, dr, M, L0, DL, L;
    T = (jdn - 2451545.5 - timeZone / 24) / 36525; // Time in Julian centuries from 2000-01-01 12:00:00 GMT
    T2 = T * T;
    dr = PI / 180; // degree to radian
    M = 357.52910 + 35999.05030 * T - 0.0001559 * T2 - 0.00000048 * T * T2; // mean anomaly, degree
    L0 = 280.46645 + 36000.76983 * T + 0.0003032 * T2; // mean longitude, degree
    DL = (1.914600 - 0.004817 * T - 0.000014 * T2) * Math.sin(dr * M);
    DL = DL + (0.019993 - 0.000101 * T) * Math.sin(dr * 2 * M) + 0.000290 * Math.sin(dr * 3 * M);
    L = L0 + DL; // true longitude, degree
    L = L * dr;
    L = L - PI * 2 * (INT(L / (PI * 2))); // Normalize to (0, 2*PI)
    return INT(L / PI * 6);
  }

  function getLunarMonth11(yy, timeZone) {

    var k, off, nm, sunLong;
    off = jdFromDate(31, 12, yy) - 2415021;
    k = INT(off / 29.530588853);
    nm = getNewMoonDay(k, timeZone);
    sunLong = getSunLongitude(nm, timeZone); // sun longitude at local midnight
    if (sunLong >= 9) {
      nm = getNewMoonDay(k - 1, timeZone);
    }
    return nm;
  }

  function getLeapMonthOffset(a11, timeZone) {

    var k, last, arc, i;
    k = INT((a11 - 2415021.076998695) / 29.530588853 + 0.5);
    last = 0;
    i = 1; // We start with the month following lunar month 11
    arc = getSunLongitude(getNewMoonDay(k + i, timeZone), timeZone);
    do {
      last = arc;
      i++;
      arc = getSunLongitude(getNewMoonDay(k + i, timeZone), timeZone);
    } while (arc != last && i < 14);
    return i - 1;
  }

  var PI = Math.PI;

  function INT(d) {
    return Math.floor(d);
  }

  function convertSolar2Lunar(dd, mm, yy, timeZone) {

    var k, monthStart, a11, b11, lunarLeap;
    dayNumber = jdFromDate(dd, mm, yy);
    k = INT((dayNumber - 2415021.076998695) / 29.530588853);
    monthStart = getNewMoonDay(k + 1, timeZone);
    if (monthStart > dayNumber) {
      monthStart = getNewMoonDay(k, timeZone);
    }
    a11 = getLunarMonth11(yy, timeZone);
    b11 = a11;
    if (a11 >= monthStart) {
      lunarYear = yy;
      a11 = getLunarMonth11(yy - 1, timeZone);
    } else {
      lunarYear = yy + 1;
      b11 = getLunarMonth11(yy + 1, timeZone);
    }
    lunarDay = dayNumber - monthStart + 1;
    diff = INT((monthStart - a11) / 29);
    lunarLeap = 0;
    lunarMonth = diff + 11;
    if (b11 - a11 > 365) {
      leapMonthDiff = getLeapMonthOffset(a11, timeZone);
      if (diff >= leapMonthDiff) {
        lunarMonth = diff + 10;
        if (diff == leapMonthDiff) {
          lunarLeap = 1;
        }
      }
    }
    if (lunarMonth > 12) {
      lunarMonth = lunarMonth - 12;
    }
    if (lunarMonth >= 11 && diff < 4) {
      lunarYear -= 1;
    }
  }

  var namcanchi = [
    {
      chi: [{
          id: 0,
          tag: "kim"
        },
        {
          id: 11,
          tag: "hoa"
        },
        {
          id: 8,
          tag: "thuy"
        },
        {
          id: 6,
          tag: "kim"
        },
        {
          id: 4,
          tag: "hoa"
        },
        {
          id: 5,
          tag: "thuy"
        }
      ]
    },
    {
      chi: [{
          id: 1,
          tag: "kim"
        },
        {
          id: 11,
          tag: "hoa"
        },
        {
          id: 9,
          tag: "thuy"
        },
        {
          id: 7,
          tag: "kim"
        },
        {
          id: 5,
          tag: "hoa"
        },
        {
          id: 3,
          tag: "thuy"
        }
      ]
    },
    {
      chi: [{
          id: 2,
          tag: "hoa"
        },
        {
          id: 0,
          tag: "thuy"
        },
        {
          id: 10,
          tag: "tho"
        },
        {
          id: 8,
          tag: "hoa"
        },
        {
          id: 6,
          tag: "thuy"
        },
        {
          id: 4,
          tag: "tho"
        }
      ]
    },
    {
      chi: [{
          id: 3,
          tag: "hoa"
        },
        {
          id: 1,
          tag: "thuy"
        },
        {
          id: 11,
          tag: "tho"
        },
        {
          id: 9,
          tag: "hoa"
        },
        {
          id: 7,
          tag: "thuy"
        },
        {
          id: 5,
          tag: "tho"
        }
      ]
    },
    {
      chi: [{
          id: 4,
          tag: "moc"
        },
        {
          id: 2,
          tag: "tho"
        },
        {
          id: 0,
          tag: "hoa"
        },
        {
          id: 10,
          tag: "moc"
        },
        {
          id: 8,
          tag: "tho"
        },
        {
          id: 6,
          tag: "hoa"
        }
      ]
    },
    {
      chi: [{
          id: 5,
          tag: "moc"
        },
        {
          id: 3,
          tag: "tho"
        },
        {
          id: 1,
          tag: "hoa"
        },
        {
          id: 11,
          tag: "moc"
        },
        {
          id: 9,
          tag: "tho"
        },
        {
          id: 7,
          tag: "hoa"
        }
      ]
    },
    {
      chi: [{
          id: 8,
          tag: "moc"
        },
        {
          id: 6,
          tag: "tho"
        },
        {
          id: 4,
          tag: "kim"
        },
        {
          id: 2,
          tag: "moc"
        },
        {
          id: 0,
          tag: "tho"
        },
        {
          id: 10,
          tag: "kim"
        }
      ]
    },
    {
      chi: [{
          id: 9,
          tag: "moc"
        },
        {
          id: 7,
          tag: "tho"
        },
        {
          id: 5,
          tag: "kim"
        },
        {
          id: 3,
          tag: "moc"
        },
        {
          id: 1,
          tag: "tho"
        },
        {
          id: 11,
          tag: "kim"
        }
      ]
    },
    {
      chi: [{
          id: 10,
          tag: "thuy"
        },
        {
          id: 8,
          tag: "kim"
        },
        {
          id: 6,
          tag: "moc"
        },
        {
          id: 4,
          tag: "thuy"
        },
        {
          id: 2,
          tag: "kim"
        },
        {
          id: 0,
          tag: "moc"
        }
      ]
    },
    {
      chi: [{
          id: 11,
          tag: "thuy"
        },
        {
          id: 9,
          tag: "kim"
        },
        {
          id: 7,
          tag: "moc"
        },
        {
          id: 5,
          tag: "thuy"
        },
        {
          id: 3,
          tag: "kim"
        },
        {
          id: 1,
          tag: "moc"
        }
      ]
    },
  ];

  self.HourCanchi_master = ko.observable();
  self.DayCanchi_master = ko.observable();
  self.MonthCanchi_master = ko.observable();
  self.YearCanchi_master = ko.observable();
  self.CungphiNam_master = ko.observable();
  self.CungphiNu_master = ko.observable();

  self.IsShowMoreButton = ko.observable(false);

  self.calculateCanchi = function() {
    var selectedDate = new Date(self.Date_master());
    if (selectedDate) {
      var hour_master_tmp = self.Hour_master();
      if (hour_master_tmp === -1) {
        selectedDate.setDate(selectedDate.getDate() + 1);
        hour_master_tmp = 0;
      }
      var year = selectedDate.getFullYear();
      var month = selectedDate.getMonth() + 1;
      var day = selectedDate.getDate();
      convertSolar2Lunar(day, month, year, 7);
      var yearCanchi = getYearCanChi(lunarYear);
      var monthCanchi = getMonthCanChi(lunarYear, lunarMonth);
      var dayCanchi = getDayCanChi(dayNumber);
      var hourCanchi = hour_master_tmp !== undefined ? getCanHour(dayNumber, hour_master_tmp) + ' ' + CHI[hour_master_tmp] : "";

      self.HourCanchi_master(hourCanchi);
      self.DayCanchi_master(dayCanchi);
      self.MonthCanchi_master(monthCanchi);
      self.YearCanchi_master(yearCanchi);

      var yourCungphi = calculateCungphi(lunarYear);
      self.CungphiNam_master('Cung ' + yourCungphi.nam.cung + ', Mệnh ' + yourCungphi.nam.menh +', Hướng ' + yourCungphi.nam.huong);
      self.CungphiNu_master('Cung '+yourCungphi.nu.cung +', Mệnh '+yourCungphi.nu.menh+', Hướng '+yourCungphi.nu.huong);

      self.IsShowMoreButton(true);
      getLunarYearTag();
      var tra_cuu = 'Giờ: ' + hoursRange[self.Hour_master()].value + ', Ngày ' + selectedDate.getDate()+' - Tháng '+selectedDate.getMonth() + ' - Năm '+selectedDate.getFullYear();
      var ket_qua = 'Giờ: ' + self.HourCanchi_master()+', Ngày '+self.DayCanchi_master()+ ' - Tháng '+self.MonthCanchi_master()+' - Năm '+self.YearCanchi_master()+'. Cung phi đối với nam: '+self.CungphiNam_master()+', Cung phi đối với nữ: '+self.CungphiNu_master();
      saveLichSuTraCuu(tra_cuu,ket_qua);
    }
  };

  var saveLichSuTraCuu = function(tra_cuu, ket_qua){
    if (data.CurrentUser) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-Token': $('#_token').val()
        }
      });
      $.ajax({
        url: data.API_URLs.SaveLichSuTraCuu_master,
        type: "POST",
        data: {
          tra_cuu: tra_cuu,
          ket_qua: ket_qua,
        },
        success: function(response) {

        },
        error: function(xhr, error) {

        },

      });
    }
  }

  var calculateCungphi = function(lunarYear){
    var y = lunarYear - 4;
    var yourCungphi = cungPhi[y%9];
    return yourCungphi;
  }

  self.IsShowRegister_master = ko.observable(false);
  self.IsShowLogin_master = ko.observable(false);

  self.TuVanButton = function() {
    if (data.CurrentUser) {
      var win = window.open("https://www.facebook.com/messages/t/SagittB", '_blank');
      win.focus();
    } else {
      self.IsShowRegister_master(true);
      self.IsShowLogin_master(false);
    }
  }

  self.ShowLoginModal_master = function() {
    self.IsShowRegister_master(false);
    self.IsShowLogin_master(true);
  }

  self.ShowRegisterModal_master = function() {
    self.IsShowRegister_master(true);
    self.IsShowLogin_master(false);
  }

  self.createUser_master_tuvan = function() {
    self.createUser_master();
    setTimeout(function() {
      if (self.NotifyCreateUserSuccess_master()) {
        var win = window.open("https://www.facebook.com/messages/t/SagittB", '_blank');
        win.focus();
      }
    }, 3000)
  }

  self.login_master_tuvan = function() {
    logInFunction();
  }

  var logInFunction = function() {
    self.NotifyErrors_master.removeAll();
    if (!self.userEmail_master() || !self.userPassword_master()) {
      self.NotifyErrors_master.push('Bạn chưa nhập đủ thông tin*');
      return;
    }
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('#_token').val()
      }
    });
    $.ajax({
      url: data.API_URLs.Login_master,
      beforeSend: function() {
        NProgress.start();
      },
      type: "POST",
      data: {
        email: self.userEmail_master(),
        password: self.userPassword_master(),
      },
      success: function(response) {
        if (response.IsSuccess == true) {
          setTimeout(function() {
            location.reload();
            var win = window.open("https://www.facebook.com/messages/t/SagittB", '_blank');
            win.focus();
          }, 3000)
        } else if (response.IsSuccess == false) {
          self.NotifyErrors_master.push('Email hoặc mật khẩu không chính xác');
        }
      },
      error: function(xhr, error) {
        for (item in xhr.responseJSON) {
          self.NotifyErrors_master.push(xhr.responseJSON[item]);
        }
      },
      complete: function() {
        NProgress.done();
      },
    });
  }

  var getLunarYearTag = function() {
    var currentCan = namcanchi[lunarYearCanId];
    for (var i = 0; i < currentCan.chi.length; i++) {
      var item = currentCan.chi[i];
      if (item.id === lunarYearChiId){
        self.LunarYearTag_master(item.tag);
        return;
      }
    }
  }
}
