<?php
$db_server = "localhost"; #資料庫位置 預設localhost
$db_name = "database"; #資料庫
$db_user = "account"; #帳號
$db_passwd = "password"; #密碼
if(!@mysql_connect($db_server, $db_user, $db_passwd))
        die("無法對資料庫連線");
mysql_query("SET NAMES utf8");
if(!@mysql_select_db($db_name))
        die("無法使用資料庫");
?> 