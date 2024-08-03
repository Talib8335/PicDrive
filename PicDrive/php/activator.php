<?php
	
	require("database.php");
	$code = base64_decode($_POST['code']);
	$username = base64_decode($_POST['username']);
	$check_code = "SELECT activation_code FROM users WHERE username = '$username' AND activation_code = '$code'";
	$response = $db->query($check_code);
	if($response->num_rows != 0)
	{
		$update_status = "UPDATE users SET status = 'active' WHERE username = '$username' AND activation_code = '$code'";
		if($db->query($update_status) == true)
		{
			$get_id = "SELECT id FROM users WHERE username = '$username'";
			$get_id_response = $db->query($get_id);
			$id_data = $get_id_response->fetch_assoc();
			$table_name = "user_".$id_data['id'];
			$create_table = "CREATE TABLE $table_name(
			id INT(11) NOT NULL AUTO_INCREMENT,
			image_name VARCHAR(50),
			image_path VARCHAR(50),
			image_size FLOAT(10),
			image_date DATETIME DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY(id)
			)";

			if($db->query($create_table))
			{
				mkdir("../profile/gallery/".$table_name);
				echo "user verified";
				session_start();
				$_SESSION['username'] = $username;
			}
		}

		else{
			echo "Activation failed please try again later";
		}
	}

	else{
		echo "Wrong activation code";
	}


?>

<?php
// database close
	$db->close();

?>