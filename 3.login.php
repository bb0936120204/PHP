<?php 
//結合2.login.html
    if (($_POST["id"] == "john") && ($_POST["pwd"]=="john1234"))
        echo "登入成功";
    else
        echo "登入失敗";
?>
