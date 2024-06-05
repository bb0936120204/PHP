<?php

error_reporting(0);// 關閉錯誤報告

session_start();// 開始 session
if (!$_SESSION["id"]) {
    echo "請登入帳號";// 檢查是否有 session 中的 "id" 變數，若無則要求使用者登入
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
}
else{    

   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");// 建立資料庫連結
   #mysqli_query() 從資料庫查詢資料
   #新增資料SQL命令：insert into 表格名稱(欄位1,欄位2) values(欄位1的值,欄位2的值)
   $sql="insert into user(id,pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";// 構建 SQL 指令，用於新增使用者
   #echo $sql;
   if (!mysqli_query($conn, $sql)) {
     echo "新增命令錯誤";
   }
   else{
     echo "新增使用者成功，三秒鐘後回到網頁";// 執行 SQL 指令，向資料庫新增使用者
     echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
   }
}
?>
