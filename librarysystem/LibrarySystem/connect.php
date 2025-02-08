<?php
	$conn = new mysqli('localhost', 'root', '', 'db_ls') or die(mysqli_error());
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}