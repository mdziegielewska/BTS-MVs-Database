<!DOCTYPE html>

<html>
<head>
<title>Editing</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/members-main.css">
</head>

<?php
	include 'db_connection.php';
	$conn = open_connection();

	$username = $_COOKIE["username"];
	$new_display = $_POST["display_name"];
	$new_username = $_POST["user"];
	$new_password = $_POST["password"];
	$new_password2 = $_POST["password2"];
	
	if (!empty($new_display)) {
		$sql = "UPDATE users SET Display_names = '$new_display' WHERE Usernames = '$username'";
		mysqli_query($conn, $sql);
	}
	
	if (!empty($new_username)) {
		$sql2 = "UPDATE users SET Usernames = '$new_username' WHERE Usernames = '$username'";
		if (mysqli_query($conn, $sql2)) {
			setcookie("username", $username, time() - 360,'/');
			setcookie("username", $new_username, time()+3600*24,'/');
		}
	}
	if (!empty($new_password) && !empty($new_password2)) {
		if ($new_password != $new_password2) {
			echo "<p> The passwords do not match. </p>";
			die();
		}
		$new_password = md5($new_password);
		$sql3 = "UPDATE users SET Passwords = '$new_password' WHERE Usernames = '$username'";
		mysqli_query($conn, $sql3);
	}
	if (!empty($_FILES["profile_pic"]["name"])) {
		$new_avatar = $_FILES["profile_pic"]["name"];
		$new_avatar_temp = $_FILES["profile_pic"]["tmp_name"];
		$folder = "photos/avatars/";
		move_uploaded_file($new_avatar_temp, $folder.$new_avatar);
		
		$sql4 = "UPDATE users SET Avatar = '$new_avatar' WHERE Usernames = '$username'";
		mysqli_query($conn, $sql4);
	}
	
	header('location: change_profile.php');
?>

</body>
</html>