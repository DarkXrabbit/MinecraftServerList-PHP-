<?php
session_start();
include("sql.inc.php");
if ($_SESSION['admin'] == 1){

$id = $_GET['id'];
$email = $_GET['email'];
$address = $_GET['email'];

$sql = "SELECT * FROM svList_account WHERE account = '$id'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
if ($row[1] == $id AND $row[4] == $email){
$v = rand(1,99999);
$sql2 = "UPDATE `svList_account` SET `vpw`= '$v' WHERE account = '$id';";
mysql_query($sql2);
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

$mail->setFrom('amsserver.noreply@gmail.com','伺服器列表系統');
$mail->addAddress($address);
$mail->addAddress($address);
$mail->addReplyTo('');
$mail->addCC('amsserver.noreply@gmail.com');
$mail->addBCC('amsserver.noreply@gmail.com');

$mail->isHTML(true);

$mail->Subject = '伺服器列表 - 忘記密碼';
$mail->Body    = '
<!DOCTYPE>
<html lang="zh_TW">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>伺服器列表 - 忘記密碼</title>
</head>
<body>
<div style="width: 100%; font-family: 微軟正黑體, Helvetica, sans-serif; font-size: 12px;">
管理員已經協助給您寄信，請查看以下資訊。<br>
點擊更改密碼 <a href="https://svlist.amsserver.xyz/dashboard?c=chang_pw&v='.$v.'&id='.$id.'">https://svlist.amsserver.xyz/dashboard?c=chang_pw&v='.$v.'&id='.$id.'</a><br>本電子郵件無法個別對玩家進行回復，有問題請至<a href="https://forum.gamer.com.tw/C.php?bsn=18673&snA=159343&subbsn=0" target="_blank">巴哈文章</a>提出問題詢問。</div>
</body>
</html>';
$mail->AltBody = '';

if($mail->send()){
$_SESSION['msg'] = 'adminpwmail_ok';
}else{
$_SESSION['msg'] = 'adminpwmail_mailerror';
}
}else{
$_SESSION['msg'] = 'adminpwmail_error';
}
}else{
$_SESSION['msg'] = "adminverror";
}
header("Location: ../users"); 
exit;