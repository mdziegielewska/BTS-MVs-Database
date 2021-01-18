<!DOCTYPE html>

<html>
<head>
<title>Results</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
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

	<nav class="results">
	<h3 class="h3"> Your results </h3>
	<a href="index.php" class="cb" title="Come back">Click to return to the main site</a>
	
<style>
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
	text-align: center;
	font-family: lucida sans;
	font-size: 20px;
	margin-top: 90px;
	margin-left: -900px;
}
table {
	border-radius: 5px;
	border-color: #fefce0;
	width: 1250px;
	font-family: lucida sans;
	border-collapse: collapse;
	position: absolute;
	display: block;
	margin-left: -230px;
	margin-top: -10px;
	padding: 3px 0 0 0;
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

.cb {
	text-align: center;
	font-family: lucida sans;
	font-size: 16px;
	margin-left: 45px;
	margin-top: -40px;
	display: block;
	padding: -1px 0 20px 0px;
	position: absolute;
	color: #958d94;
}
</style>

<?php
	$set = !empty($_POST['search']) ? $_POST['search'] : (!empty($_GET['search']) ? $_GET['search'] : null);
	if ($set) {
	$sql = "SELECT Song_name, Original_name, Released_date, Length, Released_language, Link_youtube, Producers, Composers, Lyricists FROM bts_mvs
		WHERE (Song_name LIKE '%".$set."%')
			OR (Original_name LIKE '%".$set."%')
			OR (Released_date LIKE '%".$set."%')
			OR (Length LIKE '%".$set."%')
			OR (Released_language LIKE '%".$set."%') 
			OR (Link_youtube LIKE '%".$set."%')
			OR (Producers LIKE '%".$set."%')
			OR (Composers LIKE '%".$set."%')
			OR (Lyricists LIKE '%".$set."%') ORDER BY bts_mvs.Released_date DESC";
	
	if(mysqli_errno($conn)) {
		die("Błąd zapytania");
	}
	
	$result = mysqli_query($conn, $sql);
	$row_count = mysqli_num_rows($result);
	
	if($row_count > 0) {
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
		while($row = mysqli_fetch_array($result)) {
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
	} else {
		echo "I'm sorry, we couldn't find anything";
	}
	}
	$conn->close();
?>
</nav>

</body>
</html>