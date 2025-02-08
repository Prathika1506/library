<?php
	require_once 'connect.php';
	session_start();
	if(!ISSET($_SESSION['admin_id'])){
		header('location: index.php');
	}