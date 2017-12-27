<?php
include 'session.php';
if($_SESSION['forefinger']!='')
{
	if($_GET['do']=='gantiStatus')
	{
		?>
		<div class="subJudul">
            Floor #<?php echo $_GET['lantai']?>
        </div>
        <div class="subJudul">
            <?php echo $_GET['nama'];?>
        </div>
        <div class="entryRight">
        <?php
        $list=mysql_query("select * from object_master a left join object_status b on a.object_id=b.object_id where a.object_loc='".$_GET['nama']."' and a.object_floor='".$_GET['lantai']."'");
        while($rowList=mysql_fetch_array($list))
        {
            if($rowList['active_ind']=='1')
            {
                ?>
                <div class="statusActive"><?php echo $rowList['object_id'].'-'.$rowList['object_cat'];?>&nbsp;&nbsp;&nbsp;<?php echo $rowList['object_name'];?></div>
                <?php
            }
            else
            {
                ?>
                <div class="statusOff"><?php echo $rowList['object_id'].'-'.$rowList['object_cat'];?>&nbsp;&nbsp;&nbsp;<?php echo $rowList['object_name'];?></div>
                <?php
            }
        }
        ?>
	    </div>
		<?php
	}
	else if($_GET['do']=='updateNotif')
	{
		$update=mysql_query("update user_log set last_notif='".date("Y-m-d H:i:s")."' where user_id='".$_GET['id']."'");
	}
}
else
{
	header("location:logout.php");
}
?>