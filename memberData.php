<?php
    //啟用 Session（要放在任何訊息輸出之前）
    session_start();
    //取用 Session 中的資料
    $username = $_SESSION['帳號'];

    //跟資料庫建立連線
    include "db.php";
    mysqli_select_db( $db_link, "hw7");
    
    $find_acc = mysqli_query( $db_link, "SELECT * FROM `information` WHERE `帳號`='".$username."' ");
    $row_acc = mysqli_fetch_assoc($find_acc);//把抓出來的資料讀取出來
    
    //$row_acc["帳號"];
    $Dno = $row_acc["會員編號"];
    $Dname = $row_acc["姓名"];
    $Dgender = $row_acc["性別"];
    $Dbirthday = $row_acc["生日"];
    $Demail = $row_acc["郵箱"];
    $Dphone = $row_acc["電話"];
    $Daccount = $row_acc["帳號"];
    $Dpwd = $row_acc["密碼"];

?>
<html>
<head>
<meta charset="UTF-8">
<title>會員資料表</title> 
<style>
    div {
        margin: 30px auto;
        background-color: #e0dcd9;
        width: 700px;
        border: solid #8f8681 5px;
    }
    table {
        background-color: white;
        border: 2px double black;
        margin:50px auto;
        width:600px;
        height:400px;
        border-radius: 5px;
    }
    th {        
        border: 1px solid black;
        background-color: #8f8681;
        text-align:center; 
        padding: 2px 4px;
        color: white;
        border-radius: 8px;
    } 
    td {
        border: 1px solid black;
        color: black;
        border-radius: 8px;
        padding: 2px 4px;
    }
    caption {
        margin:20px;
        font-size:20pt;
    }
    .button {
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 10px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 12px;
    }
    .button:hover {
        background-color: #8f8681; /*藍色*/
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 10px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 12px;
    }
</style>
</head>
<body>
    <div align="center">
    <!--新增的畫面-->
        <h1>會員資料</h1>
        <table>
        <?php
            $str = "<tr><th>編號</th><td>$Dno</td></tr>";
            $str .= "<tr><th>姓名</th><td>$Dname</td></tr>";
            $str .= "<tr><th>性別</th><td>$Dgender</td></tr>";
            $str .= "<tr><th>生日</th><td>$Dbirthday</td></tr>";
            $str .= "<tr><th>郵箱</th><td>$Demail</td></tr>";
            $str .= "<tr><th>電話</th><td>$Dphone</td></tr>";
            $str .= "<tr><th>帳號</th><td>$Daccount</td></tr>";
            echo $str;
        ?>
        </table>
        <input class="button" type="button" value="登出" onclick="location.href='login.html'">
        <input class="button" type="button" value="修改資料" onclick="location.href='chdata.php'">
        <input class="button" type="button" value="修改密碼" onclick="location.href='changpw.html'">
        <br/><br/>
    </div>
</body>
</html>