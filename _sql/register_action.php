<?php
session_start();
include("sql.inc.php");

$id = $_SESSION['reg_id'];
$pw = md5($_SESSION['reg_pw']);

$nick = $_SESSION['reg_nick'];
$email = $_SESSION['reg_email'];
$address = $_SESSION['reg_email'];
$v = rand(11111111111,99999999999999);
$sql2 = "SELECT * FROM svList_account";
$result2 = mysql_query($sql2);
while($row2 = @mysql_fetch_row($result2)){
if ($row2[1] == $id) {
$_SESSION['msg'] = 'accountexist';
$_SESSION['err'] = '1';
echo '<script>document.location.href="../dashboard";</script>';
}
if ($row2[4] == $email) {
$_SESSION['msg'] = 'mailexist';	
$_SESSION['err'] = '1';
echo '<script>document.location.href="../dashboard";</script>';
}
if ($row2[3] == $nick) {
$_SESSION['msg'] = 'nickexist';	
$_SESSION['err'] = '1';
echo '<script>document.location.href="../dashboard";</script>';
}
}
if ($_SESSION['err'] = '0'){
mysql_query("INSERT INTO `svList_account` (`account`, `password`, `nick`, `email`, `verification`, `admin`) VALUES ('$id', '$pw', '$nick', '$email', '$v', '0');");
$_SESSION['msg'] = "regok";
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->SMTPDebug = 0; 
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'amsserver.noreply@gmail.com';
$mail->Password = 'password';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('amsserver.noreply@gmail.com','伺服器列表驗證系統');
$mail->addAddress($address);
$mail->addAddress($address);
$mail->addReplyTo('');
$mail->addCC('amsserver.noreply@gmail.com');
$mail->addBCC('amsserver.noreply@gmail.com');

$mail->isHTML(true);

$mail->Subject = '伺服器列表驗證系統';
$mail->Body    = '
<!DOCTYPE>
<html lang="zh_TW">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>伺服器列表驗證系統</title>
</head>
<body>
<div style="width: 100%; font-family: 微軟正黑體, Helvetica, sans-serif; font-size: 12px;">
點擊驗證 <a href="https://server.wartw.top/v?v='.$v.'&id='.$id.'">https://server.wartw.top/v?v='.$v.'&id='.$id.'</a>
<br>本電子郵件無法個別對玩家進行回復，有問題請至<a href="https://forum.gamer.com.tw/C.php?bsn=18673&snA=159343&subbsn=0" target="_blank">巴哈文章</a>提出問題詢問。</div>
</body>
</html>';
$mail->AltBody = '';

if(!$mail->send()){
    $_SESSION['msg'] = 'mail_error';
}else{
    $_SESSION['msg'] = 'mail_ok';
}
}

?>
<script>document.location.href="../dashboard";</script>
