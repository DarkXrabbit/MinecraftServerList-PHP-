<?php
include('sql.inc.php');
$rows = mysql_query("SELECT * FROM svList_list WHERE enable = 1");
$total = mysql_num_rows($rows);
$show = ceil($total/10);
if(empty($page))$page=1;
$start=10*($page-1);
@$page=$_GET["page"];
if(empty(@$page))@$page=1;
$start=10*(@$page-1);
$sql2 = "SELECT * FROM svList_list WHERE enable = 1 limit $start,10";
$result2 = mysql_query($sql2);
if ($total != '0') {
while($row2 = mysql_fetch_row($result2))
{
	$serverip = $row2[2];
	$serverport = $row2[3];
	if ($serverport == '25565'){
	$status = json_decode(file_get_contents('https://mcapi.us/server/status?ip=' . $serverip));
	}else{
	$status = json_decode(file_get_contents('https://mcapi.us/server/status?ip=' . $serverip . '&port=' . $serverport));
	}
	$offline = @$status->offline;
	if($offline == 'true'){
		$svon = '<font color="red">離線</font>';
	}else{
		$svon = '<font color="green">線上</font>';
	}
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
	
	$svList->no = $row2[0];
	$svList->name = $row2[1];
	$svList->ip = $row2[2].$row[3];
	$svList->ver = $row2[7];
	$svList->status = $svon;
	
	$json = json_encode($svList);
	print_r($json);
}
}