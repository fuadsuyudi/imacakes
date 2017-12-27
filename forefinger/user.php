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

<body id="user" onload="createrequest()">
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
                    <td width="100">
                    	User ID <a href="user.php?sort=id"><img src="images/auto.png" height="15" /></a>
                    </td>
                    <td width="150">
                    	Name <a href="user.php?sort=name"><img src="images/auto.png" height="15" /></a>
                    </td>
                    <td  width="200">
                    	Last Change Password <a href="user.php?sort=time"><img src="images/auto.png" height="15" /></a>
                    </td>
                </tr>
                <?php
					if($_GET['sort']=='id')
					{
						$member=mysql_query("select * from user_master order by user_id");
					}
					else if($_GET['sort']=='name')
					{
						$member=mysql_query("select * from user_master order by cust_name");
					}
					else if($_GET['sort']=='time')
					{
						$member=mysql_query("select * from user_master order by changed_on");
					}
					else
					{
						$member=mysql_query("select * from user_master");
					}
                	
					while($rowMember=mysql_fetch_array($member))
					{
						?>
						<tr class="isiContent kursor" height="30" onclick="getEditUser('<?php echo $rowMember['user_id']?>')" >
                            <td width="50">
                            
                            </td>
                            <td>
                                <?php echo $rowMember['user_id']?>
                            </td>
                            <td>
                                <?php echo $rowMember['cust_name']?>
                            </td>
                            <td>
                                <?php echo date("d-m-Y H:i:s", strtotime($rowMember['changed_on']));?>
                            </td>
                		</tr>
                        <tr class="isiContent">
                        	<td colspan="4">
                            <hr color="#a59a84" width="100%"/>
                            </td>
                        </tr>
						<?php
					}
				?>
                <tr class="isiFooter" height="30">
                	<td>
                    
                    </td>
                    <td onclick="getUser()" class="kursor">
                    	Add more user
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

$('#modal').on('click','.checkAll',function(){
    var checkBoxes= $(this).closest('table').find('input[type=checkbox]');
    checkBoxes.prop("checked", !checkBoxes.prop("checked"));
});

$('#modal').on("click","#submitUser,#submitEditUser",function(e){
    e.preventDefault();
    submitForm = true;
    //validasi input text
    $.each($('#modal input[type=text]'), function(i,input){ 
      if($(input).val() == '') 
        {
          $(input).addClass('hasError');
          $(input).closest('.errorMessage').show();
          submitForm = false;  
          $(input).closest('.objectSeparator').find('.errorMessage').show();
        }
    });
    //validasi checkbox
    $.each($('.checkBoxList'), function(i,separator){
        checkedCheckBoxes = 0;
        $.each($(separator).find('input[type=checkbox]'), function(i,input){ 
            if($(input).prop("checked")){
                checkedCheckBoxes++;
            }
        });
        if(checkedCheckBoxes < 1){
              $(separator).find('.errorMessage').show();
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