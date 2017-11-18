<?php include('sql.inc.php');
if(!empty($_SERVER['HTTP_CLIENT_IP'])){
   $ip = $_SERVER['HTTP_CLIENT_IP'];
}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
   $ip= $_SERVER['REMOTE_ADDR'];
}
if ($ip == '220.133.245.5'){
	echo '<script>document.location.href="https://google.com";</script>';
}
?>
<style>
.demo-card-wide.mdl-card {
  width: 600px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 150px;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>
<main class="mdl-layout__content mdl-color--grey-100">
<div class="mdl-dialog__content">
<div class="alert alert-info" role="alert">
您好!
現在這個網站已經開放給予玩家、服主，建立自己的伺服器資訊！歡迎使用看看！<br>
本網站為阿任架設、維護、製作。有部分缺失敬請見諒。<br>
也提供手機版PE伺服器偵測！<br>
網站完成進度：<b>差不多完成惹! 有任何意見歡迎使用REPORT蟲蟲給我看看唷~</b><br>
網站正常執行中，若有任何Bug、意見，歡迎至<a href="https://forum.gamer.com.tw/C.php?bsn=18673&snA=159343" target="_blank">巴哈文章</a>提出。<br>
<font color="red" size="4"><b>請不要使用任何違法的行為進行瀏覽網站資料，詳細請看<a href="https://www.facebook.com/asuna.michael/posts/1711285305557195" target="_blank">我的文章</a>，違法已確認者，將會在進入網站時直接導向<a href="https://google.com">Google.com</a>，請各位服主/玩家們配合，謝謝。</b></font>
</div>
<?php
include('sql.inc.php');
$rows = mysql_query("SELECT * FROM svList_list WHERE enable = 1");
$total = mysql_num_rows($rows);
$show = ceil($total/8);
if(empty($page))$page=1;
$start=8*($page-1);
@$page=$_GET["page"];
if(empty(@$page))@$page=1;
$start=8*(@$page-1);
$sql2 = "SELECT * FROM svList_list WHERE enable = 1 limit $start,8";
$result2 = mysql_query($sql2);
?>
<h2>已申請伺服器列表(<?php echo $page;?>/<?php echo $show;?>)<small>表格可移動</small></h2>
<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>查看</th>      
      <th>伺服器名稱</th>
      <th>連線位置</th>
      <th>版本</th>
      <th>類型</th>
      <th>註冊日期</th>
    </tr>
  </thead>
  <tbody>
<?php
if ($total != '0') {
while($row2 = mysql_fetch_row($result2))
{
$serverip = $row2[2];
$serverport = $row2[3];

    $ty = $row2[8];
	if ($ty == 1){
		$ty = '插件';
	}elseif ($ty == 2){
		$ty = '模組';
	}elseif ($ty == 3){
		$ty = '官方';
	}elseif ($ty == 4){
		$ty = '綜合';
	}elseif ($ty == 5){
	   $ty = 'PE';
	}elseif ($ty == 6){
	   $ty = '小遊戲';
	}
	if ($row2[3] == '25565'){
	$row2[3] = null;
	}else{
	$row2[3] = ':'.$row2[3];
	}
	if ($row2[12] == 0){
	$row2[2] = $row2[13];
	}
  echo '
    <tr>
    ';?>
      <td><button class="btn btn-outline-primary" onclick="location.href='infosv?no=<?php echo $row2[0] ;?>'">查看</button></td>
    <?php echo'
      <td style="height:60px"><b><center>'.$row2[1].'</center></b></td>
      <td style="height:60px">'.$row2[2].$row2[3].'</td>
      <td style="height:60px">'.$row2[7].'</td>
      <td style="height:60px">'.$ty.'伺服</td>
      <td style="height:60px">'.$row2[10].'</td>
    </tr>';
}
}?>
  </tbody>
</table>
</div>
<!-- ##頁數功能## -->
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center pagination-lg">
  <li class="page-item <?php if ($page == 1) {echo 'disabled';}?>" ><a class="page-link" href="?page=1">Prev</a></li>
<?php
$pages = ceil($total/8);
for( $i=1 ; $i<=$pages ; $i++ ) {
if ( $page-2 < $i && $i < $page+7) {
?>
<li class="page-item <?php if ($page == $i) { echo "active"; }?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
<?php
}
} 
if($pages>3){
    ?>
    <li class="page-item <?php if ($page == $show) {echo 'disabled';}?>"><a class="page-link" href="?page=<?php echo $show;?>">Last</a></li>
    <?php
}
?>
  </ul>
</nav>
<!-- ##頁數功能## -->

<?php include('ad.php'); ?>
</div>
</main>