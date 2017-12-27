<?php
//object_id, active or no (0,1), user_id
$output=shell_exec("/var/www/F01-01-10 '".$_GET['object_id']."' '".$_GET['param']."' '".$_GET['user_id']."'");
//output 0 dan 1
//0 berhasil, 1 gagal
//die("/var/www/F01-01-10 '".$_GET['object_id']."' '".$_GET['param']."' '".$_GET['user_id']."'");
echo $output;

// update profile 
// parram 0 profile_id user_id
// update object status 
// parram object_id status user_id
// schedule
// param (schedule_id+1000) status user_id
?>