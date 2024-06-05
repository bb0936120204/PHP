<?php
    error_reporting(0); // 關閉錯誤報告
    session_start();// 開始 session
    if (!$_SESSION["id"]) {// 檢查是否有 session 中的 "id" 變數，若無則要求使用者登入
        echo "please login first";// 提示用戶先登入
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 在3秒後重新導向至 "2.login.html" 頁面
    }
    else{
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 建立與資料庫的連結
        $sql="insert into bulletin(title, content, type, time) // 構建 SQL 指令，用於新增佈告
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";// 執行 SQL 指令，向資料庫新增佈告
        if (!mysqli_query($conn, $sql)){
            echo "新增命令錯誤";// 如果新增失敗，顯示新增命令錯誤
        }
        else{
            echo "新增佈告成功，三秒鐘後回到網頁";// 如果新增成功，顯示新增佈告成功
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";// 在3秒後重新導向至 "11.bulletin.php" 頁面
        }
    }
?>
