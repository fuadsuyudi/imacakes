<?php
include 'session.php';
//Creator    : Ibrahim
//Date       : 07-10-2015
//File 	     : Ajax.php
//Keterangan : menghandle ajax request
//Parameter  : method = Nama ajax method yang di panggil
//Catatan 	 : Enckripsi password masih menggunakan base64 
//			   seperti yang dikerjakan oleh pembuat program sebelumnya (Ibrahim 18-10-2015 17:43) 

date_default_timezone_set('Asia/Jakarta');
switch ($_POST['method']) {

	case 'resetPassword':
	
	// ibrahim 18-10-2015
	// modul reset password
	// mereset password ke default machine yang tersimpan pada user_pass_dua, 
	// data pada user_pass_dua didapat dari other header ketika akun dibuat

	$user_id = isset($_POST['user_id']) && !empty($_POST['user_id']) ? $_POST['user_id'] : '';

	if(empty($user_id)){
	    $data = array( 'status'  => 0 ,
	    			   'message' => 'User Name Must Be Filled' );
	}else{
	
		$conn = dbConnect();
		$sql = "select user_pass_dua from user_password where user_id='{$user_id}'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    $row = $result->fetch_assoc();
			$sql = "update user_password set user_pass_satu='{$row['user_pass_dua']}' where user_id='{$user_id}'";
			if ($result = $conn->query($sql) === TRUE ) {
			    $data = array( 'status'  => 1 ,
			    			   'message' => 'Done!</br>Please check cover of hardware panel for your password' );
			} else {
			    $data = array( 'status'  => 0 ,
			    			   'message' => 'Reset password failed, please call our support');
			}
		}else{
		    $data = array( 'status'  => 0 ,
		    			   'message' => 'User name not found');
		}
	}
	echo json_encode($data);
	$conn->close();

	break;

	case 'changePassword':

		// ibrahim 18-10-2015
		// modul change password
		// mengubah password dengan password baru yang di miliki oleh user
		// catatan : belum ada validasi jika ada profile aktif karena profile masih belum dibuat

		$user_id = isset($_POST['user_id']) && !empty($_POST['user_id']) ? $_POST['user_id'] : '';
		$password = isset($_POST['password']) && !empty($_POST['password']) ? base64_encode($_POST['password']) : '';
		$conn = dbConnect();
		$sql = "update user_password set user_pass_satu='{$password}' where user_id='{$user_id}'";
		if ($result = $conn->query($sql) === TRUE ) {
		    $data = array( 'status'  => 1 ,
		    			   'message' => 'Done!</br>Your password has been successfully updated' );
		} else {
		    $data = array( 'status'  => 0 ,
		    			   'message' => 'change password failed, please call our support');
		}

		echo json_encode($data);
		$conn->close();
	break;

	case 'checkLoginAttemp':
		// ibrahim 18-10-2015
		// modul Check Login Attemp
		// Cek User Log apabila num_fail sudah mencapai angka 5 maka tunggu 10 menit hingga dia bisa login kembali
		//$user_id = isset($_POST['user_id']) && !empty($_POST['user_id']) ? $_POST['user_id'] : '';
		$conn = dbConnect();
		$sql = "SELECT last_login,num_fail FROM user_log WHERE last_ip = '".get_client_ip()."'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
		    $row = $result->fetch_assoc();
		    // validasi apakah num_fail telah melebihi 5 kali
			if($row['num_fail'] >= 5){
			    // Cek apakah sudah melewati waktu tunggu 10 menit
				$last_login = strtotime(date($row['last_login']));
				$now = strtotime("now");
				$interval  = abs($now - $last_login);
				$minutes   = round($interval / 60);
				if($minutes <= 10){
				    $data = array( 'status'  => 0,
				    			   'message' => 'Please wait for '.( 10-$minutes).' minutes before you can login.');
				}else{
					$sql = "UPDATE user_log SET last_login='".date('Y-m-d H:i:s')."' , num_fail = 0
									 WHERE last_ip = '".get_client_ip()."'";
					$conn->query($sql);
				    $data = array( 'status'  => 1 ,
				    			   'message' => 'Continue to login Process');
				}

			}else{
			    $data = array( 'status'  => 1 ,
			    			   'message' => 'No num_fail , Continue to login Process');
			}
		}else{
		    $data = array( 'status'  => 1 ,
		    			   'message' => 'No num_fail , Continue to login Process');
		}
		echo json_encode($data);
		$conn->close();
	break;

	case 'deleteObject':
		$conn = dbConnect();
		$sql = "DELETE object_master,object_status,class_data FROM object_master 
				LEFT JOIN object_status ON object_master.object_id = object_status.object_id
				LEFT JOIN class_data ON object_master.class_num = class_data.class_num
				WHERE object_master.object_id = '{$_POST['objectID']}'";
		$result = $conn->query($sql);
		if ($result = $conn->query($sql) === TRUE ) {
		    $data = array( 'status'  => 1 ,
		    			   'message' => 'Delete success' );
		} else {
		    $data = array( 'status'  => 0 ,
		    			   'message' => 'Delete failed, please call our support');
		}
		echo json_encode($data);
		$conn->close();
	break;

	case 'getLastNotif':
		$conn  = dbConnect();
		$notif = '';
        $cekNotif=$conn->query("select * from message_status order by message_date_time desc ");
		if ($cekNotif->num_rows > 0) {
        	$cekLog=$conn->query("select * from user_log where user_id='".$_SESSION['forefinger']."'");
			$rowCekLog=$cekLog->fetch_assoc();
			        while($rowCekNotif=$cekNotif->fetch_assoc())
			        {
			            if($rowCekNotif['message_date_time'] >=$rowCekLog['last_notif'])
			            {
			                $notif .= "
			                <div class='notifRow'>
			                    <div class='unread'>
			                    {$rowCekNotif['message_desc']}
			                    </div>
			                    <div class='notifDate'>
			                    {$rowCekNotif['message_date_time']}
			                    </div>
			                </div>
			                ";
			            }
			            else
			            {
			                $notif .= "
			                <div class='notifRow'>
			                    <div class='read'>
			                    {$rowCekNotif['message_desc']}
			                    </div>
			                    <div class='notifDate'>
			                    {$rowCekNotif['message_date_time']}
			                    </div>
			                </div>
			                ";
			            }
			        }
		    	$data = array( 'status'  => 1 ,
		    			   	   'notif'=> $notif,
			    			   'message' => 'Delete success' );
			} else {
			    $data = array( 'status'  => 0 ,
		    			   	   'notif'=> '',
			    			   'message' => 'Delete failed, please call our support');
			}

		echo json_encode($data);
		$conn->close();
	break;

}

//Creator : Ibrahim
//Date    : 07-10-2015
//Modul   : Koneksi Database

function dbConnect(){

	$servername = "localhost";
	$username = "imacscom_ff";
	$password = "P@ssw0rd123";
	$dbname = "imacscom_forefinger";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	return $conn;
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