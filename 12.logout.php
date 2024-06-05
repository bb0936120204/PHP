<?php
    session_start();// 開始 session 以啟用 session 變數
    unset($_SESSION["id"]);// 從 session 中取消設置或移除 "id" 元素
    echo "登出成功....";   // 印出一則訊息，表示登出成功
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";  // 設置一個 meta 標籤，在3秒後重新整理頁面並導向至 "2.login.html"

?>


