<?php
require_once '/vagrant/config-monisecelso.php';

	// IF VALIDATION ERROR
	if (isset($_POST["all_error_required"])){
		$output = json_encode(array('type'=>'error', 'text' => $_POST["all_error_required"][0]));
		die($output);
	}
	
	// IF NO ERROR
	if (isset($_POST["all_input_id"])){
		
		$finalmessage = "";
		foreach ($_POST["all_input_id"] as $input_id) {
			if (is_array($_POST[$input_id])){
				$finalmessage .= $_POST[$input_id."_label"]." : ".implode(", ", $_POST[$input_id]). "\n\n";
			}
			else
			{
				$finalmessage .= $_POST[$input_id."_label"]." : ". $_POST[$input_id] . "\n\n";
			}
		}

		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		$data = array(
					"nome" => $_POST['name'], 
					"participar" => $_POST['attended'], 					
					"telefone" => $_POST['phone'], 					
					"email" => $_POST['email'], 					
					"convidados" => (isset($_POST['guest'])? $_POST['guest'] : null),
					"mensagem" => (isset($_POST['message'])? $_POST['message'] : null),		
		);

		$data_string = json_encode($data);                    

		$service_url = API_END_POINT.'wedding/rsvp/';
		$curl = curl_init($service_url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
		//curl_setopt($curl, CURLOPT_USERPWD, API_USER . ":" . API_PASSWORD);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		$curl_response = curl_exec($curl);
		
		if ($curl_response === false) {
			$info = curl_getinfo($curl);
			curl_close($curl);
			die('error occured during curl exec. Additioanl info: ' . var_export($info));
		} else {
			curl_close($curl);
			$decoded = json_decode($curl_response);
		}

		$output = json_encode(array('type'=>'success', 'text' => 'Obrigado :)'));

		/*
		$email_to  =  'some@email.com'; 
		
		$headers = "From: ".$_POST["email"]."\r\n";	
		$headers .= "Reply-To: ".$_POST["email"]."\r\n";	
		$subject = "RSVP message from Mr/Mrs ".$_POST["name"];	

		if(mail($email_to, $subject, $finalmessage, $headers)){
        	$output = json_encode(array('type'=>'success', 'text' => 'Obrigado :)'));
    	}else{
        	$output = json_encode(array('type'=>'error', 'text' => 'Erro ao eviar...'));
   		}*/
		die($output);	
	}	
?>
