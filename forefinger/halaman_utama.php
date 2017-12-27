<?php
	include 'session.php';
	if($_SESSION['forefinger']!='')
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include 'title.php';
?>
</head>

<body onload="createrequest()">
	<div id="container">
    	<div id="kiri">
        	<?php
            	include 'kiri.php';
			?>
        </div>
        <div id="tengah">
        	<?php
            	$object=mysql_query("select * from object_master where object_floor !='' group by object_floor asc");
				while($rowObject=mysql_fetch_array($object))
				{
					?>
					<div class="floor">
                    	<div class="floorTitle">
                        	Floor #<?php echo $rowObject['object_floor'];?>
                        </div>
                        <?php
                        	$kamar=mysql_query("select * from object_master where object_floor ='".$rowObject['object_floor']."' group by object_loc");
							while($rowKamar=mysql_fetch_array($kamar))
							{
								?>
								<div class="floorSub">
                                	<div class="floorSubTitle kursor" onclick="getChangeStatus('<?php echo $rowObject['object_floor'];?>','<?php echo $rowKamar['object_loc']?>')">
                                    	<?php echo $rowKamar['object_loc']?>
                                    </div>
                                    <div class="floorSubIsi kursor">
                                    	<?php
                                        	$isi=mysql_query("select * from object_master a left join icon_master b on a.icon_id=b.icon_id where a.object_loc='".$rowKamar['object_loc']."' and a.object_floor='".$rowObject['object_floor']."'");
											while($rowIsi=mysql_fetch_array($isi))
											{
												?>
													<div class="floorSubPicDiv">
														<div class="floorSubPic">
		                                                    <?php
	                                                    	$ind=mysql_query("select * from object_status where object_id='".$rowIsi['object_id']."'");
															$rowInd=mysql_fetch_array($ind);
															if($rowInd['active_ind']=='1')
															{
																?>
																<img src="images/<?php echo $rowIsi['icon_pic']?>" height="40" id="<?php echo $rowIsi['object_id']?>" onclick="getTurn(this.id,'<?php echo $rowIsi['object_id']?>','0','<?php echo $_SESSION['forefinger']?>')" /><br />
																<?php
															}
															else
															{
																?>
																<img src="images/<?php echo $rowIsi['icon_id'].'-off.png'?>" id="<?php echo $rowIsi['object_id']?>" height="40" onclick="getTurn(this.id,'<?php echo $rowIsi['object_id']?>','1','<?php echo $_SESSION['forefinger']?>')" /><br />
																<?php
															}
															?>
															<div class="textFloor">
															<?php
															echo limit_text($rowIsi['object_name'],6).'&nbsp;&nbsp;';?>
															</div>
                                                        </div>
                                                    </div>
												<?php
											}
										?>
                                    </div>
                        		</div>
								<?php
							}
						?>
                    </div>
					<?php
				}
			?>
        </div>
        <div id="kanan">
        	<div id="test"></div>
        	<?php include 'kanan.php';?>
        </div>
    </div>
    
    <div id="modal">

	</div>
</body>
</html>
<?php
	}
	else
	{
		header("location:logout.php");
	}

function limit_text($str, $limit) {

$str = explode(' ', $str);
	if (strlen($str[0]) > $limit)
	   $text = substr($str[0], 0, $limit);
	else
		$text = $str[0];

return $text;
}
?>

<div id="notifModal">
    <div id="headingDialogNotif">
        <a href="#" class="button red close objectFontTitle" style="float:right;">X</a>
    </div>
    <div id="contentDialogNotif">
        <div id="scrollable" style="height:110%;">
            <div id="messageTitle">
                Notification
            </div>
            <div id="notifContentDiv">
            <?php
                $cekNotif=mysql_query("select * from message_status order by message_date_time desc ");
                while($rowCekNotif=mysql_fetch_array($cekNotif))
                {
                    if($rowCekNotif['message_date_time'] >= $rowCekLog['last_notif'])
                    {
                        ?>
                        <div class="notifRow">
                            <div class="unread" >
                            <?php echo $rowCekNotif['message_desc']?>
                            </div>
                            <div class="notifDate">
                            <?php echo $rowCekNotif['message_date_time']?>
                            </div>
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="notifRow">
                            <div class="read">
                            <?php echo $rowCekNotif['message_desc']?>
                            </div>
                            <div class="notifDate">
                            <?php echo $rowCekNotif['message_date_time']?>
                            </div>
                        </div>
                        <?php
                    }
                    
                }
            ?>
            </div>
            <div class="notifLoading" style="display:none;">
                loading ...
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$('#modal').on("click","#submitSchedule,#submitEditSchedule",function(e){
    e.preventDefault();
    submitForm = true;
    //validasi input text
    $.each($('.objectBlock input[type=text]'), function(i,input){ 
      if($(input).val() == '') 
        {
          $(input).addClass('hasError');
          $(input).closest('.errorMessage').show();
          submitForm = false;  
          $(input).closest('.objectSeparator').find('.errorMessage').show();
        }
    });

    $.each($('.checkBoxList'), function(i,separator){
        checkedCheckBoxes = 0;
        $.each($(separator).find('input[type=text]'), function(i,input){ 
            if($(input).val()!= ''){
                checkedCheckBoxes++;
            }
        });
        if(checkedCheckBoxes < 1){
              $(separator).find('.errorMessage').show();
          	  $('.checkBoxList input[type=text]').addClass('hasError');
        } 
    });


    console.log(submitForm);
    if(submitForm == true){
        $(this).closest('form').submit();
    }else{
        return false;
    }

});

$('#modal').on('click','.hasError',function(){
    $(this).removeClass('hasError');
});
</script>