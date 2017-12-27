<div class="statusKanan">
	<div id="notif" class="kursor">
    	<div id="notifAlert">
        	<?php
            	$cekLog=mysql_query("select * from user_log where user_id='".$_SESSION['forefinger']."'");
				$rowCekLog=mysql_fetch_array($cekLog);
				$jmlNotif=mysql_query("select * from message_status where message_date_time >'".$rowCekLog['last_notif']."'");
				echo mysql_num_rows($jmlNotif);
			?>
        </div>
    </div>

    <div class="judulKanan">
        Profile
    </div>
    <div id = "rightscroll">
        <div style="margin-top:25px;">
        <?php
            $profile=mysql_query("select * from profile_master group by profile_id order by profile_id");
            while($rowProfile=mysql_fetch_array($profile))
            {
                ?>
                <div class="entryProfile" onclick="<?php echo 'toggleProfile(this,'.$rowProfile['profile_id'].',\''.$_SESSION['forefinger'].'\')' ?>">
                <?php echo $rowProfile['profile_name'];?>
                </div>
                <?php
            }
        ?>
        </div>

        <div class="judulKanan" style="margin-top:100px;">
            Schedule
        </div>

        <?php
            $sched=mysql_query("SELECT sched_master.*, sched_status.active_ind
                                    FROM sched_master
                                    LEFT JOIN sched_status ON sched_master.sched_id = sched_status.sched_id
                                    GROUP BY sched_master.sched_id");
            while($rowSched=mysql_fetch_array($sched))
            {
                ?>
                <div id="statusIsi" style="width:200px;">
                        <div class="subJudul">
                            <li style="font-size:16px;margin-bottom:10px;">
                                <span style="cursor:pointer;" onclick="getEditSchedule('<?php echo $rowSched['sched_id']; ?>')"><?php echo $rowSched['sched_name']; ?></span>    <span style="float: right;cursor:pointer;" onclick="getDelete('<?php echo $_GET['id']?>','schedule')" >X</span>
                            </li>
                        </div>
                        <div class="subJudul">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowSched['sched_start_on']; ?> </div>
                        <div class="subJudul">&nbsp;&nbsp;&nbsp;&nbsp;to</div>
                        <div class="subJudul">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowSched['sched_end_on']; ?> 
                        <?php 
                            if($rowSched['active_ind'] == 1){
                                echo '<div class="toggleButton"> <div class="toggleOn" onclick="toggleSchedule(this,'.$rowSched['sched_id'].',1,\''.$_SESSION['forefinger'].'\')" >On</div>  <div class="toggleOff"  onclick="toggleSchedule(this,'.$rowSched['sched_id'].',0,\''.$_SESSION['forefinger'].'\')"  >Off</div>  </div> </div>';
                            }else{
                                echo '<div class="toggleButton"> <div class="toggleOff"  onclick="toggleSchedule(this,'.$rowSched['sched_id'].',1,\''.$_SESSION['forefinger'].'\')"  >On</div>  <div class="toggleOn"  onclick="toggleSchedule(this,'.$rowSched['sched_id'].',0,\''.$_SESSION['forefinger'].'\')"  >Off</div>  </div> </div>';
                            }
                        ?>
                            <hr style="margin-top:20px;">
                        </div>
                <?php
            }
        ?>
        <div id="statusIsi" style="width:200px;cursor:pointer;" onclick="getSchedule()">
                <div class="subJudul">
                    <li style="font-size:16px;margin-bottom:10px;">
                        New Schedule
                    </li>
                </div>
                <hr style="margin-top:20px;">
        </div>
    </div>
</div>

<!-- 
    <div class="judulKanan">
        Status
    </div>
    <div id="statusIsi">
        <div class="subJudul">
            <?php
            $lantai=mysql_query("select * from object_master where object_floor !='' group by object_floor asc");
            $rowLantai=mysql_fetch_array($lantai)
            ?>
            Floor #<?php echo $rowLantai['object_floor']?>
        </div>
        <div class="subJudul">
        <?php
        $room=mysql_query("select * from object_master where object_floor ='".$rowLantai['object_floor']."' group by object_loc");
        $rowRoom=mysql_fetch_array($room)
        ?>
            <?php echo $rowRoom['object_loc'];?>
        </div>
        <div class="entryRight">
        <?php
        $list=mysql_query("select * from object_master a left join object_status b on a.object_id=b.object_id where a.object_loc='".$rowRoom['object_loc']."' and a.object_floor='".$rowLantai['object_floor']."'");
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
    </div>
</div> -->