<?php
	include 'db_connection.php';
	$conn = open_connection();
	$username = htmlspecialchars($_COOKIE["username"]);
	$sql = "DELETE FROM users WHERE Usernames = '$username'";
	setcookie("username", $username, time() - 360,'/');
	
	if (mysqli_query($conn, $sql)) {
		header('location: index.php');
	}
	
	close_connection($conn);
?>