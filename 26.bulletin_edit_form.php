<?php
    error_reporting(0);// 關閉錯誤報告
    session_start(); // 開始 session
    if (!$_SESSION["id"]) { // 檢查是否有 session 中的 "id" 變數，若無則要求使用者登入
        echo "please login first";// 提示用戶先登入
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 在3秒後重新導向至 "2.login.html" 頁面
    }
    else{
        
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");// 建立與資料庫的連結
        $result=mysqli_query($conn, "select * from bulletin where bid={$_GET["bid"]}");// 從資料庫中選擇指定bid的佈告資料
        $row=mysqli_fetch_array($result);// 從結果集中獲取行數據
        $checked1=""; // 設置佈告類型的預選選項
        $checked2="";
        $checked3="";
        if ($row['type']==1)
            $checked1="checked";
        if ($row['type']==2)
            $checked2="checked";
        if ($row['type']==3)
            $checked3="checked";
        echo " // 顯示佈告編輯表單
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=27.bulletin_edit.php>
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    標    題：<input type=text name=title value={$row['title']}><br>
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    發布時間：<input type=date name=time value={$row['time']}><p></p>
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
