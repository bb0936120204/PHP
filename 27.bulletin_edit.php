<?php

    error_reporting(0);// 關閉錯誤報告
    session_start();// 開始 session
    if (!$_SESSION["id"]) {// 檢查是否有 session 中的 "id" 變數，若無則要求使用者登入
        echo "請登入帳號";// 提示用戶先登入
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 在3秒後重新導向至 "2.login.html" 頁面
    }
    else{   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");// 建立與資料庫的連結
        if (!mysqli_query($conn, "update bulletin set title='{$_POST['title']}',content='{$_POST['content']}',time='{$_POST['time']}',type={$_POST['type']} where bid='{$_POST['bid']}'")){// 執行 SQL 指令，更新指定bid的佈告資訊
            echo "修改錯誤"; // 如果更新失敗，顯示修改錯誤
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";// 在3秒後重新導向至 "11.bulletin.php" 頁面
        }else{
            echo "修改成功，三秒鐘後回到佈告欄列表";// 如果更新成功，顯示修改成功
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";// 在3秒後重新導向至 "11.bulletin.php" 頁面
        }
    }

?>
