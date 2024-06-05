<?php
    error_reporting(0);// 關閉錯誤報告
    session_start();// 開始 session
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 檢查是否有 session 中的 "id" 變數，若無則要求使用者登入
    }
    else{   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");// 建立與資料庫的連結
        $sql="delete from user where id='{$_GET["id"]}'"; // 構建 SQL 指令，用於刪除指定id的使用者
        #echo $sql;
        if (!mysqli_query($conn,$sql)){
            echo "使用者刪除錯誤";// 執行 SQL 指令，刪除使用者
        }else{
            echo "使用者刪除成功";
        }
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";// 重新導向至 "18.user.php" 頁面，並在3秒後執行
    }
?>
