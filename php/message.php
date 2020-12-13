<?php
	// Account details
	$apiKey = urlencode('');
    
    // acquiring details
    $source = "Indore";
    $destination = $_POST['destination'];
    $contact = $_POST['contact'];
    $pickUpDate = $_POST['pickUpDate'];
    $dropDate = $_POST['dropDate'];
    $car = $_POST['car'];
	$time = $_POST['time'];
	$name = $_POST['name'];
	

	$contact = '91'.$contact ;
	// var_dump ($contact); die();

	
	// Message details
	$numbers = array($contact);
	// var_dump ($numbers); die();

	$sender = urlencode('TXTLCL');
	$message = urlencode("We have recieved your enquiry successfully. \n\nOur team will get back to you soon .  \n\nJain Tour & Travels \n9425055268 \n7566636610");
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
	// var_dump ($data); die();

 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	$response = json_decode($response);
	if($response->status == "success"){
		toTravels($contact,$destination,$pickUpDate,$dropDate,$car,$name);
	} else{
		// print_r($response);
		echo "<script> alert('Oops! Something went wrong please try again later')</script>";
		echo "<script> location.href='../index.html'; </script>";
        exit;
	}

	function toTravels($contact,$destination,$pickUpDate,$dropDate,$car,$name){
		$apiKey = urlencode('');
	$sender = urlencode('TXTLCL');
	$message = urlencode("Enquiry details from Jain Tour & Travels - \n\nDestination = ".$destination."\nJourney from = ".$pickUpDate."\nJourney Till = ".$dropDate."\nCar = ".$car."\nName = ".$name."\nContact = ".$contact);
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => '917566636610', "sender" => $sender, "message" => $message, );
	// var_dump ($data); die();

 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	$response = json_decode($response);
	sleep(1);
	if($response->status == "success"){
		echo "<script> alert('Your enquiry has been processed. You will soon recieve a call from our executive')</script>";
		echo "<script> location.href='../index.html'; </script>";
	}
	}
	
?>