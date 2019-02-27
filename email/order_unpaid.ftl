<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Thông tin thánh toán đơn hàng</title>
</head>

<body>
    <div style="width:722px; border:solid 1px #CCC; font-family:Arial, Helvetica, sans-serif; padding:10px; margin:10px auto; line-height:130%; font-size:14px; color: #333;">
        <div>
            <div style="float:left"><img alt="" src="${host}/resources/images/${imageLogo}" width="272" height="68" /></div>
            <div style=" float:right; margin-top:50px; margin-bottom:20px;">Tổng đài chăm sóc khách hàng:<span style=" font-size:24px; color:#0d7cab;"> ${hotline}</span></div>
            <div style="clear:both"></div>
        </div>
        <div>
            <img src="${host}/resources/images/thongtin-donhang_01.jpg" alt=""/>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 10px;">
                <tr>
                    <td><img alt="" src="${host}/resources/images/thongtin-donhang_10.jpg" width="23" height="15"/></td>
                    <td style="font-style:italic; font-size: 15px; color: red;">Lưu ý: Đây là email tự động, xin vui lòng không trả lời email này.</td>
                </tr>
            </table>
        </div>
        <div style="background-repeat:no-repeat; padding-top:20px;">
            <p>Xin chào <span style=" color:#0d7caa; font-weight:bold;">${datacenterMail.getCustomer()}</span></p>
            Cảm ơn bạn đã tin tưởng chọn sử dụng sản phẩm của SagittB.
            Chúng tôi gửi đến bạn thông tin chi tiết đơn hàng mà bạn vừa đặt vào ngày ${date}

            <p>THÔNG TIN ĐƠN HÀNG</p>
            <div style="border-bottom: dashed 1px #CCC;line-height:20px; padding-bottom:10px;"><span style=" color:#0d7caa; font-weight:bold;text-decoration:underline;"> Thông Tin Sản phẩm:</span> <br />
                <table width="100%">
                    <tr>
                        <td width="150px">
                            Tên sản phẩm:
                        </td>
                        <td>
                          <i>${datacenterMail.getPacketName()}</i>  
                        </td>
                    </tr>
                    <tr>
                        <td width="150px">
                            Số lượng:
                        </td>
                        <td>
                          <i> ${datacenterMail.getPacketName()}</i>
                        </td>
                    </tr>
                    <tr>
                        <td width="150px">
                            Thành tiền:
                        </td>
                        <td>
                          <i>${datacenterMail.getPacketName()}</i>  
                        </td>
                    </tr>
                    <tr>
                        <td width="150px">
                            Thanh toán:
                        </td>
                        <td>
                           <p style="color: red">Chưa thanh toán</p> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Dự kiến giao hàng:
                        </td>
                        <td>
                        <i>Từ 2 đến 10 ngày sau khi đã thanh toán</i>  
                        </td>
                    </tr>
                    
                    
                </table>
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
            <div style=" padding-bottom:10px; padding-top: 10px"><span style=" color:#0d7caa; font-weight:bold;text-decoration:underline;"> Hướng dẫn thanh toán đơn hàng:</span>
                
            </div>
              <div style="margin-bottom:20px;"><u>Thanh toán theo nội dung</u>  : SagittB don hang {orderId} - Tên - SĐT
                
            </div>
            <div style = "color: red;">
               <i>Chú ý </i> : Quý khách thanh toán chậm nhất là ngày <b>{date}</b> , qua thời gian này hệ thống sẽ tự động hủy đơn hàng của bạn
            </div>
       
            <div style="  border-bottom: dashed 1px #CCC; padding-bottom:10px;"></div>
            <div style="margin-bottom:15px;">
                <i>Nếu có bất kỳ khó khăn nào trong quá trình đặt hàng bạn vui lòng điện số hoặc gửi tin nhắn vào phần chăm sóc khách hàng tại trang web</i></div>
            <div style="  border-bottom: dashed 1px #CCC; padding-bottom:10px;"></div>
        </div>
        <div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="55%">
                        <div align="center" style=" margin-top:5px;">
                            <div style="text-transform:uppercase; font-size:12px; color:#0d7caa; font-weight:bold; margin-bottom:5px;">${conpanyFullName}</div>
                            <div style="background-color:#cfe5ee; line-height:25px; width:290px;"><a style="text-decoration:none; color:#000;" target="_blank" href="${websiteUrl}">${website}</a></div>
                        </div>
                    </td>
                    <td width="-1%"><img src="${host}/resources/images/thongtin-donhang_14.jpg" width="1" height="69"/></td>
                    <td width="44%">
                        <table width="80%" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto; font-size: 12px">
                            <tr>
                                <td>Theo dõi ${companyName} tại:</td>
                                <td width="15%"><a href="${facebookUrl}" target="_blank"><img src="${host}/resources/images/thongtin-donhang_17.jpg" width="41" height="38"/></a></td>
                                <td width="15%"><a href="${googlePlusUrl}" target="_blank"><img src="${host}/resources/images/thongtin-donhang_18.jpg" width="40" height="38"/></a></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>