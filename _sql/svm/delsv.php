<?php
session_start();
include('sql.inc.php');
@$no = $_GET['no'];
@$owner = $_SESSION['nick'];

if ($_SESSION['admin'] == '1'){
$sql = "DELETE FROM `svList_list` WHERE No = $no";
$sql2 = "SELECT * FROM `svList_list` WHERE No = $no";
}else{
$sql = "DELETE FROM `svList_list` WHERE No = $no AND owner = '$owner'";
$sql2 = "SELECT * FROM `svList_list` WHERE No = $no AND owner = '$owner'";
}
@$rest = mysql_query($sql2);
@$row = mysql_fetch_row($rest);
if ($row[0] == null){
$_SESSION['msg'] = "warningeditsv";
}else{
if(mysql_query($sql)){
	$_SESSION['msg'] = "delsvok";
	}else{
$_SESSION['msg'] = "delsvno";
}
}
header("Location: index"); 
exit;
