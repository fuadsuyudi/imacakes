<?php
include 'session.php';
if($_SESSION['forefinger']!='')
{
	if(isset($_POST['submitObject']))
	{
		if(!empty($_POST['id']) && isset($_POST['id']) && $_POST['id'] != undefined){

			$objectQuery=mysql_query("UPDATE object_master SET 
										object_name='".$_POST['objectNama']."', 
										object_floor='".$_POST['objectFloor']."', 
										object_loc='".$_POST['objectLokasi']."', 
										icon_id='".$_POST['icon']."' ,
										object_pin_in='".$_POST['object_pin_in']."' ,
										object_pin_out='".$_POST['object_pin_out']."' ,
										object_i2c_in='".$_POST['object_i2c_in']."' ,
										object_i2c_output='".$_POST['object_i2c_output']."' 
										WHERE object_id='".$_POST['id']."'");

		}else{
			$classNumQuery = mysql_query( "SELECT MAX(class_num)+1 as class_num FROM object_master");
			$classNum=mysql_fetch_array($classNumQuery);
			$objectQuery=mysql_query("INSERT INTO object_master
									            (object_pin_out,
									             object_i2c_output,
									             object_pin_in,
									             object_i2c_in,
									             object_name,
									             object_floor,
									             object_loc,
									             icon_id,
									             class_id,
									             class_num)
									VALUES ('".$_POST['object_pin_out']."',
									        '".$_POST['object_i2c_output']."',
									        '".$_POST['object_pin_in']."',
									        '".$_POST['object_i2c_in']."',
									        '".$_POST['objectNama']."',
									        '".$_POST['objectFloor']."',
									        '".$_POST['objectLokasi']."',
									        '".$_POST['icon']."',
									        ( SELECT default_class_object FROM other_header ) ,
									        '{$classNum['class_num']}');");

			$_POST['id'] = mysql_insert_id(); 

		}
		if($objectQuery==true)
		{
			$getObjectMaster=mysql_query("select class_num,class_id from object_master where object_id='".$_POST['id']."'");
			while($rowObjectMaster=mysql_fetch_array($getObjectMaster))
			{
				$checkClassData=mysql_query("select * from class_data where class_num='".$rowObjectMaster['class_num']."'");
				if(mysql_num_rows($checkClassData) < 1){
					foreach ($_POST['char_id'] as $key => $value) {
						$proses=mysql_query("insert into class_data ( class_id, class_num, char_id, char_data) values ('".$rowObjectMaster['class_id']."', '".$rowObjectMaster['class_num']."','".$key."','".$value."')");
					}
				}else{
					foreach ($_POST['char_id'] as $key => $value) {
						$proses=mysql_query("update class_data set char_data='".$value."' where class_id='".$rowObjectMaster['class_id']."' and class_num='".$rowObjectMaster['class_num']."' and char_id='".$key."'");
					}
				}
			}
		}
		if($pesan=='gagal')
		{
			$pesan=base64_encode("inputFail");
			header("location:object.php?err=".$pesan);
		}
		else
		{
			$pesan=base64_encode("inputSuccess");
			header("location:object.php?err=".$pesan);
		}
	}else if(isset($_POST['submitSchedule'])){
		$splitDate = explode(', ', $_POST['scheduleStartDate']);
		$startDate =  $splitDate[1]." ".$_POST['scheduleStartTime']; 

		$splitDate = explode(', ', $_POST['scheduleEndDate']);
		$endDate =  $splitDate[1]." ".$_POST['scheduleEndTime']; 

			if($_POST['scheduleID'] != ""){
				$sched_id = $_POST['scheduleID'];
				$deleteQuery = mysql_query( "DELETE FROM `sched_master` WHERE sched_id = '{$sched_id}'"); ;
			}else{
				$classNumQuery = mysql_query( "SELECT MAX(sched_id)+1 as sched_id FROM sched_master");
				$sched=mysql_fetch_array($classNumQuery);
				$sched_id = $sched['sched_id'];
			}
		$index = 0;
		while( $index <= count($_POST['objectList']) )
		{
				if(!empty($_POST['objectList'][$index][0]) && !empty($_POST['objectList'][$index][1]) && !empty($_POST['objectList'][$index][2]) )
				{
					$insert = mysql_query("
								INSERT INTO `sched_master`(`sched_id`, `sched_name`, `sched_start_on`, `sched_end_on`, `object_id`, `object_start_on`, `object_end_on`, `profile_id`, `changed_on`, `changed_by`) 
								VALUES ('{$sched_id}','{$_POST['scheduleDesc']}','{$startDate}','{$endDate}','{$_POST['objectList'][$index][0]}','{$_POST['objectList'][$index][1]}','{$_POST['objectList'][$index][2]}','{$_POST['activeProfile']}',NOW(),'{$_SESSION['forefinger']}')
						");
					if($insert==false)
					{
						$pesan='gagal';
					}
				}
			$index++;
		}
		if($pesan=='gagal')
		{
			$pesan=base64_encode("inputFail");
		}
		else
		{
			$pesan=base64_encode("inputSuccess");
		}
		header("location:halaman_utama.php?err=".$pesan);
	}
	else if(isset($_POST['submitUser']))
	{
		$cek=mysql_query("select * from user_master where user_id='".$_POST['userid']."'");
		if(mysql_num_rows($cek)=='')
		{
			if($_POST['objset']=='on')
			{
				$_POST['objset']=1;
			}
			else
			{
				$_POST['objset']=0;
			}
			if($_POST['profset']=='on')
			{
				$_POST['profset']=1;
			}
			else
			{
				$_POST['profset']=0;
			}
			if($_POST['userset']=='on')
			{
				$_POST['userset']=1;
			}
			else
			{
				$_POST['userset']=0;
			}
			if(isset($_POST['objectList'])){
				$objectList = implode(',', $_POST['objectList']);
			}
			echo $insert=mysql_query("insert into user_master (user_id, cust_name, auth_set_object, auth_set_profile, auth_set_user, object_id, changed_on, changed_by) values ('".$_POST['userid']."', '".$_POST['username']."','".$_POST['objset']."','".$_POST['profset']."','".$_POST['userset']."', '{$objectList}' ,'".date("Y-m-d H:i:s")."', '".$_SESSION['forefinger']."')");
			if($insert==true)
			{
				$cekPass=mysql_query("select * from other_header");
				$rowCekPass=mysql_fetch_array($cekPass);
				$insertPass=mysql_query("insert into user_password (user_id, user_pass_satu, user_pass_dua, changed_on, changed_by) values ('".$_POST['userid']."','".$rowCekPass['user_pass_dua']."','".$rowCekPass['user_pass_dua']."','".date("Y-m-d H:i:s")."', '".$_SESSION['forefinger']."')");
				if($insertPass==true)
				{
					$pesan=base64_encode("inputSuccess");
				}
				else
				{
					$pesan=base64_encode("inputFail");
				}
				header("location:user.php?err=".$pesan);
			}
			else
			{
				$pesan=base64_encode("inputFail");
				header("location:user.php?err=".$pesan);
			}
		}
		else
		{
			$pesan=base64_encode("userDuplicate");
			header("location:user.php?err=".$pesan);
		}
	}
	else if(isset($_POST['submitEditUser']))
	{
			if($_POST['objset']=='on')
			{
				$_POST['objset']=1;
			}
			else
			{
				$_POST['objset']=0;
			}
			if($_POST['profset']=='on')
			{
				$_POST['profset']=1;
			}
			else
			{
				$_POST['profset']=0;
			}
			if($_POST['userset']=='on')
			{
				$_POST['userset']=1;
			}
			else
			{
				$_POST['userset']=0;
			}
			if(isset($_POST['objectList'])){
				$objectList = implode(',', $_POST['objectList']);
			}
			$insert=mysql_query("update user_master set cust_name='".$_POST['username']."', object_id = '{$objectList}' , auth_set_object='".$_POST['objset']."', auth_set_profile='".$_POST['profset']."', auth_set_user='".$_POST['userset']."', changed_on='".date("Y-m-d H:i:s")."', changed_by='".$_SESSION['forefinger']."' where user_id='".$_POST['userid']."'");
			if($insert==true)
			{
				$cekPass=mysql_query("select * from other_header");
				$rowCekPass=mysql_fetch_array($cekPass);
				$insertPass=mysql_query("update user_password set user_pass_satu='".$rowCekPass['user_pass_dua']."', user_pass_dua='".$rowCekPass['user_pass_dua']."', changed_on='".date("Y-m-d H:i:s")."', changed_by='".$_SESSION['forefinger']."' where user_id='".$_POST['userid']."'");
				if($insertPass==true)
				{
					$pesan=base64_encode("inputSuccess");
				}
				else
				{
					$pesan=base64_encode("inputFail");
				}
				header("location:user.php?err=".$pesan);
			}
			else
			{
				$pesan=base64_encode("inputFail");
				header("location:user.php?err=".$pesan);
			}
	}
	else if(isset($_POST['submitProfile']))
	{
		if($_POST['sunday']=='on')
		{
			$_POST['sunday']='1';
		}
		else
		{
			$_POST['sunday']='0';
		}
		if($_POST['monday']=='on')
		{
			$_POST['monday']='1';
		}
		else
		{
			$_POST['monday']='0';
		}
		if($_POST['tuesday']=='on')
		{
			$_POST['tuesday']='1';
		}
		else
		{
			$_POST['tuesday']='0';
		}
		if($_POST['wednesday']=='on')
		{
			$_POST['wednesday']='1';
		}
		else
		{
			$_POST['wednesday']='0';
		}
		if($_POST['thursday']=='on')
		{
			$_POST['thursday']='1';
		}
		else
		{
			$_POST['thursday']='0';
		}
		if($_POST['friday']=='on')
		{
			$_POST['friday']='1';
		}
		else
		{
			$_POST['friday']='0';
		}
		if($_POST['saturday']=='on')
		{
			$_POST['saturday']='1';
		}
		else
		{
			$_POST['saturday']='0';
		}
		$getId=mysql_query("select * from profile_master group by profile_id order by profile_id desc");
		$rowGetId=mysql_fetch_array($getId);
		$id=$rowGetId['profile_id']+1;
		$object=mysql_query("select * from object_master where object_floor !='' order by object_floor, object_loc, object_name");
		$mulai=1;
		while($rowObject=mysql_fetch_array($object))
		{
			if($_POST[$rowObject['object_id']]=='on')
			{
				$insert=mysql_query("insert into profile_master (profile_name, sunday, monday, tuesday, wednesday, thursday, friday, saturday, time_active, object_id, object_action) values ('".$_POST['prof_desc']."','".$_POST['sunday']."','".$_POST['monday']."','".$_POST['tuesday']."','".$_POST['wednesday']."','".$_POST['thursday']."','".$_POST['friday']."','".$_POST['saturday']."','".$_POST['jam']."','".$rowObject['object_id']."','".$_POST['nilai'.$mulai]."')");
				if($insert==false)
				{
					$pesan='gagal';
				}
			}
			$mulai++;
		}
		if($pesan=='gagal')
		{
			$pesan=base64_encode("inputFail");
		}
		else
		{
			$pesan=base64_encode("inputSuccess");
		}
		header("location:profile.php?err=".$pesan);
	}
	else if(isset($_POST['submitEditProfile']))
	{
		if($_POST['sunday']=='on')
		{
			$_POST['sunday']='1';
		}
		else
		{
			$_POST['sunday']='0';
		}
		if($_POST['monday']=='on')
		{
			$_POST['monday']='1';
		}
		else
		{
			$_POST['monday']='0';
		}
		if($_POST['tuesday']=='on')
		{
			$_POST['tuesday']='1';
		}
		else
		{
			$_POST['tuesday']='0';
		}
		if($_POST['wednesday']=='on')
		{
			$_POST['wednesday']='1';
		}
		else
		{
			$_POST['wednesday']='0';
		}
		if($_POST['thursday']=='on')
		{
			$_POST['thursday']='1';
		}
		else
		{
			$_POST['thursday']='0';
		}
		if($_POST['friday']=='on')
		{
			$_POST['friday']='1';
		}
		else
		{
			$_POST['friday']='0';
		}
		if($_POST['saturday']=='on')
		{
			$_POST['saturday']='1';
		}
		else
		{
			$_POST['saturday']='0';
		}
		$object=mysql_query("select * from object_master where object_floor !='' order by object_floor, object_loc, object_name");
		$mulai=1;
		while($rowObject=mysql_fetch_array($object))
		{
			if($_POST[$rowObject['object_id']]=='on')
			{
				$cek=mysql_query("select * from profile_master where object_id='".$rowObject['object_id']."' and profile_id='".$_POST['id']."'");
				if(mysql_num_rows($cek)>0)
				{
					$insert=mysql_query("update profile_master set profile_name='".$_POST['profDesc']."', sunday='".$_POST['sunday']."', monday='".$_POST['monday']."', tuesday='".$_POST['tuesday']."', wednesday='".$_POST['wednesday']."', thursday='".$_POST['thursday']."', friday='".$_POST['friday']."', saturday='".$_POST['saturday']."', time_active='".$_POST['jam']."' , object_action='".$_POST['nilai'.$mulai]."' where object_id='".$rowObject['object_id']."' and profile_id='".$_POST['id']."'");
				}
				else
				{
					$insert=mysql_query("insert into profile_master (profile_id, profile_name, sunday, monday, tuesday, wednesday, thursday, friday, saturday, time_active, object_id, object_action) values ('".$_POST['id']."','".$_POST['profDesc']."','".$_POST['sunday']."','".$_POST['monday']."','".$_POST['tuesday']."','".$_POST['wednesday']."','".$_POST['thursday']."','".$_POST['friday']."','".$_POST['saturday']."','".$_POST['jam']."','".$rowObject['object_id']."','".$_POST['nilai'.$mulai]."')");
				}				
			}
			else
			{
				$insert=mysql_query("delete from profile_master where object_id='".$rowObject['object_id']."' and profile_id='".$_POST['id']."'");
			}
			if($insert==false)
				{
					$pesan='gagal';
				}
			$mulai++;
		}
		if($pesan=='gagal')
		{
			$pesan=base64_encode("inputFail");
		}
		else
		{
			$pesan=base64_encode("inputSuccess");
		}
		header("location:profile.php?err=".$pesan);
	}
}
else
{
	header("location:logout.php");
}
?>