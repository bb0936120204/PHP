<html>
    <head><title>修改使用者</title></head>
    <body>
    <?php
    error_reporting(0);// 關閉錯誤報告
    session_start();// 開始 session
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 檢查是否有 session 中的 "id" 變數，若無則要求使用者登入
    }
    else{   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 建立與資料庫的連結
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'");// 從資料庫中選擇指定id的使用者資料
        $row=mysqli_fetch_array($result);// 從結果集中獲取行數據
        echo "
        <form method=post action=20.user_edit.php>// 顯示表單，用於修改密碼
            <input type=hidden name=id value={$row['id']}>
            帳號：{$row['id']}<br> 
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
            <input type=submit value=修改>
        </form>
        ";
    }
    ?>
    </body>
</html>
