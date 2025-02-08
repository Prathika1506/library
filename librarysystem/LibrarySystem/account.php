<?php
	require_once 'connect.php';
	$qadmin = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_SESSION[admin_id]'") or die(mysqli_error());
	$fadmin = $qadmin->fetch_array();
	$name = $fadmin['firstname']." ".$fadmin['lastname'];