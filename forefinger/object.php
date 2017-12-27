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

<body id="object" onload="createrequest()">
    <div id="deleteObject">
        <form action="#" method="post" style="margin-top: 15%;">
        <table align="center" id="changePasswordArea">
            <tr height="100">
                <td align="center"  colspan="2" style="font-size:140%;color:#fff;">
                 Are you sure you want to delete?
               </td>
            </tr>
            <tr id="deleteObjectConfirmation">
                <td align="center"  colspan="2" >
                    <input type="submit" name="deleteObjectYes" value="Yes" class="deleteButton smallButton whiteButton" />
                    <input type="submit" name="deleteObjectNo" value="No" class="deleteButton smallButton whiteButton" style="margin-left: 20%;"/>
                </td>
            </tr>
        </table>
        </form>
    </div>
	<div id="container">
    	<div id="kiri">
        	<?php
            	include 'kiri.php';
			?>
        </div>
        <div id="isi">
        	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr class="isiTitle" height="60">
                	<td width="50">
                    
                    </td>
                	<td width="40" align="center">
                    </td>
                    <td width="50">
                    	ID <a href="object.php?sort=id"><img src="images/auto.png" height="15" /></a>
                    </td>
                    <td width="60">
                    	Floor <a href="object.php?sort=floor"><img src="images/auto.png" height="15" /></a>
                    </td>
                    <td  width="200">
                    	Room <a href="object.php?sort=room"><img src="images/auto.png" height="15" /></a>
                    </td>
                    <td>
                    	Description <a href="object.php?sort=desc"><img src="images/auto.png" height="15" /></a>
                    </td>
                </tr>
                <?php
					if($_GET['sort']=='id')
					{
						$object=mysql_query("select * from object_master a left join icon_master b on a.icon_id=b.icon_id order by a.object_id");
					}
					else if($_GET['sort']=='floor')
					{
						$object=mysql_query("select * from object_master a left join icon_master b on a.icon_id=b.icon_id order by a.object_floor");
					}
					else if($_GET['sort']=='room')
					{
						$object=mysql_query("select * from object_master a left join icon_master b on a.icon_id=b.icon_id order by a.object_loc");
					}
					else if($_GET['sort']=='desc')
					{
						$object=mysql_query("select * from object_master a left join icon_master b on a.icon_id=b.icon_id order by a.object_name");
					}
                	else
					{
						$object=mysql_query("select * from object_master a left join icon_master b on a.icon_id=b.icon_id order by a.object_id");
					}
					while($rowObject=mysql_fetch_array($object))
					{
						?>
						<tr class="isiContent kursor" height="30" onclick="getDialog('<?php echo $rowObject['object_id']?>','','','','','')">
                        	<td>
                    
                    		</td>
                        	<td align="center">
                            	<?php
                                if($rowObject['icon_pic']!='')
								{
								?>
                    			<img src="images/<?php echo $rowObject['icon_pic']?>" height="30"/>
                                <?php
								}
								?>
                            </td>
                            <td>
                                <?php echo $rowObject['object_id']?>
                            </td>
                            <td>
                                <?php echo $rowObject['object_floor']?>
                            </td>
                            <td>
                                <?php echo $rowObject['object_loc']?>
                            </td>
                            <td>
                                <?php echo $rowObject['object_name']?>
                            </td>
                		</tr>
                        <tr class="isiContent" >
                        	<td colspan="6">
                            	<hr color="#a59a84" width="100%"/>
                            </td>
                        </tr>
						<?php
					}
				?>
                <tr class="isiFooter" height="30">
                    <td>
                    
                    </td>
                    <td onclick="getDialog()" class="kursor" colspan="6">
                        Add more object
                    </td>
                </tr>
            </table>
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
?>

<script type="text/javascript">
function deleteObjectConfirmation(id){
    $('#deleteObject').val(id);
    $('#deleteObject').show();
}
$('#deleteObject input').click(function(e){
    e.preventDefault();
    if($(this).val() == 'Yes'){
        $.ajax({
                url :  "ajax_call.php",
                type: 'post',
                data: {
                        'method'  : 'deleteObject',
                        'objectID'  : $('#deleteObject').val()
                    },
                dataType:"JSON",
                success: function(data){      
                    if(data.status == 1){
                         location.reload();
                    }else{
                        alert(data.message);
                    }
                }      
        });
    }
    $('#deleteObject').hide();
});

$('#modal').on("click","#saveObject",function(e){
    e.preventDefault();
    submitForm = true;
    $.each($('#modal input:not([type=button]):not([type=reset]):not([type=submit]):not([type=hidden])'), function(i,input){ 
      if($(input).val() == '') 
        {
          $(input).addClass('hasError');
          submitForm = false;  
        }
    });
    console.log(submitForm);
    if(submitForm == true){
        $('#objectForm').submit();
    }else{
        $('.errorMessage').show();
        return false;
    }
});

$('#modal').on('click','.hasError',function(){
    $(this).removeClass('hasError');
});

</script>