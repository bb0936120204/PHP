<?php
    error_reporting(0);// 關閉錯誤報告
    session_start();// 開始 session
    if (!$_SESSION["id"]) {
        echo "please login first";// 檢查是否有 session 中的 "id" 變數，若無則要求使用者登入
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 提示用戶先登入
    }
    else{
        echo " // 顯示新增佈告的表單
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=23.bulletin_add.php>
                    標    題：<input type=text name=title><br>
                    內    容：<br><textarea name=content rows=20 cols=20></textarea><br>
                    佈告類型：<input type=radio name=type value=1>系上公告 
                            <input type=radio name=type value=2>獲獎資訊
                            <input type=radio name=type value=3>徵才資訊<br>
                    發布時間：<input type=date name=time><p></p>
                    <input type=submit value=新增佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
