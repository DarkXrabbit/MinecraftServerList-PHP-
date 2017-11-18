<script>
document.body.onkeydown=window.onkeydown=function(e){
var keyCode;
if((event.keyCode==8)||(event.keyCode==116)){
    event.keyCode=0;
    event.returnValue=false;
    document.getElementById('show').style = "display :block";
    document.getElementById('show2').innerHTML = "<li>禁止使用F5</li>";
}
if((event.ctrlKey)&&(event.keyCode==82)){
    event.keyCode=0;
    event.returnValue=false;
    document.getElementById('show').style = "display :block";
    document.getElementById('show2').innerHTML = "<li>禁止使用Ctrl+R</li>";
}
}
</script>
<?php
include("header.php");
include("sql.inc.php");

$id = $_POST['account'];
$pw = $_POST['password'];
$nick = $_POST['nick'];
$email = $_POST['email'];
$address = $_POST['email'];

$_SESSION['reg_id'] = $id;
$_SESSION['reg_pw'] = $pw;
$_SESSION['reg_nick'] = $nick;
$_SESSION['reg_email'] = $email;
?>
<div class="container">
<div class="mdl-dialog__content">
<div class="alert alert-info">請確認以下資訊。</div>
<div class="alert alert-danger" id="show" style="display: none"><h1>頁面讀取時，請不要嘗試重新整理。<ul id="show2"></ul></h1></div>
<div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate" style="display: none;width:100%"></div>
<div class="jumbotron">
<table class="table">
<tr>
<td>
帳號 <b><?php echo $id; ?></b>
</td>
</tr>
<tr>
<td>
電子郵件 <b><?php echo $email; ?></b>
</td>
</tr>
<tr>
<td>
暱稱 <b><?php echo $nick; ?></b>
</td>
</tr>
</table>
<hr>
<h3>確認後，按下確定註冊鍵。</h3>
<label class="control-label">註冊後表示您將同意本網站之<a href="../tos" target="_blank">服務條款</a></label>
<br>
<button id="sbmit" class="btn btn-success" onclick="lock()">確定註冊</button>
<button class="btn btn-outline-danger" onclick="history.back()">返回註冊</button>
<script>
function lock(){
    document.getElementById('sbmit').className = "btn btn-danger disabled";
	document.getElementById('sbmit').value = "請等待...";
    document.getElementById('show').style = "display :block";
    document.getElementById('p2').style = "display :block;width:100%";
    document.getElementById('sbmit').style = "display :none";
    document.location.href="register_action";
}
</script>
</div>
</main>
</div>		  	  
</div>		  	  
</body>
</html>