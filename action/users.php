<main class="mdl-layout__content mdl-color--grey-100">
<div class="mdl-dialog__content">
<?php
include('sql.inc.php');
if(@$_SESSION['admin'] == null OR @$_SESSION['admin'] == 0){
$_SESSION['msg'] = "nopex";
?>
<script>document.location.href="../index";</script>
<?php
}else{
	$id = $_SESSION['nick'];
	//統計
	@$rows = mysql_query("SELECT * FROM svList_account ORDER By No DESC");	
	@$total = mysql_num_rows($rows);
	//頁數啟用
	$show = ceil($total/15);
	if(empty($page))$page=1;
	$start=15*($page-1);
	@$page=$_GET["page"];
	if(empty(@$page))@$page=1;
	$start=15*(@$page-1);
	@$sql2 = "SELECT * FROM svList_account ORDER By No DESC limit $start,15";
	$result2 = mysql_query($sql2);
		?>
<div class="table-responsive">
<table class="table table-striped table-bordered">
	  <thead>
		<tr>
		  <th>#</th>
		  <th>帳號</th>
		  <th>暱稱</th>
		  <th>EMail</th>
		  <th>是否驗證</th>
		  <th>管理員</th>
		  <th>忘記密碼</th>
		  <th>違規次數</th>
          <th>帳號狀態</th>
		  <th>忘記密碼</th>
		  <th>人工審核</th>
		  <th>編輯</th>
		  <th>移除</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php
	if ($result2 != null) {
	while($row2 = mysql_fetch_row($result2))
	{
		if ($row2[5] == 0){
			$row2[5] = '已驗證';
		}else{
			$row2[5] = '未驗證';
		}
		if ($row2[6] == 0){
			$row2[6] = '否';
		}else{
			$row2[6] = '是';
		}
		if ($row2[7] == 0){
			$row2[7] = '無申請';
		}
		if ($row2[8] == 0){
			$row2[8] = '無違規';
		}else{
			$row2[8] = $row2[8].'次';
		}
        if ($row2[9] == 0){
            $row2[9] = '正常';
        }else{
            $row2[9] = '已鎖定';
        }
	  echo '
		<tr>
		  <td>'.$row2[0].'</td>
		  <td>'.$row2[1].'</td>
		  <td>'.$row2[3].'</td>
		  <td>'.$row2[4].'</td>
		  <td>'.$row2[5].'</td>
		  <td>'.$row2[6].'</td>
		  <td>'.$row2[7].'</td>
		  <td>'.$row2[8].'</td>
		  <td>'.$row2[9].'</td>
		  ';?>
		  <td><button type="button" class="btn btn-outline-danger " onclick="location.href='_sql/forgot_pw_admin.php?id=<?php echo $row2[1];?>&email=<?php echo $row2[4];?>'">傳送</button></td>
		  <td><button type="button" class="btn btn-outline-success" onclick="location.href='_sql/person_v.php?n=<?php echo $row2[0];?>'">驗證</button></td>
		  <td><button type="button" class="btn btn-outline-primary" onclick="location.href='?edit=true&n=<?php echo $row2[0];?>'">編輯</button></td>
		  <td><button class="btn btn-danger" onclick="delcomfirm<?php echo $row2[0];?>();">
			移除
		  </button></td>
		</tr>
		<script>
		function delcomfirm<?php echo $row2[0];?>(){
		if(confirm("請問你要移除《<?php echo $row2[1]?>》嗎？"))
		{
		document.location.href='_sql/delp?no=<?php echo $row2[0];?>';
		}
		else
		{
		return false;
		}
		}
		</script>
		<?php
	}
	}
	  ?>

	  </tbody>
	</table>
</div>
</div>
<a name="editp"></a>
<?php if (@$_GET['edit'] == 'true'){
	include('editp.php');
}
?>
<!-- ##頁數功能## -->
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
  <li class="page-item <?php if ($page == 1) {echo 'disabled';}?>" ><a class="page-link" href="?page=1">«</a></li>
<?php
$pages = ceil($total/15);
for( $i=1 ; $i<=$pages ; $i++ ) {
if ( $page-3 < $i && $i < $page+5) {
?>
<li class="page-item <?php if ($page == $i) { echo "active"; }?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
<?php
}
} 
if($show>=3){
    ?>
    <li class="page-item <?php if ($page == $show) {echo 'disabled';}?>"><a class="page-link" href="?page=<?php echo $show;?>">»</a></li>
    <?php
}
}
?>
  </ul>
</nav>
<!-- ##頁數功能## -->
</main>