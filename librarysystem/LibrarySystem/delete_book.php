<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `book` WHERE `book_id` = '$_REQUEST[book_id]'") or die(mysqli_error());
	$conn->query("DELETE FROM `borrowing` WHERE `book_id` = '$_REQUEST[book_id]'") or die(mysqli_error());
	header("location: book.php");