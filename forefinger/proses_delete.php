<?php
include 'session.php';
if($_SESSION['forefinger']!='')
{
	if($_GET['part']=='object')
	{
		$updateObject=mysql_query("update object_master set object_name='', object_floor='', object_loc='', icon_id='', object_cat='S' where object_id='".$_GET['id']."'");
		if($updateObject==true)
		{
			$getClassId=mysql_query("select * from object_master where object_id='".$_GET['id']."'");
			$rowGetClassId=mysql_fetch_array($getClassId);
			$listClassMaster=mysql_query("select * from class_master where class_id='".$rowGetClassId['class_id']."'");
			while($rowListClassMaster=mysql_fetch_array($listClassMaster))
			{
				$proses=mysql_query("update class_data set char_data='' where class_id='".$rowGetClassId['class_id']."' and class_num='".$rowGetClassId['class_num']."' and char_id='".$rowListClassMaster['char_id']."'");
				if($proses==false)
				{
					$pesan='gagal';
				}
			}
		}
		if($pesan=='gagal')
		{
			$pesan=base64_encode("deleteFail");
			header("location:object.php?err=".$pesan);
		}
		else
		{
			$pesan=base64_encode("deleteSuccess");
			header("location:object.php?err=".$pesan);
		}
	}
	else if($_GET['part']=='user')
	{
		$delete=mysql_query("delete from user_master where user_id='".$_GET['id']."'");
		if($delete==true)
		{
			$delete2=mysql_query("delete from user_password where user_id='".$_GET['id']."'");
			if($delete2==true)
			{
				$pesan=base64_encode("deleteSuccess");
				header("location:user.php?err=".$pesan);
			}
			else
			{
				$pesan=base64_encode("deleteFail");
				header("location:user.php?err=".$pesan);
			}
		}
		else
		{
			$pesan=base64_encode("deleteFail");
			header("location:user.php?err=".$pesan);
		}
	}
	else if($_GET['part']=='profile')
	{
		$delete=mysql_query("delete from profile_master where profile_id='".$_GET['id']."'");
		if($delete==true)
		{
			$delete2=mysql_query("delete from profile_status where profile_id='".$_GET['id']."'");
			if($delete2==true)
			{
				$pesan=base64_encode("deleteSuccess");
				header("location:profile.php?err=".$pesan);
			}
			else
			{
				$pesan=base64_encode("deleteFail");
				header("location:profile.php?err=".$pesan);
			}
		}
		else
		{
			$pesan=base64_encode("deleteFail");
			header("location:profile.php?err=".$pesan);
		}
	}
	else if($_GET['part']=='schedule')
	{
		$delete=mysql_query("delete from sched_master where sched_id='".$_GET['id']."'");
		if($delete==true)
		{
			$delete2=mysql_query("delete from sched_status where sched_id='".$_GET['id']."'");
			if($delete2==true)
			{
				$pesan=base64_encode("deleteSuccess");
				header("location:halaman_utama.php?err=".$pesan);
			}
			else
			{
				$pesan=base64_encode("deleteFail");
				header("location:halaman_utama.php?err=".$pesan);
			}
		}
		else
		{
			$pesan=base64_encode("deleteFail");
			header("location:halaman_utama.php?err=".$pesan);
		}
	}
}
else
{
	header("location:logout.php");
}
?>