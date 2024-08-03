<?php
	session_start();
	$username = $_SESSION['username'];
	$table_name = $_SESSION['table_name'];
	require("../../php/database.php");
	$path = $_POST['photo_path'];
	$complete_path = "../".$path;
	if(unlink("../".$path))
	{
		// get used storage
		$get_user_storage = "SELECT used_storage FROM users WHERE username='$username'";

		$response = $db->query($get_user_storage);

		$data = $response->fetch_assoc();

		$used_storage = $data['used_storage'];


		// get deleted image size

		$get_delete_size = "SELECT image_size FROM $table_name WHERE image_path='$complete_path'";

		$response_delete = $db->query($get_delete_size);

		$response_data = $response_delete->fetch_assoc();

		$deleted_file_size = $response_data['image_size'];

		// update used storage

		$storage = $used_storage-$deleted_file_size;

		$update_storage = "UPDATE users SET used_storage = '$storage' WHERE username='$username'";

		if($db->query($update_storage))
		{
				$delete_query = "DELETE FROM $table_name WHERE image_path='$complete_path'";

			if($db->query($delete_query))
			{
				echo "delete success";
			}

			else{
				echo "failed to delete from database";
			}
		}

		else{
			echo "failed to update used_storage";
		}


		
	}

	else{
		echo "delete failed";
	}


?>


<?php
// database close
	$db->close();

?>