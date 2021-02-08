<?php
	include 'db_connection.php';
	$conn = open_connection();
	$username = htmlspecialchars($_COOKIE["username"]);
	$username = $conn -> real_escape_string($username);
	
	if($username == 'admin') {
		$delete_user = $_GET["user"];
		$delete_user = $conn -> real_escape_string($delete_user);
		$sql1 = "DELETE FROM comments WHERE Username = '" . $delete_user . "'";
		$sql2 = "DELETE FROM users WHERE Usernames = '" . $delete_user . "'";
		
		mysqli_query($conn, $sql1);
		if (mysqli_query($conn, $sql2)) {
			header('location: admin.php');
			die();
		}
	} else {
		$sql1 = "DELETE FROM comments WHERE Username = '" . $username . "'";
		$sql2 = "DELETE FROM users WHERE Usernames = '" . $username . "'";
		setcookie("username", $username, time() - 360,'/');
	
		mysqli_query($conn, $sql1);
		if (mysqli_query($conn, $sql2)) {
			header('location: index.php');
			die();
		}
	}
	
	close_connection($conn);
?>