<?php
session_start();
date_default_timezone_set("Asia/Taipei");
include('sql.inc.php');
@$id = $_POST['account'];
@$pw = md5($_POST['password']);

$sql = "SELECT * FROM svList_account WHERE account = '$id';";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

if(!empty($_SERVER['HTTP_CLIENT_IP'])){
   $ip = $_SERVER['HTTP_CLIENT_IP'];
}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
   $ip= $_SERVER['REMOTE_ADDR'];
}
mysql_query("UPDATE svList_account SET ip = '$ip' WHERE account = '$id'");
$date = date("Y-m-d h:i:sa");
$nick = $row[3];
if ($row[0] == null){
$_SESSION['msg'] = "loginnoexist";
}elseif ($row[5] != 0){
$_SESSION['msg'] = "verterror";
}elseif ($id == $row[1] AND $pw == $row[2]){
    if ($row[9] == '0'){
$_SESSION['msg'] = "loginok";
$_SESSION['id'] = $row[1];
$_SESSION['nick'] = $row[3];
$_SESSION['admin'] = $row[6];
$_SESSION['web'] = 'svList';
mysql_query("INSERT INTO `svList_Loginlog`(`account`, `nick`, `ip`, `date`, `status`) VALUES ('$id','$nick','$ip','$date','登入成功')");
    }else{
        $_SESSION['msg'] = "accountlock";
		mysql_query("INSERT INTO `svList_Loginlog`(`account`, `nick`, `ip`, `date`, `status`) VALUES ('$id','$nick','$ip','$date','帳戶已鎖定')");
    }
}else{
$_SESSION['msg'] = "loginerror";
mysql_query("INSERT INTO `svList_Loginlog`(`account`, `nick`, `ip`, `date`, `status`) VALUES ('$id','$nick','$ip','$date','登入失敗')");
}
header("Location: ../dashboard"); 
exit;