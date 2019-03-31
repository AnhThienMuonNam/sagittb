<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Thanh toán Đơn hàng</title>
</head>

<body>
    <div style="width:722px; border:solid 1px #CCC; font-family:Arial, Helvetica, sans-serif; padding:10px; margin:10px auto; line-height:130%; font-size:14px; color: #333;">
        <div>
            <div style="float:left"><img alt="" src="host}/resources/images/imageLogo}" width="272" height="68" /></div>

            <div style="clear:both"></div>
        </div>
        <div>
            <img src="host}/resources/images/thongtin-donhang_01.jpg" alt=""/>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 10px;">
                <tr>
                    <td><img alt="" src="host}/resources/images/thongtin-donhang_10.jpg" width="23" height="15"/></td>
                    <td style="font-style:italic; font-size: 15px; color: red;">Lưu ý: Đây là email tự động, xin vui lòng không trả lời email này.</td>
                </tr>
            </table>
        </div>
        <div style="background-repeat:no-repeat; padding-top:20px;">
            <p>Xin chào <span style=" color:#0d7caa; font-weight:bold;">{{$contentEmail['order']->customer_name}}</span></p>
            SagittB gửi email này để nhắc bạn thanh toán đơn hàng mã: {{$contentEmail['order']->id}}, được đặt vào lúc: {{$contentEmail['order']->created_at}}
            <br />
             <p>Số tiền bạn cần thanh toán: <b>{{$contentEmail['order']->original_price}}</b></p>
            <a href="{{url('order/'.$contentEmail['order']->random_code)}}">Bấm vào đây để xem chi tiết >>></a>
            <div style=" padding-bottom:10px; padding-top: 10px"><span style=" color:#0d7caa; font-weight:bold;text-decoration:underline;"> Hướng dẫn thanh toán đơn hàng:</span>

            </div>
              <div style="margin-bottom:20px;"><u>Thanh toán theo nội dung</u>  : SagittB don hang {{$contentEmail['order']->id}} - Tên - SĐT

            </div>
            <div style="border-bottom: dashed 1px #CCC;line-height:20px; padding-bottom:10px; padding-top: 10px"><span style=" color:#0d7caa; font-weight:bold;text-decoration:underline;"> Thông Tin tài khoản Ngân Hàng:</span> <br />
               <table width="100%">
                   <tr>
                       <td width="150px">
                          Ngân hàng :
                       </td>
                       <td>
                          Ngân hàng thương mại cổ phần Ngoại thương Việt Nam - VietcomBank
                       </td>
                   </tr>
                   <tr>
                       <td>
                           Chủ tài khoản :
                       </td>
                       <td>
                          TRẦN THỊ THÙY NGÂN
                       </td>
                   </tr>
                   <tr>
                       <td>
                           Số tài khoản:
                       </td>
                       <td>
                           0531002475329
                       </td>
                   </tr>
                   <tr style = "color: red;">
                       <td>
                            <div style="  border-bottom: dashed 1px #CCC; padding-bottom:10px;"></div>
                       </td>
                          <td>
                            <div style="  border-bottom: dashed 1px #CCC; padding-bottom:10px;"></div>
                       </td>
                   </tr>
                   <tr>
                       <td>
                           Ngân hàng :
                       </td>
                       <td>
                          Ngân hàng thương mại cổ phần Á Châu ACB
                       </td>
                   </tr>
                   <tr>
                       <td>
                           Chủ tài khoản :
                       </td>
                       <td>
                          TRẦN THỊ THÙY NGÂN
                       </td>
                   </tr>
                   <tr>
                       <td>
                           Số tài khoản
                       </td>
                       <td>
                           548197
                       </td>
                   </tr>
               </table>
           </div>

           <div style = "color: red;">
              <i>Chú ý </i> : Quý khách thanh toán chậm nhất là ngày <b>5 (trừ thứ 7 và chủ nhật)</b> , qua thời gian này hệ thống sẽ tự động hủy đơn hàng của bạn
           </div>
            <div style="  border-bottom: dashed 1px #CCC; padding-bottom:10px;"></div>
            <div style="margin-bottom:20px;">Nếu có bất kỳ khó khăn nào trong quá trình sử dụng và quản lý dịch vụ, bộ phận hỗ trợ kĩ thuật của SagittB
                luôn sẵn sàng phục vụ bạn.</div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="49%" align="right" style="padding-right:10px; color:#0d7caa; font-weight:bold; line-height:23px;">
                        Tổng đài 24/7:<br />
                        Hỗ trợ qua Email:
                    </td>
                    <td width="51%" align="left" style="color:#0d7caa; line-height:23px;">
                        hotline<br />
                        emailSupport
                    </td>
                </tr>
            </table>

            <div style="  border-bottom: dashed 1px #CCC; padding-bottom:10px;"></div>
        </div>
        <div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="55%">
                        <div align="center" style=" margin-top:5px;">
                            <div style="text-transform:uppercase; font-size:12px; color:#0d7caa; font-weight:bold; margin-bottom:5px;">SagittB</div>
                            <div style="background-color:#cfe5ee; line-height:25px; width:290px;"><a style="text-decoration:none; color:#000;" target="_blank" href="websiteUrl}">website.com</a></div>
                        </div>
                    </td>
                    <td width="-1%"><img src="host}/resources/images/thongtin-donhang_14.jpg" width="1" height="69"/></td>
                    <td width="44%">
                        <table width="80%" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto; font-size: 12px">
                            <tr>
                                <td>Theo dõi SagittB tại:</td>
                                <td width="15%"><a href="facebookUrl" target="_blank"><img src="host}/resources/images/thongtin-donhang_17.jpg" width="41" height="38"/></a></td>
                                <td width="15%"><a href="googlePlusUrl" target="_blank"><img src="host}/resources/images/thongtin-donhang_18.jpg" width="40" height="38"/></a></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
