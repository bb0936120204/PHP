<?php
    error_reporting(0); // 關閉錯誤報告
    session_start();// 開始 session
    if (!$_SESSION["id"]) { // 檢查是否有 session 中的 "id" 變數，若無則要求使用者登入
        echo "請登入帳號";// 提示用戶先登入
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 在3秒後重新導向至 "2.login.html" 頁面
    }
    else{   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");// 建立與資料庫的連結
        $sql="delete from bulletin where bid='{$_GET["bid"]}'";// 構建 SQL 指令，用於刪除指定bid的佈告
        #echo $sql; // 執行 SQL 指令，從資料庫刪除佈告
        if (!mysqli_query($conn,$sql)){
            echo "佈告刪除錯誤";// 如果刪除失敗，顯示佈告刪除錯誤
        }else{
            echo "佈告刪除成功";// 如果刪除成功，顯示佈告刪除成功
        }
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>"; // 在顯示成功或失敗訊息後，重新導向至佈告列表頁面
    }
?>
