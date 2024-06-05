<?php

    error_reporting(0);// 關閉錯誤報告
    session_start();// 開始 session
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 檢查是否有 session 中的 "id" 變數，若無則要求使用者登入
    }
    else{   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");// 建立與資料庫的連結
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'")){// 執行 SQL 指令，更新資料庫中指定id的使用者密碼
            echo "修改錯誤";// 如果更新失敗，顯示修改錯誤訊息
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";// 在3秒後重新導向至 "18.user.php" 頁面
        }else{
            echo "修改成功，三秒鐘後回到網頁";// 如果更新成功，顯示修改成功訊息
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";// 在3秒後重新導向至 "18.user.php" 頁面
        }
    }

?>
