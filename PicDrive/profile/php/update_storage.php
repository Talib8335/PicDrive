<?php
	session_start();
	$username = $_SESSION['username'];
	require("../../php/database.php");
	$plans = $_GET['plans'];
	$storage = $_GET['storage'];
	$purchase_date = date('Y-m-d');

	if($plans == "starter" || $plans == "free")
	{// get free storage
	$select_storage = "SELECT storage FROM users WHERE username='$username'";
	$response = $db->query($select_storage);
	$data = $response->fetch_assoc();

	$final_storage;
	if(empty($_SESSION['renew']))

	{$final_storage = $data['storage']+$storage;}

	else{
		$final_storage = $data['storage']+0;
	}

	
	


	// update storage

	$cal_date = new DateTime($purchase_date);
	$cal_date->add(new DateInterval('P30D'));
	$expiry_date = $cal_date->format('Y-m-d');

	$update_storage = "UPDATE users SET plans = '$plans',storage='$final_storage',purchase_date='$purchase_date',expiry_date='$expiry_date' WHERE username='$username'";

	if($db->query($update_storage))
	{
		header("Location:../profile.php");
	}

	else{
		echo "Update failed";
	}

}

else{

	$cal_date = new DateTime($purchase_date);
	$cal_date->add(new DateInterval('P30D'));
	$expiry_date = $cal_date->format('Y-m-d');



	$update_storage = "UPDATE users SET plans = '$plans',storage='0',purchase_date='$purchase_date',expiry_date='$expiry_date' WHERE username='$username'";

	if($db->query($update_storage))
	{
		header("Location:../profile.php");
	}

	else{
		echo "Update failed";
	}

}


?>


<?php
// database close
	$db->close();

?>