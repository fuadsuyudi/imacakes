// JavaScript Document
var request;
function createrequest() 
{
  try 
  {
    request = new XMLHttpRequest();
	request2 = new XMLHttpRequest();
	request3 = new XMLHttpRequest();
  } 
  catch (trymicrosoft) 
  {
    try 
	{
      request = new ActiveXObject("Msxml2.XMLHTTP");
	  request2 = new ActiveXObject("Msxml2.XMLHTTP");
	  request3 = new ActiveXObject("Msxml2.XMLHTTP");
    } 
	catch (othermicrosoft) 
	{
      try 
	  {
        request = new ActiveXObject("Microsoft.XMLHTTP");
		request2 = new ActiveXObject("Microsoft.XMLHTTP");
		request3 = new ActiveXObject("Microsoft.XMLHTTP");
      } 
	  catch (failed) 
	  {
        request = false;
		request2 = false;
		request3 = false;
      }
    }
  }

  if (!request)
    alert("Error initializing AJAX Request, Silahkan Update Browser Anda !");
}
function getDialog(id,idPic,objectNama,objectFloor,objectLokasi,objectType)
{
	var variabel2 = 'dialog.php?do=addObject&id='+id+'&idPic='+idPic+'&objectNama='+objectNama+'&objectFloor='+objectFloor+'&objectLokasi='+objectLokasi+'&objectType='+objectType;
	request2.open('get',variabel2);
	request2.onreadystatechange = parseGetDialog;
	request2.send('');		
}
function parseGetDialog()
{
	var answer2  = request2.responseText;
	document.getElementById("modal").innerHTML = answer2;
	$(document).ready(function() {
			$('#modal').reveal({ // The item which will be opened with reveal
				animation: 'none',                   // fade, fadeAndPop, none
				animationspeed: 50,                       // how fast animtions are
				closeonbackgroundclick: true,              // if you click background will modal close?
				dismissmodalclass: 'close'    // the class of a button or element that will close an open modal
			});

		if($("#scheduleStartDate").length > 0){
			var dateToday = new Date();
            $('#scheduleStartDate').datepicker({
                  dateFormat: "D, yy-mm-dd",
                  minDate: dateToday,
            });
            $('#scheduleEndDate').datepicker({
                  dateFormat: "D, yy-mm-dd",
                  minDate: dateToday,
            });
		

		$('.clockpickerMain').clockpicker({
			autoclose: true,
			placement: 'bottom',
    		'default': 'now',
    		donetext: "done"
		}); 

		$('.clockpicker').clockpicker({
			autoclose: true,
			placement: 'top',
    		'default': 'now',
    		donetext: "done"
		}); 

		}else if($("#jam").length > 0){
			$('.clockpicker').clockpicker({
				autoclose: true,
				placement: 'top',
	    		'default': 'now',
	    		donetext: "done"
			}); 
		}

		return false;
	});	
}
function getDialog2()
{
	
	var objectNama=document.getElementById('objectNama').value;
	var objectFloor=document.getElementById('objectFloor').value;
	var objectLokasi=document.getElementById('objectLokasi').value;
	//var objectType=document.getElementById('objectType').value;
	var id=document.getElementById('id').value;
	
	var variabel2 = 'dialog_icon.php?id='+id+'&objectNama='+objectNama+'&objectFloor='+objectFloor+'&objectLokasi='+objectLokasi;
	request2.open('get',variabel2);
	request2.onreadystatechange = parseGetDialog2;
	request2.send('');		
}
function parseGetDialog2()
{
	var answer2  = request2.responseText;
	document.getElementById("modal").innerHTML = answer2;
	$(document).ready(function() {
			$('#modal').reveal({ // The item which will be opened with reveal
				animation: 'none',                   // fade, fadeAndPop, none
				animationspeed: 50,                       // how fast animtions are
				closeonbackgroundclick: true,              // if you click background will modal close?
				dismissmodalclass: 'close'    // the class of a button or element that will close an open modal
			});
		return false;
	});	
}
function getDelete(id,part)
{
	if(part=='object')
	{
		window.location="proses_delete.php?id="+id+"&part="+part;
	}
	else if(part=='user')
	{
		window.location="proses_delete.php?id="+id+"&part="+part;
	}
	else if(part=='profile')
	{
		window.location="proses_delete.php?id="+id+"&part="+part;
	}
	else if(part=='schedule')
	{
		window.location="proses_delete.php?id="+id+"&part="+part;
	}
}
function getUser()
{
	var variabel2 = 'dialog.php?do=addUser';
	request2.open('get',variabel2);
	request2.onreadystatechange = parseGetDialog;
	request2.send('');		
}
function getSchedule()
{
	var variabel2 = 'dialog.php?do=addSchedule';
	request2.open('get',variabel2);
	request2.onreadystatechange = parseGetDialog;
	request2.send('');	
}
function getEditSchedule(id)
{
	var variabel2 = 'dialog.php?do=editSchedule&id='+id;
	request2.open('get',variabel2);
	request2.onreadystatechange = parseGetDialog;
	request2.send('');
}
function getEditUser(id)
{
	var variabel2 = 'dialog.php?do=editUser&id='+id;
	request2.open('get',variabel2);
	request2.onreadystatechange = parseGetDialog;
	request2.send('');
}
function getEditProfile(id)
{
	var variabel2 = 'dialog.php?do=editProfile&id='+id;
	request2.open('get',variabel2);
	request2.onreadystatechange = parseGetDialog;
	request2.send('');
}
function getProfile()
{
	var variabel2 = 'dialog.php?do=addProfile';
	request2.open('get',variabel2);
	request2.onreadystatechange = parseGetDialog;
	request2.send('');
}
function getAuth(param)
{
	var variabel = 'ax_auth.php?do='+param;
	request.open('get',variabel);
	request.onreadystatechange = parseGetAuth;
	request.send('');
}
function parseGetAuth()
{
	var answer  = request.responseText;
	document.getElementById("profAuth").innerHTML = answer;			
	$('.clockpicker').clockpicker({
		autoclose: true,
		placement: 'top',
		'default': 'now',
		donetext: "done"
	}); 
}
function getChange(id)
{
	var src = document.getElementById(id).src;   
	var imgsrc = src.substring(src.lastIndexOf("/")+1);
	if  (imgsrc == "off.png")
	{
		document.getElementById(id).src = "images/on.png";
		console.log('if'+document.getElementById(id).src);
		document.getElementById('nilai'+id).value='1';
	}
	else 
	{
		document.getElementById(id).src = "images/off.png";
		console.log('if'+document.getElementById(id).src);
		document.getElementById('nilai'+id).value='0';
	}
}
function getOn(id)
{
	// var src = document.getElementById(id).src;   
	// if(document.getElementById('cb'+id).checked==true)
	// {
	// 	document.getElementById(id).src = "images/on.png";
	// 	console.log('if'+document.getElementById(id).src);
	// 	document.getElementById('nilai'+id).value='1';
	// }
	// else
	// {
	// 	document.getElementById(id).src = "images/none.png";
	// 	console.log('if'+document.getElementById(id).src);
	// 	document.getElementById('nilai'+id).value='0';
	// }
}
/*function getTurn(id,param)
{
	var src = document.getElementById(id).src;   
	var imgsrc = src.substring(src.lastIndexOf("/")+1);
	if  (imgsrc == param+".png")
	{
		document.getElementById(id).src = "images/"+param+"-off.png";
		console.log('if'+document.getElementById(id).src);
		updateDb(id,'off')
	}
	else 
	{
		document.getElementById(id).src = "images/"+param+".png";
		console.log('if'+document.getElementById(id).src);
		updateDb(id,'on')
	}
}
function updateDb(id,param)
{
	var variabel = 'ax_home.php?id='+id+'&do='+param;
	request2.open('get',variabel);
	request2.send('');
}*/
function getTurn(id_gambar,object_id,param,user_id)
{
	var variabel = 'ax_lib.php?object_id='+object_id+'&param='+param+'&user_id='+user_id;
	request2.open('get',variabel);
	request2.onreadystatechange = parseGetTurn;
	request2.send('');
	location.reload();
}
function toggleSchedule(scheduleDiv,scheduleID,param,user_id)
{
    $.each($(scheduleDiv).parent().find('div'), function(i,toggle){
	    if($(toggle).hasClass('toggleOn')){
	      $(toggle).removeClass('toggleOn');
	      $(toggle).addClass('toggleOff');
	    }else{
	      $(toggle).removeClass('toggleOff');
	      $(toggle).addClass('toggleOn');
	    }
 	});

    scheduleID = scheduleID+1000;

	var variabel = 'ax_lib.php?object_id='+scheduleID+'&param='+param+'&user_id='+user_id;
	request2.open('get',variabel);
	request2.onreadystatechange = parseGetTurn;
	request2.send('');
}
function toggleProfile(profileDiv,profileID,user_id)
{
	$('.entryProfile').removeClass('selectedProfile');
	$(profileDiv).addClass('selectedProfile');
	var variabel = 'ax_lib.php?object_id=0&param='+profileID+'&user_id='+user_id;
	request2.open('get',variabel);
	request2.onreadystatechange = parseGetTurn;
	request2.send('');
}
function parseGetTurn()
{
	var answer  = request2.responseText;
	//if(answer != '') alert(answer);
	//document.getElementById("test").innerHTML = answer;
}
function getChangeStatus(lantai, nama)
{
	var variabel = 'ajax.php?do=gantiStatus&lantai='+lantai+'&nama='+nama;
	request.open('get',variabel);
	request.onreadystatechange = parseGetChangeStatus;
	request.send('');
}
function parseGetChangeStatus()
{
	var answer  = request.responseText;
	document.getElementById("statusIsi").innerHTML = answer;
}
function getReset()
{
	username=document.getElementById("username").value;
	if(username!='')
	{
		var Yakin=window.confirm("I will reset your password\nYou can check your password on cover of my hardware?");
		if(Yakin)
		{
			window.location="index.php?to=reset&id="+username;
		}
	}
	else
	{
		alert("Username must be fill");
	}
}
function getChange()
{
	username=document.getElementById("username").value;
	if(username!='')
	{
		window.location="change_pass.php?id="+username;
	}
	else
	{
		alert("Username must be fill");
	}
}
function getBack()
{
	window.location="index.php";
}
function getNotif(id)
{
	var variabel = 'ajax.php?do=updateNotif&id='+id;
	request2.open('get',variabel);
	request2.onreadystatechange = parseGetNotif;
	request2.send('');
}
function parseGetNotif()
{
	var answer  = request2.responseText;
	document.getElementById("test").innerHTML = answer;
}