<!DOCTYPE html>

<html>
<head>
<title>Change your profile</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<style type="text/css">
.wb {
	font-family: lucida sans;
	font-size: 16px;
	position: absolute;
	color: #958d94;
	margin-top: 20px;
	margin-left: 50px;
}

.change {
	font-family: lucida sans;
	font-size: 16px;
	color: #958d94;
}

.logout {
	font-family: lucida sans;
	font-size: 16px;
	color: #958d94;
}

.login {
	font-family: lucida sans;
	font-size: 16px;
	position: absolute;
	color: #958d94;
	margin-top: 20px;
	margin-left: 50px;
}

.h3 {
	position: absolute;
	margin-top: 100px;
	margin-left: -35px;
}

.right {
	margin-top: 90px;
	margin-left: 650px;
	padding: 0 0 30px 0;
}

.avatar {
	position: absolute;
	display: block;
	width: 120px;
	height: 120px;
	margin-top: 150px;
	margin-left: -40px;
	border-radius: 60px;
	object-fit: cover;
}

.change_p {
	position: absolute;
	display: block;
	font-size: 13.5px;
	text-align: left;
	margin-left: 95px;
	margin-top: 170px;
}

.dn, .u, .p, .p2 {
	font-family: lucida sans;
	font-size: 13.5px;
	caret-color: #ce53ed;
	border-color: #fefce0;
	border-radius: 15px;
	border-style: solid;
	display: block;
	padding: 5px 5px 5px 10px;
}

.save, .pp {
	display: block;
	font-family: lucida sans;
	font-size: 13.5px;
	background-color: #c4c4b6;
	border-radius: 5px;
	border-color: #c4c4b6;
	color: #fefce0;
}

.new_dn {
	margin-top: 100px;
	margin-left: -120px;
}
.dn {
	display: block;
	position: absolute;
	margin-left: -127px;
}

.new_user {
	margin-top: -182px;
}

.new_user, .new_pass, .confirm {
	margin-left: 280px;
}
.u, .p, .p2 {
	margin-left: 275px;
}

.save {
	position: absolute;
	display: block;
	margin-left: 140px;
	margin-top: 50px;
}

.delete {
	font-family: lucida sans;
	font-size: 16px;
	position: absolute;
	color: #958d94;
	margin-top: 530px;
	margin-left: 387px;
}

.pp {
	display: block;
	position: absolute;
	object-fit: cover;
	border-radius: 20px;
	height: 40px;
	width: 40px;
	margin-left: 230px;
	margin-top: -20px;
}
</style>
</head>

<body onload="page_init()">
	<?php
	include 'db_connection.php';
	$conn = open_connection();
	if (isset($_COOKIE["username"])) {
		$username = htmlspecialchars($_COOKIE["username"]);
		$username = $conn -> real_escape_string($username);
		$sql = "SELECT Avatar FROM users WHERE Usernames='" . $username . "'";	
		$result = mysqli_query($conn, $sql);
		echo "<p class='wb'> Welcome back <a href='change_profile.php' class='change'>" . htmlspecialchars($_COOKIE["username"]) .  "</a>!!!";
		if ($result !== " ") {
			while($row = $result->fetch_assoc()) {
				$avatar = $row["Avatar"];
				$folder = "photos/avatars/";
				$image = $folder.$avatar;
				echo "<img class='pp' src='" . $image . "'>";
			}
		}
		echo "</br><a href='log_out.php' class='logout'>Log out</a></p>";
	} else {
		header('location: index.php');
		die();
	}
	?>
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
	
	<nav class="change">
	<h3 class="h3"> Edit profile: </h3>
	<?php
		$sql2 = "SELECT Avatar FROM users WHERE Usernames='" . $username . "'";
		$result2 = mysqli_query($conn, $sql2);
		
		if (!empty($result2)) {
			while($row = $result2->fetch_assoc()) {
				$avatar = $row["Avatar"];
				$folder = "photos/avatars/";
				$image = $folder.$avatar;
				echo "<img class='avatar' src='" . $image . "'>";
			}
		}
	?>
	<script>
	function a() {
		alert("Changes have been saved");
	}
	</script>
	<form action="change.php" class="change_p" method="post" enctype="multipart/form-data">
		<p> Choose new profile picture:</p>
		<input class="new_pp" type="file" name="profile_pic" value="Select" accept="image/png, image/jpg, image/jpeg"/>
		<p class="new_dn"> Choose your display name: </p>
		<input class="dn" type="text" name="display_name" maxlength="20" placeholder="Enter Display Name">
		<p class="new_user"> Choose new username: </p>
		<input class="u" type="text" name="user" minlength="4" maxlength="15" placeholder="Enter New Username">
		<p class="new_pass"> Choose new password: </p>
		<input class="p" type="password" name="password" minlength="6" maxlength="30" placeholder="Enter New Password"></p>
		<p class="confirm"> Confirm password: </p>
		<input class="p2" type="password" name="password2" minlength="6" maxlength="30" placeholder="Enter Password"></p>
		<p> <button class="save" type="submit" value="Submit" name="save_changes" onclick = "a()">Submit</button></p>
	</form>
	<?php echo "<a onclick=\"return confirm('Are you sure you want to delete?')\" href=\"delete.php\" class=\"delete\"> Delete your account </a>";?>
	<img src="photos/bw5.png" class="right">
	</nav>
	
</body>
</html>