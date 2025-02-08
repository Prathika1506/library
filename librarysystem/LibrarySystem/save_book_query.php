<?php
	require_once 'connect.php';
	if(ISSET($_POST['save_book'])){
		$book_title = $_POST['book_title'];
		$book_desc = $_POST['book_desc'];
		$book_category = $_POST['book_category'];
		$book_author = $_POST['book_author'];
		$date_publish = $_POST['date_publish'];
		$qty = $_POST['qty'];
		$conn->query("INSERT INTO `book` VALUES('', '$book_title', '$book_desc', '$book_category', '$book_author', '$date_publish', '$qty')") or die(mysqli_error());
		
		echo'
			<script type = "text/javascript">
				alert("Successfully saved data");
				window.location = "book.php";
			</script>
		';
	}