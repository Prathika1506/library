<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_student'])){
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
			$conn->query("UPDATE `student` SET `student_no` = '$student_no', `firstname` = '$firstname', `middlename` = '$middlename', `lastname` = '$lastname', `course` = '$course', `section` = '$section' WHERE `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error());
			echo'
				<script type = "text/javascript">
					alert("Save Changes");
					window.location = "student.php";
				</script>
			';
		}
	}	