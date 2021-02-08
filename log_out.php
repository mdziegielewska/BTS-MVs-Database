<?php
	setcookie("username", $username, time() - 360,'/');
	header('location: index.php');
	die();
?>