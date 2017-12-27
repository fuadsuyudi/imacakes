<?php
	include 'session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include 'title.php';
?>
</head>
<body id="login">
	<div id="formLogin">
    	<div id="logoField">
        	<div id="logo">
            	<img src="images/logo.png" width="150" />
            </div>
        </div>
        <div id="formUsername">
        	<form action="index.php" method="post">
        	<table width="300" align="center">
            	<tr>
                	<td colspan="2" height="50">
                    	<input type="password" name="oldPass" id="oldPass" class="fieldBorderRadius" placeholder="Old password" />
                    </td>
                </tr>
                <tr>
                	<td colspan="2">
                    	<input type="password" name="newPass" id="newPass" class="fieldBorderRadius" placeholder="New password" />
                    </td>
                </tr>
                <tr>
                	<td colspan="2">
                    	<input type="password" name="rePass" id="rePass" class="fieldBorderRadius" placeholder="Retype new password" />
                    </td>
                </tr>
                <tr>
                	<td height="40" class="errorLogin">
                    	
                    </td>
                </tr>
                <tr>
                	<td colspan="2" align="center">
                    	<input type="hidden" name="username" value="<?php echo $_GET['id']?>" />
                    	<input type="submit" name="changePass" value="Continiu" class="buttonBorderReset" />&nbsp;&nbsp;&nbsp; <input type="submit" name="submit" value="Cancel" class="buttonBorderReset" onclick="getBack()" />
                    </td>
                </tr>
                <tr>
                	<td colspan="2" height="10">
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</body>
</html>