<?php
	error_reporting(0);
	session_start();
	include 'connect_db.php';
	$cek_user=mysql_query("select * from user_master where user_id='".$_SESSION['forefinger']."'");
	$row_cek_user=mysql_fetch_array($cek_user);
?>