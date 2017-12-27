<?php
include 'session.php';
if($_SESSION['forefinger']!='')
{
	if($_GET['do']=='on')
	{
		$_GET['do']=1;
	}
	else
	{
		$_GET['do']=0;
	}
	$cek=mysql_query("select * from object_status where object_id='".$_GET['id']."'");
	if(mysql_num_rows($cek)==0)
	{
		$update=mysql_query("insert into object_status (object_id, active_ind) values ('".$_GET['id']."','".$_GET['do']."')");
	}
	else
	{
		$update=mysql_query("update object_status set active_ind='".$_GET['do']."' where object_id='".$_GET['id']."'");
	}
}
else
{
	header("location:logout.php");
}
?>