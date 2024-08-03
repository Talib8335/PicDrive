<?php
	session_start();
	$username = $_SESSION['username'];
	$fullname = $_SESSION['buyer_name'];
	require("../../instamojo/instamojo.php");

	$amount = $_GET['amount'];
	$plans = $_GET['plans'];
	$storage = $_GET['storage'];


	$api = new Instamojo\Instamojo('125371741d068a13526ba627c041e952', 'b366f93f57575ea648a0c674392aa183', 'https:// www.instamojo.com');

	

	try {
    	$response = $api->paymentRequestCreate(array(
        "purpose" => "PICDRIVE PLANS",
        "amount" => $amount,
        "send_email" => true,
        "buyer_name" => $fullname,
        "email" => $username,
        "phone" => "9934940000",
        "redirect_url" => "http://adsewap.com/profile/php/update_storage.php?plans=".$plans."&storage=".$storage
	        ));
	   
	   $payment_url = $response['longurl'];
	   header("Location:$payment_url");
	}
	catch (Exception $e) {
	    print('Error: ' . $e->getMessage());
	}


?>