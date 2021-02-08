<!DOCTYPE html>

<html>
<head>
<title>BTS MVs</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<style type="text/css">
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

.login {
	font-family: lucida sans;
	font-size: 16px;
	position: absolute;
	color: #958d94;
	margin-top: 20px;
	margin-left: 50px;
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

table {
	border-radius: 5px;
	border-color: #fefce0;
	width: 1250px;
	font-family: lucida sans;
	border-collapse: collapse;
	position: absolute;
	display: block;
	margin-top: 20px;
	margin-left: -230px;
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

.input {
	font-family: lucida sans;
	font-size: 15px;
	caret-color: #ce53ed;
	border-color: #fefce0;
	border-radius: 15px;
	border-style: solid;
	display: block;
	padding: 5px 5px 5px 10px;
	margin-top: 80px;
	margin-left: -200px;
	margin-right: 800px;
}

.search {
	display: block;
	margin-top: -27.5px;
	margin-left: 15px;
	margin-right: 790px;
	font-family: lucida sans;
	font-size: 13.5px;
	background-color: #c4c4b6;
	border-radius: 5px;
	border-color: #c4c4b6;
	color: #fefce0;
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

	<nav class = "mvs">
		<form action = "search.php" method = "GET">
			<input class = "input" type = "text" name = "search" placeholder = "Find a music video"/>
			<input class = "search" type = "submit" value = "Search"/>
		</form>
	
<?php
$sql = "SELECT Song_name, Original_name, Released_date, Length, Released_language, Link_youtube, Producers, Composers, Lyricists FROM bts_mvs ORDER BY bts_mvs.Released_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table>
			<tr>
				<th>Song</th>
				<th>Original name</th>
				<th>Released date</th>
				<th>Length</th>
				<th>Language</th>
				<th>Link to youtube</th>
				<th>Producers</th>
				<th>Composers</th>
				<th>Lyricists</th>
			</tr>";
	while($row = $result-> fetch_assoc()) {
		echo "<tr><td>" . $row["Song_name"]. 
			"</td><td>" . $row["Original_name"]. 
			"</td><td>" . $row["Released_date"]. 
			"</td><td>" . $row["Length"]. 
			"</td><td>" . $row["Released_language"].
			"</td><td>" . $row["Link_youtube"]. 
			"</td><td>" . $row["Producers"]. 
			"</td><td>" . $row["Composers"]. 
			"</td><td>" . $row["Lyricists"]. 
		"</td></tr>";  
	}
	echo "</table>";
} else {
	echo "0 results";
}

close_connection($conn);
?>
	</nav>
	
</body>
</html>