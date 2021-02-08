<?php
	include 'db_connection.php';
	$conn = open_connection();
	
	$member = $conn -> real_escape_string($_GET["member"]);
	$comment = $_POST["comment"];
	$comment = strip_tags($comment);
	$comment = $conn -> real_escape_string($comment);
	$username = htmlspecialchars($_COOKIE["username"]);
	$username = $conn -> real_escape_string($username);
	$datetime = date("Y-m-d H:i:s");
	
	$sql = "INSERT INTO comments(Member, Username, Comment, Date) VALUES ('" . $member . "', '" . $username . "', '" . $comment . "', '" . $datetime . "')";
	if (mysqli_query($conn, $sql)) {
		header("location: " . $member . ".php");
		die();
	} else {
		printf("Errorcode: %d\n", mysqli_errno($conn));
	}

	close_connection($conn);
?>