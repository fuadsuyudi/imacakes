<style type="text/css">
/* 
	Ibrahim 18-10-2105
	Remove The image background and change it with css
 */
#resetPassword {
	position: absolute;
    z-index: 5;
    margin: 20px auto 0px auto;
    width: 617px;
    max-height: 93%;
    min-height: 600px;
    left: 50%;
    margin-left: -308px;
    background: rgba(81, 73, 73, 0.75);
    border-radius: 50%;
    display: none;
}

#formLoginX{
	/* Redesign By Ibrahim */
	position: absolute;
    z-index: 1;
    margin: 20px auto 0px auto;
    width: 617px;
    max-height: 93%;
    min-height: 600px;
    left: 50%;
    margin-left: -308px;
    /*background: rgb(182, 170, 146);*/
    border-radius: 50%;    
    background: -webkit-linear-gradient(right, red , blue);
    background: -o-linear-gradient(right, red, blue);
    background: -moz-linear-gradient(right, #A1937E, #E0D6C1);
    background: linear-gradient(to top right, #A1937E , #E0D6C1);
}

.fieldBorderRadius{
    height: 40px !important;
    margin-left: 20px !important;
}

.errorLoginMsg{
    font-size: 12px;
    font-family: helvetica;
    color: #fff;
    text-align: center;
}

.fieldBorderRadiusReset{
	border-radius: 20px;
    padding: 10px 10px;
    width: 260px;
    font-family: helvetica;
    background: rgba(0, 0, 0, 0.51);
    border: none;
    color: #FFF;
    height: 40px;
    margin-left:20px;
}

.smallButton{
	display: inline-block;
	width: 48% !important;
}

.whiteButton{
    background: rgba(255, 255, 255, 0.91) !important;
    color: rgba(0, 0, 0, 0.76) !important;
    font-size: 15px !important;
}

.bigMsg{
    font-size: 17px;
    font-family: helvetica;
    color: #fff;
    text-align: center;
}

</style>

<?php
	include 'session.php';
    $err = "";
    $pesan = "";
	if(isset($_POST['loginSubmit']))
	{
        $_POST['username'] = strtolower($_POST['username']);
		$login=mysql_query("select * from user_password where user_id='".$_POST['username']."' and user_pass_satu='".base64_encode($_POST['password'])."'");
		$_POST['password'];
		if(mysql_num_rows($login)!=0)
		{
			$_SESSION['forefinger']=$_POST['username'];
			$cekLog=mysql_query("select * from user_log where user_id='".$_POST['username']."'");
			if(mysql_num_rows($cekLog)==0)
			{
				$insert=mysql_query("insert into user_log (user_id, last_login) values ('".$_POST['username']."','".date("Y-m-d H:i:s")."')");
			}
			else
			{
				$update=mysql_query("update user_log set last_login='".date("Y-m-d H:i:s")."' where user_id='".$_POST['username']."'");
			}
			header("location:halaman_utama.php");
		}
		else
		{
			$_SESSION['forefinger']=$_POST['username'];
			$cekLog=mysql_query("select * from user_log where last_ip='".get_client_ip()."'");
			if(mysql_num_rows($cekLog)==0)
			{
				$insert=mysql_query("INSERT into user_log (user_id, last_login , last_ip , num_fail) VALUES ('".$_POST['username']."','".date("Y-m-d H:i:s")."','".get_client_ip()."',1)");
			}
			else
			{
				$update=mysql_query("UPDATE user_log SET last_login='".date('Y-m-d H:i:s')."' , num_fail = num_fail + 1 
									 WHERE last_ip='".get_client_ip()."'");
			}

			$pesan='Sorry I cannot recognize you </br> Please check your user name and password';
		}
	}


    // ibrahim 19-10-2015
    // Function to get the client IP address
    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include 'title.php';
?>
</head>
<body id="login">

	<div id="resetPassword">
		<div id="logoField">
        	<div id="logo">
            </div>
        </div>
        <div id="formUsername">
        	<form action="#" method="post">
        	<table width="450" align="center" id="resetPasswordArea">
                <tr>
                	<td height="100" class="bigMsg">
                    </td>
                </tr>
                <tr id="continueResetButton">
                	<td align="center"  colspan="2" >
                    	<input type="submit" name="continue" value="Continue" class="buttonBorder smallButton whiteButton" />
                    	<input type="submit" name="cancel" value="Cancel" class="buttonBorder smallButton whiteButton" />
                    </td>
                </tr>
                <tr id="backToLogin" style="display:none;">
                	<td  colspan="2"  align="center" >
                    	<input type="submit" name="backToLogin" value="Back To Login" class="buttonBorder whiteButton closeForm" />
                    </td>
                </tr>
                <tr>
                	<td colspan="2" height="10">
                    </td>
                </tr>
            </table>

            <table width="300" align="center" id="changePasswordArea" style="display:none;">
            	<tr class="changePasswordInput">
                	<td colspan="2" height="50">
                    	<input type="text" name="oldPassword" id="oldPassword" class="fieldBorderRadiusReset" onfocus="this.placeholder = ''" placeholder="Old Password" onblur="this.placeholder = 'Old Password'" />
                    </td>
                </tr>
                <tr class="changePasswordInput">
                	<td colspan="2">
                    	<input type="password" name="newPassword" id="newPassword" class="fieldBorderRadiusReset" onfocus="this.placeholder = ''" placeholder="New Password" onblur="this.placeholder = 'New Password'" />
                    </td>
                </tr>
                <tr class="changePasswordInput">
                	<td colspan="2">
                    	<input type="password" name="ReNewPassword" id="ReNewPassword" class="fieldBorderRadiusReset" onfocus="this.placeholder = ''" placeholder="Retype New Password" onblur="this.placeholder = 'Retype New Password'" />
                    </td>
                </tr>
                <tr>
                	<td height="100" class="bigMsg">
                    </td>
                </tr>
                <tr id="continueChangeButton">
                	<td align="center"  colspan="2" >
                    	<input type="submit" name="continue" value="Continue" class="buttonBorder smallButton whiteButton" />
                    	<input type="submit" name="cancel" value="Cancel" class="buttonBorder smallButton whiteButton" />
                    </td>
                </tr>
                <tr id="backToLogin2" style="display:none;">
                	<td  colspan="2"  align="center" >
                    	<input type="submit" name="backToLogin" value="Back To Login" class="buttonBorder whiteButton closeForm" />
                    </td>
                </tr>
            </table>

            </form>
        </div>
	</div>

	<div id="formLoginX">
    	<div id="logoField">
        	<div id="logo">
            	<img src="images/logo.png" width="150" />
            </div>
        </div>
        <div id="formUsername">
        	<form action="#" method="post" id="loginForm">
        	<table width="300" align="center">
            	<tr>
                	<td colspan="2" height="50">
                    	<input type="text" name="username" id="username" class="fieldBorderRadius"  onfocus="this.placeholder = ''" placeholder="User name" onblur="this.placeholder = 'User name'" />
                    	<input type="hidden" name="loginSubmit" val="login" />
                    </td>
                </tr>
                <tr>
                	<td colspan="2">
                    	<input type="password" name="password" id="password" class="fieldBorderRadius" onfocus="this.placeholder = ''" placeholder="Password" onblur="this.placeholder = 'Password'" />
                    </td>
                </tr>
                <tr>
                	<td height="40" class="errorLoginMsg">
                    	<?php echo $pesan; ?>
                    </td>
                </tr>
                <tr>
                	<td colspan="2" align="center">
                    	<input type="submit" name="login" value="Login" class="buttonBorder" style="width:260px !important;"/>
                    </td>
                </tr>
                <tr>
                	<td colspan="2" height="10">
                    </td>
                </tr>
                <tr class="errorLogin" align="center">
                	<td>
                    	<span onclick="resetPassword()" class="kursor">Forgot Password</span> &nbsp;&nbsp;&bull;&nbsp;&nbsp;
                    	<span onclick="changePassword()" class="kursor">Change Password</span>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
$("#loginForm").submit(function(e) {
     e.preventDefault();

     var form = this;

     if($('#username').val() == '' || $('#password').val() == '' ){

     	$('.errorLoginMsg').html('Please fill in your user name and password');

     	return false; 
     } 


	$.ajax({
        	context: this,
	   		url :  "ajax_call.php",
			type: 'post',
			data: {
					'method'    : 'checkLoginAttemp',
					'user_id'   : $('#username').val()
				},
			dataType:"JSON",
	    	success: function(data){	  
	    		if(data.status == 1){
     				form.submit();
	    		}else{
					$('.errorLoginMsg').html(data.message);
	    		}
	    	}      
	});

});

function resetPassword(){
	$('#changePasswordArea').hide();
	$('#resetPasswordArea').show();
	$('#resetPassword').show();
	$('#resetPasswordArea .bigMsg').html('I will reset your password</br>You can check your new password on hardware panel');
	$('#backToLogin').hide();
	$('#continueResetButton').show();
}

function changePassword(){
	$('#resetPasswordArea').hide();
	$('#backToLogin2').hide();
	$('#changePasswordArea').show();
	$('#resetPassword').show();
	$('.changePasswordInput').show();
	$('#continueChangeButton').show();
}

$('#continueResetButton input').click(function(e){
	e.preventDefault();
	if($(this).val() == "Cancel"){
		$('#resetPassword').hide();
	}else if($(this).val() == "Continue"){

		if($('#username').val() == '') {
			$('#resetPasswordArea .bigMsg').html('User name must be filled');
			return false;
		}

		$.ajax({
		   		url :  "ajax_call.php",
				type: 'post',
				data: {
						'method'  : 'resetPassword',
						'user_id'  : $('#username').val()
					},
				dataType:"JSON",
		    	success: function(data){	  

		    		if(data.status == 1){
						$('#continueResetButton').hide();
						$('#backToLogin').show();
		    		}
					$('#resetPasswordArea .bigMsg').html(data.message);
		    	}      
		});
	}
});

$('#continueChangeButton input').click(function(e){
	e.preventDefault();
	if($(this).val() == "Cancel"){
		$('#resetPassword').hide();
	}else if($(this).val() == "Continue"){
		
		if($('#username').val() == '') {
			$('#changePasswordArea .bigMsg').html('User name must be filled');
			return false;
		}else if($('#oldPassword').val() == ''){
			$('#changePasswordArea .bigMsg').html('Old password must be filled');
			$('#oldPassword').focus();
			return false;
		}else if($('#newPassword').val() == ''){
			$('#changePasswordArea .bigMsg').html('New password must be filled');
			$('#newPassword').focus();
			return false;
		}else if($('#ReNewPassword').val() == ''){
			$('#changePasswordArea .bigMsg').html('Retype New password password must be filled');
			$('#ReNewPassword').focus();
			return false;
		}else if($('#ReNewPassword').val() != $('#newPassword').val()){
			$('#changePasswordArea .bigMsg').html('You must enter the same password twice in order to confirm it');
			$('#ReNewPassword').focus();
			return false;
		}

		$.ajax({
		   		url :  "ajax_call.php",
				type: 'post',
				data: {
						'method'  : 'changePassword',
						'user_id'  : $('#username').val(),
						'password'  : $('#password').val()
					},
				dataType:"JSON",
		    	success: function(data){	  

		    		if(data.status == 1){
						$('#continueChangeButton').hide();
						$('.changePasswordInput').hide();
						$('#backToLogin2').show();
		    		}
					$('#changePasswordArea .bigMsg').html(data.message);
		    	}      
		});
	}
});


$('#backToLogin,#backToLogin2 input').click(function(e){
	e.preventDefault();
	$('#resetPassword').hide();
});

$(document).ready(function(){
    if ($.browser.webkit)
    $('input]').attr('autocomplete', 'off');
});

</script>