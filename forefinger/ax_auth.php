<?php
include 'session.php';
if($_SESSION['forefinger']!='')
{
	if($_GET['do']=='auth')
	{
		?>
		<div class="objectFontTitle">Profile Automation Setting</div>
            <div class="objectBlock checkBoxList">
            	<table width="100%">
                	<tr height="10">
                    	<td width="200" valign="top">
                        	<div><b class="labelBold" >Profile activation day</b></div>
                            <div><p class="checkAll"><u>Select all</u></p></div>
                        </td>
                        <td>
                        	<input type="checkbox" name="sunday" id="sunday"> Sunday<br>
                            <input type="checkbox" name="monday" id="monday"> Monday<br>
                            <input type="checkbox" name="tuesday" id="tuesday"> Tuesday<br>
                            <input type="checkbox" name="wednesday" id="wednesday"> Wednesday<br>
                            <input type="checkbox" name="thursday" id="thursday"> Thursday<br>
                            <input type="checkbox" name="friday" id="friday"> Friday<br>
                            <input type="checkbox" name="saturday" id="saturday"> Saturday
                        </td>
                    </tr>
                    <tr height="10">
                    	<td width="200">
                        	<b class="labelBold" >Profile activation time</b>
                        </td>
                        <td>    
                            <input  class="clockpicker" placeholder="hh:mm" maxlength="5" type="text" name="jam" id="jam"  value="<?php echo $rowProfile['time']?>">
                        </td>
                    </tr>
                </table>
            </br>
            <div style="height:100% !important;display:none" class="errorMessage">Please select day and time when this profile should be activated</div>
            </div>
		<?php
	}
}
else
{
	header("location:logout.php");
}
?>