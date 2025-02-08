<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_book'])){
		$book_title = $_POST['book_title'];
		$book_desc = $_POST['book_desc'];
		$book_category = $_POST['book_category'];
		$book_author = $_POST['book_author'];
		$date_publish = $_POST['date_publish'];
		$qty = $_POST['qty'];
		$conn->query("UPDATE `book` SET `book_title` = '$book_title', `book_description` = '$book_desc', `book_category` = '$book_category', `book_author` = '$book_author', `date_publish` = '$date_publish', `qty` = '$qty' WHERE `book_id` = '$_REQUEST[book_id]'") or die(mysqli_error());
		echo '
			<script type = "text/javascript">
				alert("Save Changes");
				window.location = "book.php";
			</script>
		';
	}