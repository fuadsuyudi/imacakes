<?php                                                        
		$data_string = json_encode(array('Email'=>'ibrahim@indosystem.com','Password'=>'123456'));                                                                                                                                                                    
		$ch = curl_init('http://workengage.festiware.com/api/v1/user/login');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($data_string))                                                                       
		);                                                                                                                                                                                                              
		$result = json_decode(curl_exec($ch));
		print_r($result);
?>