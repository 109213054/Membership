<?php
    //把表單中的資料抓下來
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $birthday = $_POST["birthday"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $account = $_POST["acc"];
    $pwd = $_POST["pwd"];

    
    //連結資料庫
    include "db.php";
    mysqli_select_db( $db_link, "hw7");
    
    $check = 0;//檢查會員是否存在
    
    $result = mysqli_query( $db_link, "SELECT * FROM information");
    while ($row = mysqli_fetch_assoc($result)) {//如果row還有資料
        if($account==$row["帳號"]){
            $check=1;
            $message = "會員帳號已存在!";
            echo "<script type='text/javascript'>alert('$message');window.location.href='register.html';</script>";
        }
    }

    if($check==0){//沒註冊過 把資料加進去
        if (empty($name) || empty($phone) || empty($account) || empty($pwd)){//這四個值有任何一個沒填到
            $message = "資料未輸入完整!";
            echo "<script type='text/javascript'>alert('$message');window.location.href='register.html';</script>";
        }else{
            echo ("等於:[".$_POST["name"]."]");
            $pwdHash=password_hash($pwd, PASSWORD_DEFAULT);
            //將輸入資料加入資料庫
            $sql_query = "INSERT INTO `information` (`姓名`, `性別`, `生日`, `郵箱`, `電話`, `帳號`, `密碼`) VALUES (";
            $sql_query .= "'".$name."',";
            $sql_query .= "'".$gender."',";
            $sql_query .= "'".$birthday."',";
            $sql_query .= "'".$email."',";
            $sql_query .= "'".$phone."',";
            $sql_query .= "'".$account."',";
            $sql_query .= "'".$pwdHash."')";
            mysqli_query( $db_link, $sql_query);
            $message = "註冊成功,請按確定鍵重新登入!";
            echo "<script type='text/javascript'>alert('$message');window.location.href='login.html';</script>";
        }
    }
?>