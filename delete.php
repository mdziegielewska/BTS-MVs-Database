<?php
	include 'db_connection.php';
	$conn = open_connection();
	$username = htmlspecialchars($_COOKIE["username"]);
	$sql1 = "DELETE FROM comments WHERE Username = '$username'";
	$sql2 = "DELETE FROM users WHERE Usernames = '$username'";
	setcookie("username", $username, time() - 360,'/');
	
	mysqli_query($conn, $sql1);
	if (mysqli_query($conn, $sql2)) {
		header('location: index.php');
	}
	
	close_connection($conn);
?>