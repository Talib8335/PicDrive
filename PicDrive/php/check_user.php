<?php

	require("database.php");
	$username = base64_decode($_POST['username']);
	$change = "SELECT username FROM users WHERE username = '$username'";
	$response = $db->query($change);

	if($response->num_rows != 0)
	{
		echo "user found";
	}

	else{
		echo "user not found";
	}

?>


<?php
// database close
	$db->close();

?>