<?php
    $acc = $_POST["uid"];//輸入的帳號
    $pwd = $_POST["upw"];//輸入的密碼
    $pwdHash = password_hash( $pwd, PASSWORD_DEFAULT);//密碼雜湊
    session_start();
    session_destroy();//如果前面有存SESSION了先刪掉
    
    //跟資料庫建立連線
    include "db.php";
    mysqli_select_db( $db_link, "hw7");
    //把帳號那列抓出來
    $find_acc = mysqli_query( $db_link, "SELECT * FROM information WHERE `帳號`='".$acc."' ");
    $row_acc = mysqli_fetch_assoc($find_acc);
    
    if ($acc!="" && $pwd!=""){//帳號密碼都要有東西
        $db_acc = $row_acc["帳號"];//抓資料庫的帳號
        $db_pwd = $row_acc["密碼"];//抓資料庫的密碼
        $pwdcheck = password_verify( $pwd, $db_pwd);//比對密碼是否一致
        if ($acc===$db_acc && $pwdcheck===true) {//帳密都正確
            session_start();//就開啟session存目前登入的這個人的帳密
            $_SESSION['帳號']=$acc;
            //將頁面導向到memberData.php
            header("Location: memberData.php");
        }
        else {
            $message ="帳號密碼錯誤";
            echo "<script type='text/javascript'>alert('$message');window.location.href='login.html';</script>";
            //echo "<script> showMessage(); </script>";
        }
    }else { //沒有輸入完整
        $message ="欄位不可空白";
        echo "<script type='text/javascript'>alert('$message');window.location.href='login.html';</script>";
    }
?>