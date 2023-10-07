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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Data</title>
<style>
    h1{text-align:center;}
    #content{
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
        text-align:left;
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
    .ip{
        font-family: "Microsoft JhengHei";
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 2px solid #8f8681;
        border-radius: 12px;
        box-sizing: border-box;
    }
    p{
        color:#3C3C3C;
        font-family: "Microsoft JhengHei";
        font-size:20px;
    }
    .ip label {
        display: inline-block;
        padding: 4px 11px;
        font-size: 20px;
        cursor: pointer;
    }
</style>
</head>
<body>
<div id="content">
    <h1>修改資料<h1/>
    <form action="changData.php" method="post" name="formFix" id="formFix">
        <table border="1" align="center" cellpadding="4">
            <tr><th>姓名</th><td><input class="ip" type="text" name="sName" value="<?php echo($Dname); ?>"></td></tr>
            <tr><th>性別</th>
            <td id="tdd">
                <div class="ip">
                    <label><input type="radio" name="sSex"  value="男" <?php if($Dgender=="男") echo "checked";?>>男</label>
                    <label><input type="radio" name="sSex"  value="女" <?php if($Dgender=="女") echo "checked";?>>女</label>
                    <label><input type="radio" name="sSex"  value="其他" <?php if($Dgender=="其他") echo "checked";?>>其他</label>
                </div>
            </td></tr>
            <tr><th>生日</th><td><input class="ip" type="date" name="sBirthday" value="<?php echo($Dbirthday); ?>"></td></tr>
            <tr><th>郵箱</th><td><input class="ip" type="text" name="sMail"  value="<?php echo($Demail); ?>"></td></tr>
            <tr><th>電話</th><td><input class="ip" type="text" name="sPhone" value="<?php echo($Dphone); ?>"></td></tr>
            <tr><th>帳號</th><td><p><?php echo($Daccount); ?></p></td></tr>
        </table>
    <input class="button" name="action" type="hidden" value="update">
    <input class="button" type="button" value="返回" onclick="location.href='memberData.php'">
    <input class="button" type="submit"  value="更新資料" onclick="location.href='changData.php'">
    </form>
</div>
</body>
</html>