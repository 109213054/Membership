<?php 
//啟用 Session（要放在任何訊息輸出之前）
session_start();
//取用 Session 中的資料
$username = $_SESSION['帳號'];
//連線
include "db.php";
mysqli_select_db( $db_link, "hw7");
    
$find_acc = mysqli_query( $db_link, "SELECT * FROM `information`");//如果輸入的資料有在資料庫中抓資料, 因為帳號事主鍵, 只有一個

while($row_result=mysqli_fetch_assoc($find_acc)) {//抓每一列資料
    if($row_result['帳號']==$username){
        $Dno = $row_result["會員編號"];
        $Dname = $row_result["姓名"];
        $Dgender =$row_result["性別"];
        $Dbirthday =$row_result["生日"];
        $Demail =$row_result["郵箱"];
        $Dphone =$row_result["電話"];
        $Daccount =$row_result["帳號"];
        $pwd=$row_result["密碼"];
    }
}
$_SESSION['密碼']=$pwd;

if (isset($_POST["action"])&&($_POST["action"]=="update")){
	$sql_query = "UPDATE `information` SET ";
    $sql_query .= "`會員編號`='".$Dno."',";
	$sql_query .= "`姓名`='".$_POST["sName"]."',";
	$sql_query .= "`性別`='".$_POST["sSex"]."',";
	$sql_query .= "`生日`='".$_POST["sBirthday"]."',";
	$sql_query .= "`郵箱`='".$_POST["sMail"]."',";
	$sql_query .= "`電話`='".$_POST["sPhone"]."',";
	$sql_query .= "`帳號`='".$Daccount."',";
    $sql_query .= "`密碼`='".$_SESSION['密碼']."'";
	$sql_query .= " WHERE `帳號`='".$_SESSION['帳號']."'";	
	mysqli_query($db_link, $sql_query);
    $message = "資料更新成功!";
    echo "<script type='text/javascript'>alert('$message');window.location.href='memberData.php';</script>";
}
?>