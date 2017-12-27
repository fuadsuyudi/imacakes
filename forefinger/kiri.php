<a href="halaman_utama.php"><div id="contentLogo">
    
</div></a>
<div id="contentSetting">
<?php
if($row_cek_user['auth_set_object']=='1')
{
	?>
	<a href="object.php"><div class="contentMenu" id="menu1">Object Setting</div></a>
	<?php
}
if($row_cek_user['auth_set_profile']=='1')
{
	?>
	<a href="profile.php"><div class="contentMenu" id="menu2">Profile Setting</div></a>
	<?php
}
if($row_cek_user['auth_set_user']=='1')
{
	?>
	<a href="user.php"><div class="contentMenu" id="menu3">User Setting</div></a>
	<?php
}
?>
    <a href="logout.php"><div class="contentMenu">Logout</div></a>
</div>