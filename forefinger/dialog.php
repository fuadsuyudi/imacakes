<style type="text/css">
#jam{
    width:55px !important;
}

#contentDialog input:not([type=button]):not([type=reset]):not([type=submit]) {
    padding-left: 10px;
    border-color: rgba(128, 128, 128, 0.09);
    font-size: 16px;
    width: 92%;
}

input[type="checkbox"]{
    display: inline-block;
    width: 18px !important;
    height: 18px !important;
    vertical-align: middle;
}input[type="radio"]{
    display: inline-block;
    width: 18px !important;
    height: 18px !important;
    vertical-align: inherit;
}

.checkAll{
    cursor: pointer;
    margin-top:20px;
    margin-left: 10px;
    font-weight:   bold;
}

.labelBold{
    margin-left: 10px;
}

#contentDialog label{
    font-size: 15px;
}

.dialogButton{
    width: 140px;
    border-radius: 20px;
    border: solid #fff thin;
    margin: 0px auto 10px auto;
    font-size: 12px;
    color: #FFF;
    line-height: 40px;
    text-align: center;
    font-family: helvetica;
    background-color: #6B2727;
}
::-webkit-input-placeholder {
   color: grey !important;
}

:-moz-placeholder { /* Firefox 18- */
   color: grey !important; 
}

::-moz-placeholder {  /* Firefox 19+ */
   color: grey !important;
}

:-ms-input-placeholder {  
   color: grey !important;
}

</style>
<?php
include 'session.php';
if($_SESSION['forefinger']!='')
{
?>
    <div id="headingDialog">
        <a href="#" class="button red close objectFontTitle" style="float:right;">X</a>
    </div>
    <div id="contentDialog">
    <?php
    if($_GET['do']=='addObject')
	{
        $newObject = TRUE;
        if(isset($_GET['id']) && $_GET['id'] != 'undefined' && !empty($_GET['id']) ){
            $deleteButtonShow = "";
            $newObject = FALSE;
        }else{
            $deleteButtonShow = "display:none;";
        }

		$cekObject=mysql_query("select * from object_master where object_id= '".$_GET['id']."' ");
		$rowCekObject=mysql_fetch_array($cekObject);
		if(empty($_GET['objectNama']) && $newObject == FALSE)
		{
			$_GET['objectNama']=$rowCekObject['object_name'];
		}
		if(empty($_GET['objectFloor']) && $newObject == FALSE)
		{
			$_GET['objectFloor']=$rowCekObject['object_floor'];
		}
		if(empty($_GET['objectLokasi']) && $newObject == FALSE)
		{
			$_GET['objectLokasi']=$rowCekObject['object_loc'];
		}
		if(empty($_GET['objectType']) && $newObject == FALSE)
		{
			$_GET['objectType']=$rowCekObject['object_cat'];
		}
	?>
    	<form id="objectForm" method="post" action="proses_add.php">   
        <input type="hidden" name="submitObject" value="Save">                
		<div id="isiObjectTop">
        	<div id="isiObjectTopLeft" class="kursor" onclick="getDialog2()">
            	<div id="pic">
                	<?php
						if($_GET['idPic']!='')
						{
							$icon=mysql_query("select * from icon_master where icon_id='".$_GET['idPic']."'");
							$rowIcon=mysql_fetch_array($icon);
						}
						else if(isset($rowCekObject['icon_id']) && $rowCekObject['icon_id'] !=0)
						{
							$icon=mysql_query("select * from icon_master where icon_id='".$rowCekObject['icon_id']."'");
							$rowIcon=mysql_fetch_array($icon);
						}
						
						if($rowIcon['icon_pic']!='')
						{
					?>
                	<img src="images/<?php echo $rowIcon['icon_pic']?>" height="150">
                    <input type="hidden" name="icon" id="icon" value="<?php echo isset($_GET['idPic'])  &&  !empty($_GET['idPic'] ) ? $_GET['idPic'] : $rowCekObject['icon_id']  ?>" />
                   <?php
						}
				   ?>
                    <div id="editPos"> <span class="smallEditIcon"> </span> edit</div>
                </div>
            </div>
            <div id="isiObjectTopRight">
            	<table width="100%">
                	<tr>
                    	<td colspan="2" height="45">
                        	<input placeholder ="Object description"  type="text" name="objectNama" id="objectNama" size="37" class="txtField" required="required" value="<?php echo isset($_GET['objectNama']) && $_GET['objectNama'] != 'undefined' ? $_GET['objectNama'] : '' ;?>">
                        </td>
                    </tr>
                    <tr>
                    	<td width="73" height="45">
                        	<input placeholder ="Floor" style="width:75% !important;" type="text" name="objectFloor" id="objectFloor" size="4" class="txtField" value="<?php echo isset($_GET['objectFloor'])  && $_GET['objectFloor'] != 'undefined' ? $_GET['objectFloor'] : '' ; ?>">
                        </td>
                        <td>
                        	<input placeholder ="Object Location" style="width:90% !important;"  type="text" name="objectLokasi" id="objectLokasi" size="28" class="txtField" value="<?php echo isset($_GET['objectLokasi'])  && $_GET['objectLokasi'] != 'undefined' ? $_GET['objectLokasi'] : '' ;?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="errorMessage" style="display:none">Please fill empty field</div>
        </div>
        <div class="objectSeparator">
        	<div class="objectFontTitle">Object Hardware Configuration</div>
            <div class="objectBlock">
            	<table width="100%">   
                        <?php
                            $getHardwareConf=mysql_query("select * from object_master where object_id= '".$_GET['id']."' ");
                            if(mysql_num_rows($getHardwareConf) > 0)
                            {   
                                $hardwareConf=mysql_fetch_array($getHardwareConf);
                                ?>
                                   <tr>
                                       <td width="200">
                                            <b class="labelBold"> 
                                                Input hardware ID   
                                            </b>
                                       </td>
                                       <td>
                                             <input placeholder="Hardware ID for input" type="text" name="object_i2c_output" id="object_i2c_output" class="txtFieldAdditional" value="<?php echo $hardwareConf['object_i2c_out'];?>">
                                       </td>
                                   </tr>
                                   <tr>
                                       <td width="200">
                                            <b class="labelBold"> 
                                                Input pin ID   
                                            </b>
                                       </td>
                                       <td>   
                                            <input placeholder="Pin ID for input" type="text" name="object_pin_in" id="object_pin_in" class="txtFieldAdditional" value="<?php echo $hardwareConf['object_pin_in'];?>">
                                       </td>
                                   </tr>
                                   <tr>
                                       <td width="200">
                                            <b class="labelBold">
                                                Output hardware ID   
                                            </b>
                                       </td>
                                       <td>   
                                            <input placeholder="Hardware ID for output" type="text" name="object_i2c_in" id="object_i2c_in" class="txtFieldAdditional" value="<?php echo $hardwareConf['object_i2c_in'];?>">
                                       </td>
                                   </tr>
                                   <tr>
                                       <td width="200">
                                            <b class="labelBold">
                                                 Out pin ID    
                                            </b>
                                       </td>
                                       <td>
                                            <input placeholder="Pin ID for output" type="text" name="object_pin_out" id="object_pin_out" class="txtFieldAdditional" value="<?php echo $hardwareConf['object_pin_out'];?>">
                                       </td>
                                   </tr>
                                <?php  
                            }
                            else
                            {
                                ?>
                                  <tr>
                                       <td width="200">
                                            <b class="labelBold"> 
                                                Input hardware ID   
                                            </b>
                                       </td>
                                       <td>
                                             <input placeholder="Hardware ID for input" type="text" name="object_i2c_output" id="object_i2c_output" class="txtFieldAdditional" value="">
                                       </td>
                                   </tr>
                                   <tr>
                                       <td width="200">
                                            <b class="labelBold"> 
                                                Input pin ID   
                                            </b>
                                       </td>
                                       <td>   
                                            <input placeholder="Pin ID for input" type="text" name="object_pin_in" id="object_pin_in" class="txtFieldAdditional" value="">
                                       </td>
                                   </tr>
                                   <tr>
                                       <td width="200">
                                            <b class="labelBold">
                                                Output hardware ID   
                                            </b>
                                       </td>
                                       <td>   
                                            <input placeholder="Hardware ID for output" type="text" name="object_i2c_in" id="object_i2c_in" class="txtFieldAdditional" value="">
                                       </td>
                                   </tr>
                                   <tr>
                                       <td width="200">
                                            <b class="labelBold">
                                                 Out pin ID    
                                            </b>
                                       </td>
                                       <td>
                                            <input placeholder="Pin ID for output" type="text" name="object_pin_out" id="object_pin_out" class="txtFieldAdditional" value="">
                                       </td>
                                   </tr>
                        <?php       
                        $cekObject=mysql_query("SELECT default_class_object AS class_id FROM other_header");   
                        $rowCekObject=mysql_fetch_array($cekObject);
                        }
                        ?>
                </table>
            </div>
        </div>
        <?php
        if($rowCekObject['class_id']!='')
		{
		?>
        <div class="objectSeparator">
        	<div class="objectFontTitle">Object Additional Information</div>
            <div class="objectBlock">
            	<table width="100%">
                <?php
                	$classMaster=mysql_query("select * from class_master where class_id='".$rowCekObject['class_id']."'");
				    
                	while($rowClassMaster=mysql_fetch_array($classMaster))
					{
						$classData=mysql_query("select * from class_data where class_id='".$rowClassMaster['class_id']."' and char_id ='".$rowClassMaster['char_id']."' and class_num='".$rowCekObject['class_num']."' ");
					    $rowClassData=mysql_fetch_array($classData);
                         ?>
    						<tr>
                                <td width="200">
                                    <b class="labelBold">
                                        <?php echo ucwords($rowClassMaster['char_desc']);?>
                                    </b>
                                </td>
                                <td>
                                    <input placeholder="<?php echo ucwords($rowClassMaster['char_desc']);?>" type="text" name="<?php echo "char_id[".$rowClassMaster['char_id']."]";?>" id="objectManufacture" class="txtFieldAdditional" value="<?php echo $rowClassData['char_data'];?>">
                                </td>
                            </tr>
    						<?php
					}
				?>
                </table>
            </div>
            </div>
            <?php
		}
			?>
            <div align="center">
            	<input type="hidden" name="class_num" id="class_num" value="<?php echo $rowCekObject['class_num']?>" />
            	<input type="hidden" name="id" id="id" value="<?php echo $_GET['id']?>" />
            	<input style="<?php echo $deleteButtonShow; ?>" type="button" class="dialogButton" name="delete" value="Delete" onclick="deleteObjectConfirmation('<?php echo $_GET['id']?>')">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            	<input id="saveObject" type="submit" class="dialogButton" name="submitObject" value="Save">                
            </div>
        </form>
    <?php	
	}
        else if($_GET['do']=='addSchedule')
    {
        ?>
        <form method="post" action="proses_add.php">
        <input type="hidden" name="submitSchedule" value="Save">   
        <div class="objectSeparator">
            <div class="objectFontTitle">Schedule General Information</div>
            <div class="objectBlock">
                <table width="100%">
                    <tr>
                        <td width="200">
                            <b class="labelBold"> Schedule Description </b>
                        </td>
                        <td colspan="2">
                            <input type="text" name="scheduleDesc" id="scheduleDesc" placeholder="Schedule Description" />
                        </td>
                    </tr>
                    <tr>
                        <td width="200">
                            <b class="labelBold">  Schedule Start </b>
                        </td>
                        <td>
                            <input type="text" name="scheduleStartDate" id="scheduleStartDate" placeholder="Schedule start date" />
                        </td>
                        <td>
                            <input style="width: 40%;" type="text" name="scheduleStartTime" class="clockpickerMain" id="scheduleStartTime" placeholder="hh:mm" />
                        </td>
                    </tr>
                    <tr>
                        <td width="200">
                            <b class="labelBold">  Schedule End </b>
                        </td>
                        <td>
                            <input type="text" name="scheduleEndDate" id="scheduleEndDate" placeholder="Schedule end date" />
                        </td>
                        <td>
                            <input style="width: 40%;"  type="text" name="scheduleEndTime" class="clockpickerMain" id="scheduleEndTime" placeholder="hh:mm" />
                        </td>
                    </tr>
                    <tr>
                        <td width="200">
                            <b class="labelBold"> Default profile </b>
                        </td>
                        <td colspan="2">
                            <select id="activeProfile" name="activeProfile" class="selectBox">
                                <option>Active profile after schedule</option>
                                <?php
                                  $profile=mysql_query("select * from profile_master group by profile_id order by profile_id asc");
                                    while($rowProfile=mysql_fetch_array($profile))
                                    {
                                        echo "<option value='".$rowProfile['profile_id']."'' >".$rowProfile['profile_name']."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        <div class="errorMessage" style="display:none">Please fill empty field</div>
        </div>
        <div class="objectSeparator checkBoxList">
            <div class="objectFontTitle">Schedule Control Object</div>
            <div class="objectAuth">
                <table width="100%">
                        <?php
                            $object=mysql_query("select * from object_master where object_floor !='' order by object_floor, object_loc, object_name");
                            $index = 0;
                            while($rowObject=mysql_fetch_array($object))
                            {
                                ?>
                                    <tr height="10" width="50%">
                                        <td>
                                            <b class="labelBold"> <input type="hidden" value="<?php echo $rowObject['object_id']?>" name="objectList[<?php echo $index; ?>][0]" /> <?php echo "#".$rowObject['object_floor'].' '.$rowObject['object_loc'].' - '.$rowObject['object_name'];?></b><br />
                                        </td>
                                        <td width="10%">
                                            <b class="labelBold"> time on</b>
                                        </td>
                                        <td width="15%">
                                            <input style="width:80%" type="text" name="objectList[<?php echo $index; ?>][1]" class="clockpicker" placeholder="hh:mm" />
                                        </td>
                                        <td width="10%">
                                            <b class="labelBold"> time off</b>
                                        </td>
                                        <td width="15%">
                                            <input style="width:80%" type="text" name="objectList[<?php echo $index; ?>][2]" class="clockpicker" placeholder="hh:mm" />
                                        </td>
                                    </tr>
                                <?php
                            $index++;
                            }
                        ?>
                </table>
            </div>
            <div class="errorMessage" style="display:none">Please fill at least 1 time on and time off in a particular control object</div>
        </div>
        <div align="center">
                <input class="dialogButton" type="reset" name="reset" value="Cancel">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input  class="dialogButton" type="submit" name="submitSchedule" id="submitSchedule" value="Save">                
            </div>
            </form>
        <?php
    }
    else if($_GET['do']=='editSchedule')
    {
        $schedQuery = mysql_query( "SELECT *, 
            DATE_FORMAT(sched_start_on, '%a, %d-%m-%y') as scheduleStartDate , 
            DATE_FORMAT(sched_end_on, '%a, %d-%m-%y') as scheduleEndDate ,
            DATE_FORMAT(sched_start_on, '%H:%i') as scheduleStartTime ,
            DATE_FORMAT(sched_end_on, '%H:%i') as scheduleEndTime 
            FROM sched_master WHERE sched_id = '{$_GET['id']}'");
        while ($rowSched=mysql_fetch_assoc($schedQuery)) {
            $sched[] = $rowSched;
        }

        $scheduleStart = explode(' ',$sched[0]['sched_start_on']);
        $scheduleEnd   = explode(' ',$sched[0]['sched_start_on']);

    ?>
        <form method="post" action="proses_add.php">
        <input type="hidden" name="submitSchedule" value="Save">   
        <input type="hidden" name="scheduleID" id="scheduleID" value="<?php echo $sched[0]['sched_id']; ?>">   
        <div class="objectSeparator">
            <div class="objectFontTitle">Schedule General Information</div>
            <div class="objectBlock">
                <table width="100%">
                    <tr>
                        <td width="200">
                            <b class="labelBold"> Schedule Description </b>
                        </td>
                        <td colspan="2">
                            <input value="<?php echo $sched[0]['sched_name']; ?>" type="text" name="scheduleDesc" id="scheduleDesc" placeholder="Schedule Description" />
                        </td>
                    </tr>
                    <tr>
                        <td width="200">
                            <b class="labelBold">  Schedule Start </b>
                        </td>
                        <td>
                            <input value="<?php echo $sched[0]['scheduleStartDate']; ?>" type="text" name="scheduleStartDate" id="scheduleStartDate" placeholder="Schedule start date" />
                        </td>
                        <td>
                            <input value="<?php echo $sched[0]['scheduleStartTime'];  ?>" style="width: 40%;" type="text" name="scheduleStartTime" class="clockpickerMain" id="scheduleStartTime" placeholder="hh:mm" />
                        </td>
                    </tr>
                    <tr>
                        <td width="200">
                            <b class="labelBold">  Schedule End </b>
                        </td>
                        <td>
                            <input value="<?php echo $sched[0]['scheduleEndDate']; ?>" type="text" name="scheduleEndDate" id="scheduleEndDate" placeholder="Schedule end date" />
                        </td>
                        <td>
                            <input value="<?php echo $sched[0]['scheduleEndTime'];?>" style="width: 40%;"  type="text" name="scheduleEndTime" class="clockpickerMain" id="scheduleEndTime" placeholder="hh:mm" />
                        </td>
                    </tr>
                    <tr>
                        <td width="200">
                            <b class="labelBold"> Default profile </b>
                        </td>
                        <td colspan="2">
                            <select id="activeProfile" name="activeProfile" class="selectBox">
                                <option>Active profile after schedule</option>
                                <?php
                                  $profile=mysql_query("select * from profile_master group by profile_id order by profile_id asc");
                                    while($rowProfile=mysql_fetch_array($profile))
                                    {
                                        foreach ($sched as $sch) {
                                            if($rowProfile['profile_id'] == $sch['profile_id'])
                                                $selectedProfile = "selected";
                                            else
                                                $selectedProfile = '';
                                        }           
                                        echo "<option $selectedProfile value='".$rowProfile['profile_id']."'' >".$rowProfile['profile_name']."</option>";  
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        <div class="errorMessage" style="display:none">Please fill empty field</div>
        </div>
        <div class="objectSeparator checkBoxList">
            <div class="objectFontTitle">Schedule Control Object</div>
            <div class="objectAuth">
                <table width="100%">
                        <?php
                            $object=mysql_query("select * from object_master where object_floor !='' order by object_floor, object_loc, object_name");
                            $index = 0;
                            while($rowObject=mysql_fetch_array($object))
                            {

                                $schTimeOn  = '' ;
                                $schTimeOff = '' ;
                                foreach ($sched as $sch) {
                                    if($rowObject['object_id'] == $sch['object_id']){
                                        $schTimeOnRaw  = explode(':', $sch['object_start_on']);
                                        $schTimeOn = $schTimeOnRaw[0].":".$schTimeOnRaw[1];
                                        $schTimeOffRaw  = explode(':', $sch['object_end_on']);
                                        $schTimeOff = $schTimeOffRaw[0].":".$schTimeOffRaw[1];
                                    }
                                }
                                ?>
                                    <tr height="10" width="50%">
                                        <td>
                                            <b class="labelBold"> <input type="hidden" value="<?php echo $rowObject['object_id']?>" name="objectList[<?php echo $index; ?>][0]" /> <?php echo "#".$rowObject['object_floor'].' '.$rowObject['object_loc'].' - '.$rowObject['object_name'];?></b><br />
                                        </td>
                                        <td width="10%">
                                            <b class="labelBold"> time on</b>
                                        </td>
                                        <td width="15%">
                                            <input value="<?php echo $schTimeOn; ?>" style="width:80%" type="text" name="objectList[<?php echo $index; ?>][1]" class="clockpicker" placeholder="hh:mm" />
                                        </td>
                                        <td width="10%">
                                            <b class="labelBold"> time off</b>
                                        </td>
                                        <td width="15%">
                                            <input value="<?php echo $schTimeOff;  ?>" style="width:80%" type="text" name="objectList[<?php echo $index; ?>][2]" class="clockpicker" placeholder="hh:mm" />
                                        </td>
                                    </tr>
                                <?php
                            $index++;
                            }
                        ?>
                </table>
            </div>
            <div class="errorMessage" style="display:none">Please fill at least 1 time on and time off in a particular control object</div>
        </div>
        <div align="center">  
                <input  class="dialogButton" type="button" name="deleteSchedule" value="Delete"  onclick="getDelete('<?php echo $_GET['id']?>','schedule')">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input  class="dialogButton" type="submit" name="submitSchedule" id="submitSchedule" value="Save">                
            </div>
            </form>
        <?php
    }
	else if($_GET['do']=='addUser')
	{
		?>
        <form method="post" action="proses_add.php">
        <input type="hidden" name="submitUser" value="Save">   
		<div class="objectSeparator">
        	<div class="objectFontTitle">User General Information</div>
            <div class="objectBlock">
            	<table width="100%">
                	<tr>
                    	<td width="200">
                        	<b class="labelBold"> User ID </b>
                        </td>
                        <td>
                        	<input type="text" name="userid" id="userid" placeholder="User ID" />
                        </td>
                    </tr>
                    <tr>
                    	<td width="200">
                        	<b class="labelBold">  User name </b>
                        </td>
                        <td>
                        	<input type="text" name="username" id="username" placeholder="User name" />
                        </td>
                    </tr>
                </table>
            </div>
        <div class="errorMessage" style="display:none">Please fill empty field</div>
        </div>
        <div class="objectSeparator checkBoxList">
        	<div class="objectFontTitle">User Access Authorization For Setting Menu</div>
            <div class="objectAuth">
            	<table width="100%">
                	<tr height="10">
                    	<td width="200">
                        	<b class="labelBold">  Setting Autorization </b>
                        </td>
                        <td>
                        	<label><input type="checkbox" name="objset" id="objset" /> Object Setting</label>
                        </td>
                    </tr>
                    <tr height="5">
                    	<td width="200">
                        	<p class="checkAll"><u>Select all</u></p>
                        </td>
                        <td>
                        	<label><input type="checkbox" name="profset" id="profset" /> Profile Setting</label>
                        </td>
                    </tr>
                    <tr height="5">
                    	<td width="200">
                        </td>
                        <td>
                        	<label><input type="checkbox" name="userset" id="userset" /> User Setting</label>
                        </td>
                    </tr>
                </table>
            </div>      
            <div class="errorMessage" style="display:none">Please select at least one option</div>
        </div>
        <div class="objectSeparator checkBoxList">
        	<div class="objectFontTitle">User Authorization For Control Object</div>
            <div class="objectAuth">
            	<table width="100%">
                	<tr height="10">
                    	<td width="200">
                        	<div><b class="labelBold"> Object authorization</b></div>
                            <div><p class="checkAll"><u>Select all</u></p></div>
                        </td>
                        <td>
                        <?php
                            $object=mysql_query("select * from object_master where object_floor !='' order by object_floor, object_loc, object_name");
                            while($rowObject=mysql_fetch_array($object))
                            {
                                ?>
                                <label><input type="checkbox" value="<?php echo $rowObject['object_id']?>" name="objectList[]" /> <?php echo "#".$rowObject['object_floor'].' '.$rowObject['object_loc'].' - '.$rowObject['object_name'];?></label><br />
                                <?php
                            }
                        ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="errorMessage" style="display:none">Please select at least one option</div>
        </div>
        <div align="center">
            	<input class="dialogButton" type="reset" name="reset" value="Cancel">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            	<input  class="dialogButton" type="submit" name="submitUser" id="submitUser" value="Save">                
            </div>
            </form>
		<?php
	}
	else if($_GET['do']=='editUser')
	{
		$userMaster=mysql_query("select * from user_master where user_id='".$_GET['id']."'");
		$rowUserMaster=mysql_fetch_array($userMaster);
		?>
        <form method="post" action="proses_add.php">
        <input type="hidden" name="submitEditUser" value="Save">          
		<div class="objectSeparator">
        	<div class="objectFontTitle">User General Information</div>
            <div class="objectBlock">
            	<table width="100%">
                	<tr>
                    	<td width="200">
                                <b class="labelBold">
                        	       User ID
                                </b>
                        </td>
                        <td style="font-size: 16px; padding-left: 10px;">
                        	   <?php echo $rowUserMaster['user_id']?>
                            <input type="hidden" name="userid" value="<?php echo $rowUserMaster['user_id']?>" />
                        </td>
                    </tr>
                    <tr>
                    	<td width="200">
                            <b class="labelBold">
                        	   User name
                            </b>
                        </td>
                        <td>
                        	<input type="text" name="username" id="username" placeholder="User name" value="<?php echo $rowUserMaster['cust_name']?>"/>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="errorMessage" style="display:none">Please fill empty field</div>
        </div>
        <div class="objectSeparator checkBoxList">
        	<div class="objectFontTitle">User Access Authorization For Setting Menu</div>
            <div class="objectAuth">
            	<table width="100%">
                	<tr height="10">
                    	<td width="200">
                            <b class="labelBold">
                        	   Setting Autorization
                            </b>
                        </td>
                        <td>
                        <?php
                        	if($rowUserMaster['auth_set_object']=='1')
							{
								?>
								<label><input type="checkbox" name="objset" id="objset" checked="checked" /> Object Setting</label>
								<?php
							}
							else
							{
								?>
								<label><input type="checkbox" name="objset" id="objset"/> Object Setting</label>
								<?php
							}
						?>
                        </td>
                    </tr>
                    <tr height="5">
                    	<td width="200">
                            <p class="checkAll"><u>Select all</u></p>
                        </td>
                        <td>
                        	<?php
                            if($rowUserMaster['auth_set_profile']=='1')
							{
								?>
								<label><input type="checkbox" name="profset" id="profset" checked="checked" /> Profile Setting</label>
								<?php
							}
							else
							{
								?>
								<label><input type="checkbox" name="profset" id="profset" /> Profile Setting</label>
								<?php
							}
							?>
                        </td>
                    </tr>
                    <tr height="5">
                    	<td width="200">
                        </td>
                        <td>
                        	<?php
                            if($rowUserMaster['auth_set_user']=='1')
							{
								?>
								<label><input type="checkbox" name="userset" id="userset" checked="checked" /> User Setting</label>
								<?php
							}
							else
							{
								?>
								<label><input type="checkbox" name="userset" id="userset" /> User Setting</label>
								<?php
							}
							?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="errorMessage" style="display:none">Please select at least one option</div>
        </div>
        <div class="objectSeparator checkBoxList">
        	<div class="objectFontTitle">User Authorization For Control Object</div>
            <div class="objectAuth">
            	<table width="100%">
                	<tr height="10">
                    	<td width="200">
                        	<div>
                                <b class="labelBold">
                                    Object authorization
                                </b>
                            </div>
                            <div><p class="checkAll"><u>Select all</u></p></div>
                        </td>
                        <td>
                        <?php
                            $objectList = explode(',',$rowUserMaster['object_id']); 
                        	$object=mysql_query("select * from object_master where object_floor !='' order by object_floor, object_loc, object_name");
							while($rowObject=mysql_fetch_array($object))
							{
                                $objectChecked = '';
                                if(in_array($rowObject['object_id'], $objectList)) $objectChecked = 'checked';
                                
								?>
								<label><input <?php echo $objectChecked; ?> type="checkbox" value="<?php echo $rowObject['object_id']?>" name="objectList[]" /> <?php echo "#".$rowObject['object_floor'].' '.$rowObject['object_loc'].' - '.$rowObject['object_name'];?></label><br />
								<?php
							}
						?>	
                        </td>
                    </tr>
                </table>
            </div>      
            <div class="errorMessage" style="display:none">Please select at least one option</div>
        </div>
        <div align="center">
            	<input  class="dialogButton" type="button" name="deleteUser" value="Delete"  onclick="getDelete('<?php echo $_GET['id']?>','user')">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            	<input  class="dialogButton" type="submit" name="submitEditUser" id="submitEditUser" value="Save">                
            </div>
            </form>
		<?php
	}
	else if($_GET['do']=='addProfile')
	{
		?>
        <form class="profileForm" method="post" action="proses_add.php">
        <input type="hidden" name="submitProfile" value="Save">         
		<div class="objectSeparator">
        	<div class="objectFontTitle">Profile General Information</div>
            <div class="objectBlock">
            	<table width="100%">
                	<tr>
                    	<td width="200">
                        	<b class="labelBold" >Profile description</b>
                        </td>
                        <td>
                        	<input type="text" name="prof_desc" id="prof_desc" />
                        </td>
                    </tr>
                </table>
            </div>
        <div class="errorMessage" style="display:none">Please fill empty field</div>
        </div>
        <div class="objectSeparator">
        	<div class="objectFontTitle">Profile Control Object</div>
            <div class="objectBlock checkBoxList">
            	<table width="100%">
                	<tr height="10">
                    	<td width="200">
                        	<div><b class="labelBold" >Control Object</b></div>
                            <div><p class="checkAll"><u>Select all</u></p></div>
                        </td>
                        <td width="70%">
                        <?php
                        	$object=mysql_query("select * from object_master where object_floor !='' order by object_floor, object_loc, object_name");
							$mulai=1;
							while($rowObject=mysql_fetch_array($object))
							{
								?>
                                <div class="checkArea" style="display:inline-block;width: 100%;">
    								<label><input class="profileCheck" type="checkbox" name="<?php echo $rowObject['object_id']?>" id="<?php echo 'cb'.$mulai;?>" onclick="getOn('<?php echo $mulai; ?>')" /> <?php echo "#".$rowObject['object_floor'].' '.$rowObject['object_loc'].' - '.$rowObject['object_name'];?></label>
                                   <!--  <span class="buttonRight"><img src="images/none.png" id="<?php echo $mulai;?>" onclick="getChange(this.id)" /></span>
                                   --> 
                                   <input class="nilai" value="1" type="hidden" name="nilai<?php echo $mulai;?>" id="nilai<?php echo $mulai?>" />  
                                   <div style="display:none;" class="toggleButton profileToggle"> <div class="profileToggleOn">On</div>  <div class="profileToggleOff">Off</div>  </div>
                                </div>
								<?php
								$mulai++;
							}
							?>
								
                        </td>
                    </tr>
                </table>
            <div class="errorMessage" style="display:none;height:100% !important;">Please select at least one control object</div>
            </div>
        </div>
        <div class="objectSeparator">
        	<div class="objectFontTitle">Profile Automation Setting</div>
            <div class="objectBlock">
            	<table width="100%">
                	<tr height="10">
                    	<td width="200" valign="top">
                        	<b class="labelBold" >Profile run mode</b>
                        </td>
                        <td>
                        	<input type="radio" name="mode" id="mode1" onclick="getAuth('manu')" value="manu" /> Profile runs manually <br />
                            <input type="radio" name="mode" id="mode2" onclick="getAuth('auth')" value="auth" /> Profile runs Automatically
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="objectSeparator" id="profAuth">
        	
        </div>
        <div align="center">
            <input class="dialogButton" type="reset" name="reset" value="Cancel">
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input id="submitProfile" class="dialogButton"type="submit" name="submitProfile" value="Save">                
        </div>
        </form>
		<?php
	}else if($_GET['do']=='editProfile')
	{
		$profile=mysql_query("select * from profile_master where profile_id='".$_GET['id']."'");
		$rowProfile=mysql_fetch_array($profile);
		?>
        <form class="profileForm"  method="post" action="proses_add.php">
        <input type="hidden" name="submitEditProfile" value="Save">         
		<div class="objectSeparator">
        	<div class="objectFontTitle">Profile General Information</div>
            <div class="objectBlock">
            	<table width="100%">
                	<tr>
                    	<td width="200">
                        	<b class="labelBold" >Profile description</b>
                        </td>
                        <td>
                        	<input type="text" name="profDesc" id="profDesc" value="<?php echo $rowProfile['profile_name']?>" />
                        </td>
                    </tr>
                </table>
            </div>
        <div class="errorMessage" style="display:none">Please fill empty field</div>
        </div>
        <div class="objectSeparator">
        	<div class="objectFontTitle">Profile Control Object</div>
            <div class="objectBlock checkBoxList">
            	<table width="100%">
                	<tr height="10">
                    	<td width="200">
                        	<div><b class="labelBold" >Control Object</b></div>
                            <div><p class="checkAll"><u>Select all</u></p></div>
                        </td>
                        <td width="70%">
                        <?php
                        	$object=mysql_query("select * from object_master where object_floor !='' order by object_floor, object_loc, object_name");
							$mulai=1;
							while($rowObject=mysql_fetch_array($object))
							{
								$cek=mysql_query("select * from profile_master where object_id='".$rowObject['object_id']."' and profile_name='".$rowProfile['profile_name']."'");
								$rowCek=mysql_fetch_array($cek);
								if(mysql_num_rows($cek)!='')
								{
									?>
                                    <div class="checkArea" style="display:inline-block;width: 100%;">
                                    <label><input type="checkbox" name="<?php echo $rowObject['object_id']?>" id="<?php echo 'cb'.$mulai;?>" checked="checked" onclick="getOn('<?php echo $mulai; ?>')" /> <?php echo "#".$rowObject['object_floor'].' '.$rowObject['object_loc'].' - '.$rowObject['object_name'];?></label>
                                    <?php
                                    if($rowCek['object_action']==1)
                                    {
                                        ?>
                                        <input class="nilai" type="hidden" name="nilai<?php echo $mulai;?>" id="nilai<?php echo $mulai?>" value="<?php echo $rowCek['object_action']?>" />
                                        <div class="toggleButton profileToggle"> <div class="profileToggleOn">On</div>  <div class="profileToggleOff">Off</div>  </div>
                                        <?php
                                    }
									else
									{
										?>
                                        <input class="nilai" type="hidden" name="nilai<?php echo $mulai;?>" id="nilai<?php echo $mulai?>" value="0"  />  
                                        <div class="toggleButton profileToggle"> <div class="profileToggleOff">On</div>  <div class="profileToggleOn">Off</div>  </div>
                                        <?php
									}
									?>
									</div>
									<?php
								}
								else
								{
								?>
                                <div class="checkArea" style="display:inline-block;width: 100%;">
                                    <label><input class="profileCheck" type="checkbox" name="<?php echo $rowObject['object_id']?>" id="<?php echo 'cb'.$mulai;?>" onclick="getOn('<?php echo $mulai; ?>')" /> <?php echo "#".$rowObject['object_floor'].' '.$rowObject['object_loc'].' - '.$rowObject['object_name'];?></label>
                                   <input class="nilai" value="1" type="hidden" name="nilai<?php echo $mulai;?>" id="nilai<?php echo $mulai?>" />  
                                   <div style="display:none;" class="toggleButton profileToggle"> <div class="profileToggleOn">On</div>  <div class="profileToggleOff">Off</div>  </div>
                                </div>
								<?php
								}
								$mulai++;
							}
						?>
                        </td>
                    </tr>
                </table>
                <div class="errorMessage" style="display:none;height:100% !important;">Please select at least one control object</div>
            </div>
        </div>
        <div class="objectSeparator">
        	<div class="objectFontTitle">Profile Automation Setting</div>
            <div class="objectBlock">
            	<table width="100%">
                	<tr height="10">
                    	<td width="200" valign="top">
                        	<b class="labelBold" >Profile run mode</b>
                        </td>
                        <td>
                        <?php
                        	if($rowProfile['sunday']=='1' || $rowProfile['monday']=='1' || $rowProfile['tuesday']=='1' || $rowProfile['wednesday']=='1' || $rowProfile['thursday']=='1' || $rowProfile['friday']=='1' || $rowProfile['saturday']=='1')
							{
								?>
									<input type="radio" name="mode" id="mode1" onclick="getAuth('manu')" value="manu" /> Profile runs manually<br />
                            		<input type="radio" name="mode" id="mode2" onclick="getAuth('auth')" value="auth" checked="checked" /> Profile runs Automatically
								<?php
							}
							else
							{
								?>
									<input type="radio" name="mode" id="mode1" onclick="getAuth('manu')" value="manu" checked="checked" /> Profile runs manually<br />
                            		<input type="radio" name="mode" id="mode2" onclick="getAuth('auth')" value="auth" /> Profile runs Automatically
								<?php
							}
						?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <?php
        if($rowProfile['sunday']=='1' || $rowProfile['monday']=='1' || $rowProfile['tuesday']=='1' || $rowProfile['wednesday']=='1' || $rowProfile['thursday']=='1' || $rowProfile['friday']=='1' || $rowProfile['saturday']=='1')
		{
			?>
			<div class="objectSeparator" id="profAuth">
        	<div class="objectFontTitle">Profile Automation Setting</div>
            <div class="objectBlock checkBoxList">
            	<table width="100%">
                	<tr height="10">
                    	<td width="200" valign="top">
                        	<div><b class="labelBold" >Profile activation day</b></div>
                            <div><p class="checkAll"><u>Select all</u></p></div>
                        </td>
                        <td>
                        	<?php
                            if($rowProfile['sunday']=='1')
							{
								?>
								<input type="checkbox" name="sunday" id="sunday" checked="checked"> Sunday<br>
								<?php
							}
							else
							{
								?>
								<input type="checkbox" name="sunday" id="sunday"> Sunday<br>
								<?php
							}
							
							if($rowProfile['monday']=='1')
							{
								?>
								<input type="checkbox" name="monday" id="monday" checked="checked"> Monday<br>
								<?php
							}
							else
							{
								?>
								<input type="checkbox" name="monday" id="monday"> Monday<br>
								<?php
							}
							
							if($rowProfile['tuesday']=='1')
							{
								?>
								<input type="checkbox" name="tuesday" id="tuesday" checked="checked"> Tuesday<br>
								<?php
							}
							else
							{
								?>
								<input type="checkbox" name="tuesday" id="tuesday"> Tuesday<br>
								<?php
							}
							
							if($rowProfile['wednesday']=='1')
							{
								?>
								<input type="checkbox" name="wednesday" id="wednesday" checked="checked"> Wednesday<br>
								<?php
							}
							else
							{
								?>
								<input type="checkbox" name="wednesday" id="wednesday"> Wednesday<br>
								<?php
							}
							
							if($rowProfile['thursday']=='1')
							{
								?>
								<input type="checkbox" name="thursday" id="thursday" checked="checked"> Thursday<br>
								<?php
							}
							else
							{
								?>
								<input type="checkbox" name="thursday" id="thursday"> Thursday<br>
								<?php
							}
							
							if($rowProfile['friday']=='1')
							{
								?>
								<input type="checkbox" name="friday" id="friday" checked="checked"> Friday<br>
								<?php
							}
							else
							{
								?>
								<input type="checkbox" name="friday" id="friday"> Friday<br>
								<?php
							}
							
							if($rowProfile['saturday']=='1')
							{
								?>
								<input type="checkbox" name="saturday" id="saturday" checked="checked"> Saturday
								<?php
							}
							else
							{
								?>
								<input type="checkbox" name="saturday" id="saturday"> Saturday
								<?php
							}
							
							?>
                        </td>
                    </tr>
                    <tr height="10">
                    	<td width="200">
                        	<b class="labelBold" >Profile activation time</b>
                        </td>
                        <td>
                            <?php
                                $timeActiveRaw  = explode(':', $rowProfile['time_active']);
                                $timeActive     = $timeActiveRaw[0].":".$timeActiveRaw[1];
                            ?>
                        	<input class="clockpicker" placeholder="hh:mm" maxlength="5" type="text" name="jam" id="jam"  value="<?php echo $timeActive?>">
                        </td>
                    </tr>
                </table>   
                <div class="errorMessage" style="display:none;heigth:100% !important;">Please select day and time when this profile should be activated</div>
            </div>
         	</div>
			<?php
		}
		?>
        <div align="center">    
            <input  class="dialogButton" type="button" name="deleteProfile" value="Delete"  onclick="getDelete('<?php echo $_GET['id']?>','profile')">
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
            <input  class="dialogButton" type="submit" id="submitEditProfile"  name="submitEditProfile" value="Save">                
        </div>
        </form>
		<?php
	}
	?>
    </div>
<?php
}
else
{
	header("location:logout.php");
}
?>
