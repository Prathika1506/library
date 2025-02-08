<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `admin` WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
	header('location: admin.php');