<?php
	require("../../php/database.php");
	session_start();
	$username = $_SESSION['username'];
	$get_status = "SELECT plans,storage,used_storage FROM users WHERE username='$username'";
	$response = $db->query($get_status);
	$data = $response->fetch_assoc();
	$plans = $data['plans'];
	if($plans == "starter" || $plans == "free")
	{
	$total = $data['storage'];
	$used = $data['used_storage'];
	$free_space = $total-$used;
	$percentage = round(($used*100)/$total,2);
	$response = [$used."MB/".$total."MB",$free_space."MB",$percentage];
	echo json_encode($response);							
	$color="";
	if($percentage>80)
	{
		$color = "bg-danger";
	}

	else{
			$color = "bg-primary";
	}

}

else{
	$response = ["USED STORAGE : ".$data['used_storage']."MB","UNLIMITED",0];
	echo json_encode($response);	
}



?>


<?php
// database close
	$db->close();

?>