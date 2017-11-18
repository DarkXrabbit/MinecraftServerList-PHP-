<main class="mdl-layout__content mdl-color--grey-100">
<div class="mdl-dialog__content">
<h2>管理者寄信系統</h2>
<?php
include('sql.inc.php');
if(@$_SESSION['admin'] == null OR @$_SESSION['admin'] == 0){
$_SESSION['msg'] = "nopex";
}else{

require 'phpmailer/PHPMailerAutoload.php';
ignore_user_abort();
set_time_limit(0);
$result0 = mysql_query("SELECT * FROM svList_account");
while ($row = mysql_fetch_row($result0)){
$id = $row[3];
$address = $row[4];
$sv = "SELECT * FROM svList_list WHERE owner = '$id'";
$result = mysql_query($sv);
$rows = mysql_fetch_row($result);

$mail = new PHPMailer;
$mail->SMTPDebug = 0; 
$mail->isSMTP(true);
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

$mail->Subject = '伺服器列表提醒信';
$mail->Body    = '
<!DOCTYPE>
<html lang="zh_TW">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>伺服器列表提醒信</title>
</head>
<body>
<div style="width: 100%; font-family: 微軟正黑體, Helvetica, sans-serif; font-size: 12px;">
您的帳號'.$rows[1].'於本網站'.$rows[10].'註冊，請回來查看您的伺服器是否正常運作！<br>
若有任何問題，請至<a href="https://forum.gamer.com.tw/C.php?bsn=18673&snA=159343&subbsn=0" target="_blank">巴哈文章</a>提出問題詢問。<br>
</div>
</body>
</html>';
$mail->AltBody = '';
if(!$mail->Send()){
echo "寄信發生錯誤：" . $mail->ErrorInfo;
}else{
$_SESSION['msg'] = 'mail_ok';
}
echo $row[4].'<br>';
}
}
?>
<div id="a"></div>
</div>
</main>