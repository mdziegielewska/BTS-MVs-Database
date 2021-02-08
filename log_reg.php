<!DOCTYPE html>

<html>
<head>
<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/signup-main.css">
<style type="text/css">
.middle2 {
	margin-top: 350px;
	margin-left: 550px;
	display: block;
	position: absolute;
	font-family: lucida sans;
	color: #958d94;
	font-size: 18px;
}

.login {
	display: block;
	position: absolute;
	color: #918e91;
	font-size: 17px;
	margin-left: 90px;
	margin-top: 20px;
}

.register {
	display: block;
	position: absolute;
	color: #918e91;
	font-size: 17px;
	margin-left: 80px;
	margin-top: 10px;
}

</style>
</head>

<body onload="page_init()">
	<div class = "header">
	<h1 class = "h1"> <img src="photos/bts2.png" class="bts_logo" alt="bts_logo" usemap="#map1">Bangtan Boys
	<img src="photos/army2.png" class="army_logo" alt="army_logo" usemap="#map2"> </h1> 
	<h2 class = "h2"> 13.06.13 </h2> 
	<map name="map1">
		<area shape="rect" coords="11,17,57,91" alt="bts_logo" href="index.php">
	</map>
	<map name="map2">
		<area shape="rect" coords="11,17,57,91" alt="army_logo" href="https://www.youtube.com/watch?v=2N-Fsa9Evo0">
	</map>
	</div>
	
	<nav class="menu">
		<ul>
			<li><a href="rm.php">   RM   </a></li>
			<li><a href="jin.php">  Jin   </a></li>
			<li><a href="suga.php">  Suga  </a></li>
			<li><a href="jhope.php"> J-Hope </a></li>
            <li><a href="jimin.php"> Jimin  </a></li>
			<li><a href="v.php">   V    </a></li>
            <li><a href="jungkook.php">Jungkook</a></li>
		</ul>
	</nav>
	
	<div class="content">
		<div class="left">
			<img src="photos/bw4.png" class="col">
		</div>
		<div class="right">
			<img src="photos/bw3.png" class="bw">
		</div>
		<div class="middle2">
		
<?php
	include 'db_connection.php';
	$conn = open_connection();
	
	if(isset($_POST['register_user'])) {
	$set = !empty($_POST['username'] && $_POST['password'] && $_POST['password2']);
	$set = $conn -> real_escape_string($set);
	if($set) {
		$username = $conn -> real_escape_string($_POST['username']);
		$password = $conn -> real_escape_string($_POST['password']);
		$password2 = $conn -> real_escape_string($_POST['password2']);
		
		$user_check = "SELECT * FROM users WHERE Usernames = '" . $username . "' LIMIT 1";
		$result = mysqli_query($conn, $user_check);
		$user = mysqli_fetch_assoc($result);
		
		if ($user) {
			if ($user['Usernames'] === $username) {
				echo "<p> The username already exists. </p>";
				echo "<p><a href='register.html' class='register' title='register'> Come back </a></p>";
				die();
			}
		}
		
		if ($password != $password2) {
			echo "<p> The passwords do not match. </p>";
			echo "<p><a href='register.html' class='register' title='register'> Come back </a></p>";
			die();
		}
		
		$password = md5($password);
		$sql = "INSERT INTO users (Usernames, Passwords) VALUES ('" . $username . "', '" . $password . "')";
	
		if(mysqli_query($conn, $sql)) {
			echo "<p>Thank you for signing up.</br>
				 You can log in now :)</p>";
				echo "<p><a href='login.html' class='login' title='login'> Log in </a></p>";
		}
	}
	}
	
	if (isset($_POST['login_user'])) {
		$username = $conn -> real_escape_string($_POST['username']);
		$password = $conn -> real_escape_string($_POST['password']);
		$password = md5($password);
		
		$sql = "SELECT * FROM users WHERE Usernames='" . $username . "' AND Passwords='" . $password . "'";
		$result = mysqli_query($conn, $sql);
		$results = mysqli_num_rows($result);
		
		if (mysqli_num_rows($result) == 1) {
			if ($username == 'admin') {
				setcookie("username", $username, time()+3600*24,'/');
				header('location: admin.php');
				die();
			} else {
				setcookie("username", $username, time()+3600*24,'/');
				header('location: index.php');
				die();
			}
		} else {
			echo "Wrong username or password.";
			echo "<p><a href='login.html' class='register' title='register'> Come back </a></p>";
		}
	}
	
	$conn->close();
?>

	</div>
	</div>
	
</body>
</html>