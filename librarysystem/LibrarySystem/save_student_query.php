<?php
	require_once 'connect.php';
	if(ISSET($_POST['save_student'])){
		$student_no = $_POST['student_no'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$course = $_POST['course'];
		$section = $_POST['section'];
		$qstudent = $conn->query("SELECT * FROM `student` WHERE `student_no` = '$student_no'") or die(mysqli_error());
		$vstudent = $qstudent->num_rows;
		if($vstudent['student_no'] == 1){
			echo '
				<script type = "text/javascript">
					alert("Student ID already exist");
					window.location = "student.php";
				</script>
			';
		}else{
			$conn->query("INSERT INTO `student` VALUES('', '$student_no', '$firstname', '$middlename', '$lastname', '$course', '$section')") or die(mysqli_error());
			echo'
				<script type = "text/javascript">
					alert("Successfully saved data");
					window.location = "student.php";
				</script>
			';
		}
	}