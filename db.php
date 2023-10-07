<?php
    //先建立與資料庫mysql連線
    $db_link = mysqli_connect( "localhost", "root", "", "hw7"); // $db_link為連接識別碼
    //如果連不到就傳回錯誤
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ";
        exit();
    }
    //宣告字元集處理
    mysqli_set_charset( $db_link, "utf8mb4");
?>