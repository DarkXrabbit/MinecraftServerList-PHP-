<?php
include("sql.inc.php");
echo '
<main class="mdl-layout__content mdl-color--grey-100">
<div class="mdl-dialog__content">
';
$id = $_SESSION['nick'];
$acc = "SELECT * FROM svList_account WHERE nick = '$id'";
$result1 = mysql_query($acc);
$rowss = mysql_fetch_row($result1);
if ($rowss[8] == 10){
    mysql_query("UPDATE `svList_account` SET `locked`= 1 WHERE nick = '$id'");
$address = $rowss[4];
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->SMTPDebug = 0; 
$mail->isSMTP(true);
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'amsserver.noreply@gmail.com';
$mail->Password = 'password';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('amsserver.noreply@gmail.com','伺服器列表警告系統');
$mail->addAddress($address);
$mail->addAddress($address);
$mail->addReplyTo('');
$mail->addCC('amsserver.noreply@gmail.com');
$mail->addBCC('amsserver.noreply@gmail.com');

$mail->isHTML(true);

$mail->Subject = '伺服器列表 - 帳戶狀態';
$mail->Body    = '
<!DOCTYPE>
<html lang="zh_TW">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>伺服器列表帳戶狀態</title>
</head>
<body>
<div style="width: 100%; font-family: 微軟正黑體, Helvetica, sans-serif; font-size: 12px;">
您的帳戶：'.$rowss[1].'<br>
目前已經被<font color="red">強制鎖定</font>，若有任何問題，請至<a href="https://forum.gamer.com.tw/C.php?bsn=18673&snA=159343&subbsn=0" target="_blank">巴哈文章</a>提出問題詢問。<br>
若解鎖後又違規，將直接移除帳戶。
</div>
</body>
</html>';
$mail->AltBody = 'Test';
if($mail->send()){
$_SESSION['msg'] = 'accountlock';
}

if(!$mail->Send()){
echo "寄信發生錯誤：" . $mail->ErrorInfo;
}
else{ 
$_SESSION['msg'] = 'accountlock';
}

}

unset($_SESSION['name']);
unset($_SESSION['nick']);
unset($_SESSION['admin']);
unset($_SESSION['web']);
unset($_SESSION['msg']);
session_destroy();
?>
<meta http-equiv="refresh" content="0;url=index" />
</div>
</main>
