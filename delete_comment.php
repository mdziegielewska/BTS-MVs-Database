<?php
	include 'db_connection.php';
	$conn = open_connection();
	
	$member = $_GET["member"];
	$date = $_GET["date"];
	$date = urldecode($date);
	
	if (isset($member) && isset($date)) {
		$sql = "DELETE FROM comments WHERE Member='$member' AND Date='$date'";
		if (mysqli_query($conn, $sql)) {
			if ($_COOKIE['username'] == 'admin') {
				header("location: admin.php");
			} else {
			header("location: $member.php");
			}
		}
	}
?>