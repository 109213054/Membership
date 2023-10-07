<?php
    //啟用 Session（要放在任何訊息輸出之前）
    session_start();
    //取用 Session 中的資料
    $username = $_SESSION['帳號'];
    //抓表單資料
    $user = $_POST['oldpwd'];//原密碼
    $newPwd = $_POST['newpwd'];//新密碼
    $pwdHash2 = password_hash( $newPwd, PASSWORD_DEFAULT);//把新密碼雜湊

    //跟資料庫建立連線
    include "db.php";
    mysqli_select_db( $db_link, "hw7");
    $find_acc = mysqli_query( $db_link, "SELECT * FROM `information`");

    while($row_result=mysqli_fetch_assoc($find_acc)) {//抓每一列資料
        if($row_result['帳號']==$username){//抓與帳號符合的資料
            $Daccount =$row_result["帳號"];//把資料庫中的帳號抓下來
            $pwd=$row_result["密碼"];//把資料庫中的密碼抓下來
        }
    }
    $pwdcheck = password_verify($user, $pwd);
    if ($pwdcheck===true) {//原密碼輸入對
        echo ("密碼正確");
        $sql_query = "UPDATE `information` SET ";
        $sql_query .= "`密碼`='".$pwdHash2."'";
        $sql_query .= " WHERE `帳號`='".$username."'";	
        mysqli_query($db_link, $sql_query);
        $message = "修改成功";
        echo "<script type='text/javascript'>alert('$message');window.location.href='memberData.php';</script>";
    }else{
        $message = "原密碼輸入錯誤";
        echo "<script type='text/javascript'>alert('$message');window.location.href='changpw.html';</script>";
    }
?>