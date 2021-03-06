<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Thông tin khoản trên ${companyName}</title>
</head>

<body>
    <div style="width:722px; border:solid 1px #CCC; font-family:Arial, Helvetica, sans-serif; padding:10px; margin:10px auto; line-height:130%; font-size:14px; color: #333;">
        <div>
            <div style="float:left"><img src="${host}/resources/images/${imageLogo}" width="272" height="68" /></div>
            <div style=" float:right; margin-top:50px; margin-bottom:20px;">Tổng đài chăm sóc khách hàng:<span style=" font-size:24px; color:#0d7cab;"> ${hotline}</span></div>
            <div style="clear:both;"></div>
        </div>
        <div>
            <img src="${host}/resources/images/thongtin-donhang_01.jpg" alt="">
        </div>
        <div style="background-repeat:no-repeat; padding-top:20px;">
            <p>SagittB thông báo !</p>

            <div style=" padding-bottom:20px; margin-bottom:20px;">Có phải bạn đang quên mật khẩu? <br />
                <a href="{{url('reset-password/'.$contentEmail['token'])}}">Bấm vào đây để đặt lại mật khẩu.</a>


                <div style="margin-bottom:20px;">Chúc bạn có những trải nghiệm tuyệt vời với các sản phẩm của SagittB
                </div>
                <div style=" border-bottom: dashed 1px #CCC; margin-bottom:20px; padding-bottom:10px;"></div>
            </div>
            <div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><img src="${host}/resources/images/thongtin-donhang_10.jpg" width="23" height="15" /></td>
                        <td style="font-style:italic; font-size: 12px">Lưu ý: Đây là email tự động, xin vui lòng không trả lời email này.</td>
                    </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="55%">
                            <div align="center" style=" margin-top:5px;">
                                <div style="text-transform:uppercase; font-size:12px; color:#0d7caa; font-weight:bold; margin-bottom:5px;">${conpanyFullName}</div>
                                <div style="background-color:#cfe5ee; line-height:25px; width:290px;"><a style="text-decoration:none; color:#000;" target="_blank" href="${websiteUrl}">${website}</a></div>
                            </div>
                        </td>
                        <td width="-1%"><img src="${host}/resources/images/thongtin-donhang_14.jpg" width="1" height="69" /></td>
                        <td width="44%">
                            <table width="80%" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto; font-size: 12px">
                                <tr>
                                    <td>Theo dõi ${companyName} tại:</td>
                                    <td width="15%"><a href="${facebookUrl}" target="_blank"><img src="${host}/resources/images/thongtin-donhang_17.jpg" width="41" height="38" /></a></td>
                                    <td width="15%"><a href="${googlePlusUrl}" target="_blank"><img src="${host}/resources/images/thongtin-donhang_18.jpg" width="40" height="38" /></a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
</body>

</html>