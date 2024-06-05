<html>
    <head><title>新增使用者</title></head>
    <body>
<?php        
    error_reporting(0);// 關閉錯誤報告
    session_start();// 開始 session
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 檢查是否有 session 中的 "id" 變數，若無則要求使用者登入
    }
    else{    
        echo "// 若已登入，顯示新增使用者的表單
            <form action=15.user_add.php method=post>
                帳號：<input type=text name=id><br>
                密碼：<input type=text name=pwd><p></p>
                <input type=submit value=新增> <input type=reset value=清除>
            </form>
        ";
    }
?>
    </body>
</html>
