<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_admin'])){	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$q_admin = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username'") or die(mysqli_error());
		$v_admin = $q_admin->num_rows;
		if($v_admin == 1){
			echo '
				<script type = "text/javascript">
					alert("Username already taken");
					window.location = "admin.php";
				</script>
			';
		}else{
			$conn->query("UPDATE `admin` SET `username` = '$username', `password` = '$password', `firstname` = '$firstname', `middlename` = '$middlename', `lastname` = '$lastname' WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Save Changes");
					window.location = "admin.php";
				</script>
			';
		}
	}	