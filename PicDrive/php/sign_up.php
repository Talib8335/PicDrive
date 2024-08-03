<?php
	
	require("database.php");
	$fullname = base64_decode($_POST['fullname']);
	$username = base64_decode($_POST['username']);
	$password = md5(base64_decode($_POST['password']));
	$pattern = "GA0a!b1|cBdN@efg2hCiH3`jkD#lP4OmM%n^JVo\Q5pRE_<q=)SIK9rs6&tT*uUF,L-(vZ/7w~Wx+8yX>zY";

	$length = strlen($pattern)-1;

	$i;
	$code = [];

	for($i=0;$i<6;$i++)
	{
		$indexing_number = rand(0,$length);
		$code[] = $pattern[$indexing_number];

	}

	$activation_code = implode($code);

	$store_user = "INSERT INTO users(full_name,username,password,activation_code)
	VALUES('$fullname','$username','$password','$activation_code')
	";

	if($db->query($store_user))
	{
		$check_mail = mail($username,"picdrive activation code","Thank you for choosing our product your activation code is : ".$activation_code);
		if($check_mail == true)
		{
			echo "sending success";
		}

		else{
			echo "sending failed";
		}
	}

	else{
		echo "Sign up failed";
	}


?>

 
<?php
// database close
	$db->close();

?>