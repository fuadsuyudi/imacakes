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

<body id="profile" onload="createrequest()">
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
                    <td width="180">
                    	Profile Name <a href="profile.php?sort=name"><img src="images/auto.png" height="15" /></a>
                    </td>
                    <td width="70">
                    	Sun <a href="profile.php?sort=sun"><img src="images/auto.png" height="15" /></a>
                    </td>
                    <td  width="70">
                    	Mon <a href="profile.php?sort=mon"><img src="images/auto.png" height="15" /></a>
                    </td>
                    <td  width="70">
                    	Tue <a href="profile.php?sort=tue"><img src="images/auto.png" height="15" /></a>
                    </td>
                    <td  width="70">
                    	Wed <a href="profile.php?sort=wed"><img src="images/auto.png" height="15" /></a>
                    </td>
                    <td  width="70">
                    	Thu <a href="profile.php?sort=thurs"><img src="images/auto.png" height="15" /></a>
                    </td>
                    <td  width="70">
                    	Fri <a href="profile.php?sort=fri"><img src="images/auto.png" height="15" /></a>
                    </td>
                    <td  width="70">
                    	Sat <a href="profile.php?sort=sat"><img src="images/auto.png" height="15" /></a>
                    </td>
                    <td  width="70">
                    	Time <a href="profile.php?sort=time"><img src="images/auto.png" height="15" /></a>
                    </td>
                </tr>
                <?php
					if($_GET['sort']=='name')
					{
						$profile=mysql_query("select * from profile_master group by profile_name order by profile_name");
					}
					else if($_GET['sort']=='sun')
					{
						$profile=mysql_query("select * from profile_master group by profile_name order by sunday");
					}
					else if($_GET['sort']=='mon')
					{
						$profile=mysql_query("select * from profile_master group by profile_name order by monday");
					}
					else if($_GET['sort']=='tue')
					{
						$profile=mysql_query("select * from profile_master group by profile_name order by tuesday");
					}
					else if($_GET['sort']=='wed')
					{
						$profile=mysql_query("select * from profile_master group by profile_name order by wednesday");
					}
					else if($_GET['sort']=='thurs')
					{
						$profile=mysql_query("select * from profile_master group by profile_name order by thursday");
					}
					else if($_GET['sort']=='sat')
					{
						$profile=mysql_query("select * from profile_master group by profile_name order by saturday");
					}
					else if($_GET['sort']=='fri')
					{
						$profile=mysql_query("select * from profile_master group by profile_name order by friday");
					}
					else if($_GET['sort']=='time')
					{
						$profile=mysql_query("select * from profile_master group by profile_name order by time");
					}
					else
					{
						$profile=mysql_query("select * from profile_master group by profile_name");
					}
                	
					while($rowProfile=mysql_fetch_array($profile))
					{
						?>
						<tr class="isiContent kursor" height="30" onclick="getEditProfile('<?php echo $rowProfile['profile_id']?>')" >
                            <td width="50">
                            
                            </td>
                            <td>
                                <?php echo $rowProfile['profile_name']?>
                            </td>
                            <td>
                                <?php
                                	if($rowProfile['sunday']=='1')
									{
										?>&#10004<?php
									}
								?>
                            </td>
                            <td>
                                <?php
                                	if($rowProfile['monday']=='1')
									{
										?>&#10004<?php
									}
								?>
                            </td>
                            <td>
                                <?php
                                	if($rowProfile['tuesday']=='1')
									{
										?>&#10004<?php
									}
								?>
                            </td>
                            <td>
                                <?php
                                	if($rowProfile['wednesday']=='1')
									{
										?>&#10004<?php
									}
								?>
                            </td>
                            <td>
                                <?php
                                	if($rowProfile['thursday']=='1')
									{
										?>&#10004<?php
									}
								?>
                            </td>
                            <td>
                                <?php
                                	if($rowProfile['friday']=='1')
									{
										?>&#10004<?php
									}
								?>
                            </td>
                            <td>
                                <?php
                                	if($rowProfile['saturday']=='1')
									{
										?>&#10004<?php
									}
								?>
                            </td>
                            <td>
                                <?php
									echo $rowProfile['time'];
								?>
                            </td>
                		</tr>
                        <tr>
                        	<td colspan="10" class="isiContent">
                            	<hr color="#a59a84" width="100%"/>
                            </td>
                        </tr>
						<?php
					}
				?>
                <tr class="isiFooter" height="30">
                	<td>
                    
                    </td>
                    <td onclick="getProfile()" class="kursor">
                    	Add more profile
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
    $('.profileToggle').toggle(checkBoxes.prop("checked"))
});
var element;
$('#modal').on('click','.profileToggleOn,.profileToggleOff',function(){
    if($(this).hasClass('profileToggleOff')){
        if($(this).html() == "On" ){
              $(this).closest('.checkArea').find('.nilai').val(1);
        }else if($(this).html() == "Off"){
              $(this).closest('.checkArea').find('.nilai').val(0);
        }
      $(this).removeClass('profileToggleOff');
      $(this).addClass('profileToggleOn');
      $(this).siblings().removeClass('profileToggleOn');
      $(this).siblings().addClass('profileToggleOff');
    }
});

$('#modal').on('change','.profileCheck',function(){
    $(this).closest('.checkArea').find('.profileToggle').toggle();
});

var element;

$('#modal').on("click","#submitProfile,#submitEditProfile",function(e){
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