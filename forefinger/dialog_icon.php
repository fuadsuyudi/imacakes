<?php
	include 'connect_db.php';
?>
<div id="headingDialog">
    <a href="#" class="button red close"><img src="images/cross.png" align="right"></a>
</div>

<div id="contentDialog">
    <div id="isiObjectTop">
    	<?php
        	$icon=mysql_query("select * from icon_master");
			while($rowIcon=mysql_fetch_array($icon))
			{
				?>
				<div class="kursor icon" onClick="getDialog('<?php echo $_GET['id']?>','<?php echo $rowIcon['icon_id']?>','<?php echo $_GET['objectNama']?>','<?php echo $_GET['objectFloor']?>','<?php echo $_GET['objectLokasi']?>','<?php echo $_GET['objectType']?>')">
                	<div class="iconIsi">
        				<img src="images/<?php echo $rowIcon['icon_pic']?>" height="120">
                    </div>
                    <div align="center">
                    	<?php echo $rowIcon['icon_name']?>
                    </div>
        		</div>
				<?php
			}
		?>
    </div>
</div>
