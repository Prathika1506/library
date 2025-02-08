<?php
	require_once 'connect.php';
	if(ISSET($_POST['save_admin'])){
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
			$conn->query("INSERT INTO `admin` VALUES('', '$username', '$password', '$firstname', '$middlename', '$lastname')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Successfully saved data");
					window.location = "admin.php";
				</script>
			';
		}
	}