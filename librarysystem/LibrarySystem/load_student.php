<?php
	require_once 'connect.php';
	$q_student = $conn->query("SELECT * FROM `student` WHERE `student_no` = '$_REQUEST[student_id]'") or die(mysqli_error());
	$f_student = $q_student->fetch_array();
?>
<div class = "col-lg-3"></div>
<div class = "col-lg-6">
	<form method = "POST" action = "edit_student_query.php?student_id=<?php echo $f_student['student_id']?>" enctype = "multipart/form-data">	
		<div class = "form-group">	
			<label>Student ID:</label>
			<input type = "text" name = "student_no" value = "<?php echo $f_student['student_no']?>" required = "required" class = "form-control" />
		</div>	
		<div class = "form-group">	
			<label>Firstname:</label>
			<input type = "text" name = "firstname" value = "<?php echo $f_student['firstname']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">	
			<label>Middlename:</label>
			<input type = "text" name = "middlename" value = "<?php echo $f_student['middlename']?>" placeholder = "(Optional)" class = "form-control" />
		</div>	
		<div class = "form-group">	
			<label>Lastname:</label>
			<input type = "text" required = "required" value = "<?php echo $f_student['lastname']?>" name = "lastname" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Course:</label>
			<input type = "text" required = "required" value = "<?php echo $f_student['course']?>" name = "course" class = "form-control" />
		</div>	
		<div class = "form-group">	
			<label>Yr&Section:</label>
			<input type = "text" maxlength = "12" name = "section" value = "<?php echo $f_student['section']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">	
			<button class = "btn btn-warning" name = "edit_student"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
		</div>
	</form>		
</div>