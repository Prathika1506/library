<?php
	require_once 'connect.php';
	$date = date("Y-m-d", strtotime("+8 HOURS"));
	$conn->query("UPDATE `borrowing` SET `status` = 'Returned', `date` = '$date' WHERE `borrow_id` = '$_POST[borrow_id]'") or die(mysqli_error());
	header('location: returning.php');