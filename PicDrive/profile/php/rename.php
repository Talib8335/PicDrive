<?php
	session_start();
	require("../../php/database.php");
	$new_name = $_POST['photo_name'];
	$old_path = $_POST['photo_path'];

	$pathinfo = pathinfo($old_path);
	$dirname = $pathinfo['dirname'];
	$extension = $pathinfo['extension'];

	if(file_exists("../".$dirname."/".$new_name.".".$extension))
	{
		echo "File already exists please enter other name";
	}

	else{
		if(rename("../".$old_path,"../".$dirname."/".$new_name.".".$extension))
		{
			$new_path = "../".$dirname."/".$new_name.".".$extension;
			$previous_path = "../".$old_path;
			$table_name = $_SESSION['table_name'];
			$update_table = "UPDATE $table_name SET image_path = '$new_path',image_name='$new_name' WHERE image_path = '$previous_path'";
			if($db->query($update_table))
			{
				echo "success";
			}

			else{
				echo "update failed";
			}

		}

		else{
			echo "failed";
		}
	}
	

?>


<?php
// database close
	$db->close();

?>