<html>
    <head><title>使用者管理</title></head>
    <body>
    <?php
        error_reporting(0);// 關閉錯誤報告
        session_start();// 開始 session
        if (!$_SESSION["id"]) {
            echo "請登入帳號";
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 檢查是否有 session 中的 "id" 變數，若無則要求使用者登入
        }
        else{   
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>"; // 顯示使用者管理標題
            
            $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");// 建立與資料庫的連結
            $result=mysqli_query($conn, "select * from user");// 從資料庫中選擇所有使用者的資料
            while ($row=mysqli_fetch_array($result)){
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            echo "</table>";// 顯示使用者資料表格
        }
    ?> 
    </body>
</html>
