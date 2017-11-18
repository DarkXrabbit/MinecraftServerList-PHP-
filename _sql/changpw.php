<?php
session_start();  
include("sql.inc.php");

$v = $_SESSION['v'];
$id = $_POST['account'];
$password = $_POST['password'];

$sql = "SELECT * FROM svList_account WHERE account = '$id'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
if ($row[1] == $id AND $row[7] == $v){
mysql_query("UPDATE `svList_account` SET `vpw`= '0' WHERE vpw = '$v';");
$_SESSION['msg']= 'pwcgok';

$address = $row[4];
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->SMTPDebug = 0; 
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'amsserver.noreply@gmail.com';
$mail->Password = '21135220aza';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('amsserver.noreply@gmail.com','伺服器列表驗證系統');
$mail->addAddress($address);
$mail->addAddress($address);
$mail->addReplyTo('');
$mail->addCC('amsserver.noreply@gmail.com');
$mail->addBCC('amsserver.noreply@gmail.com');

$mail->isHTML(true);

$mail->Subject = '伺服器列表 - 您的密碼已經變更';
$mail->Body    = '
<!DOCTYPE>
<html lang="zh_TW">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>伺服器列表驗證系統</title>
</head>
<body>
<div style="width: 100%; font-family: 微軟正黑體, Helvetica, sans-serif; font-size: 12px;">
你的密碼已經被變更，若未做此動作，請立即至<a href="https://server.wartw.top/dashboard?c=forgot_pw">此</a>輸入帳號及現在的電子郵件，進行變更密碼的動作。
</div>
</body>
</html>';
$mail->AltBody = '';

if($mail->send()){
$_SESSION['msg'] = 'mail_ok';
header("Location: ../dashboard"); 
exit;
}else{
$_SESSION['msg'] = 'mail_error';
header("Location: ../dashboard"); 
exit;
}
header("Location: ../dashboard"); 
exit;
}else{
$_SESSION['msg']= 'pwcgno';
}
header("Location: ../dashboard"); 
exit;