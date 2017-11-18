<?php
session_start();
include("sql.inc.php");

$id = $_POST['account'];
$email = $_POST['email'];
$address = $_POST['email'];
$sql = "SELECT * FROM svList_account WHERE account = '$id'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$v = $row[5];

$_SESSION['msg'] = "cmailok";
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

$mail->Subject = '伺服器列表 - 補發驗證系統';
$mail->Body    = '
<!DOCTYPE>
<html lang="zh_TW">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>伺服器列表驗證系統</title>
</head>
<body>
<div style="width: 100%; font-family: 微軟正黑體, Helvetica, sans-serif; font-size: 12px;">
點擊驗證 <a href="https://server.wartw.top/v?v='.$v.'&id='.$id.'">https://server.wartw.top/v?v='.$v.'&id='.$id.'</a><br>本電子郵件無法個別對玩家進行回復，有問題請至<a href="https://forum.gamer.com.tw/C.php?bsn=18673&snA=159343&subbsn=0" target="_blank">巴哈文章</a>提出問題詢問。
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
include('_core/footer.php');
