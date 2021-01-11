<?php
	include 'db_connection.php';
	$conn = open_connection();
	echo "Connected Successfully";
	close_connection($conn);
?>