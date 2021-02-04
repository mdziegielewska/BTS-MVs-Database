<?php
	include 'db_connection.php';
	$conn = open_connection();
	
	$member = $_GET["member"];
	$comment = $conn -> real_escape_string($_POST["comment"]);
	$username = $_COOKIE["username"];
	$datetime = date("Y-m-d H:i:s");
	
	$sql = "INSERT INTO comments(Member, Username, Comment, Date) VALUES ('$member', '$username', '$comment', '$datetime')";
	if (mysqli_query($conn, $sql)) {
		header("location: $member.php");
	}

	close_connection($conn);
?>