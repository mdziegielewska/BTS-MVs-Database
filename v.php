<!DOCTYPE html>

<html>
<head>
<title>BTS members - V</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/members-main.css">
</head>

<body onload="page_init()">
	<?php
	include 'db_connection.php';
	$conn = open_connection();
	if (isset($_COOKIE["username"])) {
		$username = htmlspecialchars($_COOKIE["username"]);
		$sql = "SELECT Avatar FROM users WHERE Usernames='$username'";	
		$result = mysqli_query($conn, $sql);
		
		echo "<p class='wb'> Welcome back <a href='change_profile.php' class='change'>" . htmlspecialchars($_COOKIE["username"]) .  "</a>!!!";
		if ($result !== " ") {
			while($row = $result->fetch_assoc()) {
				$avatar = $row["Avatar"];
				$folder = "photos/avatars/";
				$image = $folder.$avatar;
				echo "<img class='pp' src='$image'>";
			}
		}
		echo "</br><a href='log_out.php' class='logout'>Log out</a></p>";
	} else {
		echo "<a href='login.html' class='login' title='Log in'>Login</a>";
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
	
	<div class = "content">
		<div class = "left">
			<img src="photos/v.jpg" alt="Taehyung" class = "align-left"/>
		</div>
		<div class = "right">
<style>
.pp {
	display: block;
	position: absolute;
	object-fit: cover;
	border-radius: 20px;
	height: 40px;
	width: 40px;
	margin-left: 200px;
	margin-top: -20px;
}

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

table {
	border-radius: 5px;
	border-color: #fefce0;
	height: 300px;
	width: 460px;
	font-family: lucida sans;
	border-collapse: collapse;
	position: absolute;
	display: block;
	margin-top: 60px;
	margin-left: -35px;
	margin-bottom: 50px;
}

th {	
	margin-top: 200px;
	background-color: #ce53ed;
	font-size: 15px;
	text-transform: uppercase;
	text-align: left;
	padding: 7px 10px 10px 10px;
	color: #fefce0;
}

td {
	margin-top: 200px;
	padding: 7px 10px 10px 10px;
	background-color: white;
	font-size: 13.5px;
	text-align: left;
	color: #958d94;
}

.right {
	position: absolute;
	height: 300px;
	width: 600px;
	float: right;
	margin: 300px 330px 100px 730px;
	width: 300px;
	text-align: left;
	background-color: #f2c9fb;
</style>

<?php
	$sql = "SELECT Stage_name, Stage_name_in_Hangul, Korean_name, Korean_name_in_Hangul, Birthday, Hometown, Position FROM bts_members
		WHERE Stage_name = 'V'";
		
	if(mysqli_errno($conn)) {
		die("Błąd zapytania");
	}
	
	$result = mysqli_query($conn, $sql);
	$row_count = mysqli_num_rows($result);
	
	while($row = mysqli_fetch_array($result)) {
		echo "<table>
			<tr><th scope='row'> Stage name</th><td>" . $row["Stage_name"] . " (" . $row["Stage_name_in_Hangul"] . ")</td></tr>
			<tr><th scope='row'> Birth name</th><td>" . $row["Korean_name"] . " (" . $row["Korean_name_in_Hangul"] . ")</td></tr>
			<tr><th scope='row'> Birthday</th><td>" . $row["Birthday"] . "</td></tr>
			<tr><th scope='row'> Hometown</th><td>" . $row["Hometown"] . "</td></tr>
			<tr><th scope='row'> Position</th><td>" . $row["Position"] . "</td></tr></table>";
	}
	
	close_connection($conn);
?>
	</div>
	</div>
	
</body>
</html>