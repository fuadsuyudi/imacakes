<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="scripts/jquery-ui/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="scripts/clockpicker/clockpicker.css" type="text/css">
<title>Forefinger</title>
<script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="scripts/clockpicker/clockpicker.js"></script>
<script type="text/javascript" src="scripts/java.js"></script>
<script type="text/javascript" src="scripts/jquery.reveal.js"></script>
<script type="text/javascript" src="scripts/ticker00.js"></script>
<script type="text/javascript">
$(document).ready(function(){
		$('#fade').list_ticker({
			speed:12000,
			effect:'fade'
		});
	})
$(document).ready( function() {
    $("#notif").click( function() {
	    $('#notifModal').reveal({ // The item which will be opened with reveal
					animation: 'fade',                   // fade, fadeAndPop, none
					animationspeed: 300,                       // how fast animtions are
					closeonbackgroundclick: true,              // if you click background will modal close?
					dismissmodalclass: 'close'    // the class of a button or element that will close an open modal
				});
	    });
     $('#contentDialogNotif').on('scroll', function(event){
     	event.stopPropagation();
        if($(this).scrollTop() + $(this).innerHeight()>=$(this)[0].scrollHeight)
        {
          $('.notifLoading').fadeIn();
			$.ajax({
		        	context: this,
			   		url :  "ajax_call.php",
					type: 'post',
					data: {
							'method'    : 'getLastNotif',
							'user_id'   : '<?php echo $_SESSION['forefinger'];?>'
						},
					dataType:"JSON",
			    	success: function(data){	  
			    		if(data.status == 1){
          					$('#notifContentDiv').html(data.notif);
          					$('.notifLoading').fadeOut();    
          					$('#contentDialogNotif').animate({
						        scrollTop: 0
						    }, 500);
			    		}else{
							alert('something wrong');
						}
			    	}      
			});
        }
      });
});    
</script>
    
<?php
if(base64_decode($_GET['err'])=='inputSuccess')
{
	?>
	<script type="text/javascript">
		alert("Input data success");
	</script>
	<?php
}
else if(base64_decode($_GET['err'])=='inputFail')
{
	?>
	<script type="text/javascript">
		alert("Input data fail. Please try again later or contact administrator");
	</script>
	<?php
}
else if(base64_decode($_GET['err'])=='deleteSuccess')
{
	?>
	<script type="text/javascript">
		alert("Delete data success");
	</script>
	<?php
}
else if(base64_decode($_GET['err'])=='deleteFail')
{
	?>
	<script type="text/javascript">
		alert("Delete data fail. Please try again later or contact administrator");
	</script>
	<?php
}
else if(base64_decode($_GET['err'])=='userDuplicate')
{
	?>
	<script type="text/javascript">
		alert("Insert data fail. User ID already exists");
	</script>
	<?php
}
else if($pesan=='gagal')
{
	?>
	<script type="text/javascript">
		alert("Sorry I can’t recognize you\nPlease recheck your User ID and Password");
	</script>
	<?php
}
else if($pesan=='resetSukses')
{
	?>
	<script type="text/javascript">
		alert("Done!\nPlease check cover of my hardware for your new password");
	</script>
	<?php
}
else if($pesan=='resetGagal')
{
	?>
	<script type="text/javascript">
		alert("Reset password fail.\nPlease contact administrator");
	</script>
	<?php
}
else if($pesan=='changeSukses')
{
	?>
	<script type="text/javascript">
		alert("Done!\nYour password has been successfully changed");
	</script>
	<?php
}
else if($pesan=='changeGagal')
{
	?>
	<script type="text/javascript">
		alert("Change password fail.\nPlease contact administrator");
	</script>
	<?php
}
else if($pesan=='changeBeda')
{
	?>
	<script type="text/javascript">
		alert("New password and retype password not match");
	</script>
	<?php
}
else if($pesan=='oldSalah')
{
	?>
	<script type="text/javascript">
		alert("Your old password is wrong");
	</script>
	<?php
}
?>