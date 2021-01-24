<!DOCTYPE html>

<html>
<head>
<title>BTS members - Jin</title>
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
			<img src="photos/jin.jpg" alt="Seokjin" class = "align-left"/>
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

table {
	border-radius: 5px;
	border-color: #fefce0;
	height: 300px;
	width: 460px;
	font-family: lucida sans;
	border-collapse: collapse;
	position: absolute;
	display: block;
	margin-top: -20px;
	margin-left: 0px;
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
		WHERE Stage_name = 'Jin'";
		
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
	
?>
		<h4 class="like">
		<p class="r">
		<?php
			$xml = simplexml_load_file("reactions.xml");
			echo "&nbsp  ";
			echo $xml->member[1]->thumbs_up;
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
			echo $xml->member[1]->smiling_devil;
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
			echo $xml->member[1]->purple_heart;
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
			echo $xml->member[1]->microphone;
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
			echo $xml->member[1]->loco;
			echo "&nbsp";
		?>
		</p>
		
		<img src="photos/emoji/thumbs_up.png" class="thumbs_up" alt="thumbs_up" usemap="#thumbs_up">
		<map name="thumbs_up">
			<area shape="rect" coords="0,0,56.1,60" alt="thumbs_up" href="like.php?member=jin&reaction=thumbs_up">
		</map>
		
		<img src="photos/emoji/smiling_devil.png" class="smiling_devil" alt="smiling_devil" usemap="#smiling_devil">
		<map name="smiling_devil">
			<area shape="rect" coords="0,0,56.1,60" alt="smiling_devil" href="like.php?member=jin&reaction=smiling_devil">
		</map>
	
		<img src="photos/emoji/purple_heart.png" class="purple_heart" alt="purple_heart" usemap="#purple_heart">
		<map name="purple_heart">
			<area shape="rect" coords="0,0,56.1,60" alt="purple_heart" href="like.php?member=jin&reaction=purple_heart">
		</map>
	
		<img src="photos/emoji/microphone.png" class="microphone" alt="microphone" usemap="#microphone">
		<map name="microphone">
			<area shape="rect" coords="0,0,56.1,60" alt="microphone" href="like.php?member=jin&reaction=microphone">
		</map>
		
		<img src="photos/emoji/loco.png" class="loco" alt="loco" usemap="#loco">
		<map name="loco">
			<area shape="rect" coords="0,0,56.1,60" alt="loco" href="like.php?member=jin&reaction=loco">
		</map></h4>
	</div>
	</div>
	
<style>
.r {
	position: absolute;
	display: block;
	color: #958d94;
	font-family: lucida sans;
	font-size: 15px;
	text-align: center;
	margin-top: 70px;
}

.like {
	display: block;
	position: absolute;
	margin-top: 260px;
	margin-left: -20px;
}

.thumbs_up, .smiling_devil, .purple_heart, .microphone, .loco {
	width: 56.1px;
	height: 60px;
}

.comments {
	position: absolute;
	display: block;
	margin-top: 680px;
	margin-left: 630px;
	color: #958d94;
	font-family: lucida sans;
	text-align: left;
}

.h3 {
	font-size: 19px;
}

.com {
	border-radius: 45px;
	height: 90px;
	width: 90px;
	display: block;
	margin-left: 500px;
	margin-top: -100px;
	object-fit: cover;
}

.c {
	display: block;
	font-size: 14px;
	caret-color: #ce53ed;
	border-color: #fff1d7;
	border-style: outset;
	border-radius: 15px;
	border-style: solid;
	margin-left: 630px;
	margin-top: -115px;
	background-color: #fefce0;
	height: 100px;
	width: 450px;
}

.sub {
	text-align: center;
	display: block;
	font-family: lucida sans;
	font-size: 13.5px;
	border-radius: 5px;
	border-color: #918e91;
	color: #fefce0;
	background-color: #918e91;
	margin-left: 1000px;
}

.av {
	border-radius: 45px;
	height: 90px;
	width: 90px;
	margin-left: 500px;
	margin-top: 15px;
	object-fit: cover;
}

.dn {
	color: #958d94;
	margin-top: -120px;
	margin-left: 630px;
	font-family: lucida sans;
	text-align: left;
	font-size: 14.5px;
}

.cm {
	height: 90px;
	width: 440px;
	background-color: #fefce0;
	border-color: #fff1d7;
	border-style: outset;
	border-radius: 15px;
	border-style: solid;
	display: block;
	margin-left: 630px;
	margin-top: 0px;
	color: #958d94;
	text-align: left;
	padding: 10px 0 0 10px;
}

.d {
	color: #958d94;
	font-family: lucida sans;
	text-align: right;
	font-size: 14px;
}

.other {
	display: block;
	position: absolute;
	margin-top: 900px;
}

.ur_comment {
	display: block;
	position: absolute;
	margin-top: 850px;
}

.del {
	text-align: center;
	display: block;
	font-family: lucida sans;
	font-size: 13.5px;
	border-radius: 5px;
	border-color: #918e91;
	color: #fefce0;
	background-color: #918e91;
	margin-left: 1000px;
}
</style>
	<div class="comments">
		<h3 class="h3">Comments:</h3>
	</div>
	<div class="ur_comment">
<?php
	if (isset($_COOKIE["username"])) {
		$username = htmlspecialchars($_COOKIE["username"]);
		$sql = "SELECT Avatar FROM users WHERE Usernames='$username'";	
		$result = mysqli_query($conn, $sql);
		
		if ($result !== " ") {
			while($row = $result->fetch_assoc()) {
				$avatar = $row["Avatar"];
				$folder = "photos/avatars/";
				$image = $folder.$avatar;
				echo "<img class='com' src='$image'>";
			}
		}
		
		echo "<form action='add_comment.php?member=jin' method='post'>
			<p><input class='c' name='comment' type='text' placeholder='Add a comment...' maxlength=240></p>
			<p><input class='sub' type ='submit' value='Submit' name='add'></p>
			</form>";
	}	else {
		echo "<form action='add_comment.php?member=jin' method='post'>
			<p><input class='c' name='comment' type='text' placeholder='You need to log in to comment' maxlength=240 disabled></p>
			</form>";
	}
	
?>
	</div>
	<div class="other">
<?php
	$sql2 = "SELECT Username, Comment, Date FROM comments WHERE Member='jin' ORDER BY comments.Date DESC";
	$result2 = $conn->query($sql2);
	
	if ($result2->num_rows > 0) {
		while($row2 = $result2-> fetch_assoc()) {
			$username = $row2['Username'];
			$sql3 = "SELECT Display_names, Avatar FROM users WHERE Usernames = '$username'";
			$result3 = mysqli_query($conn, $sql3);
			while($row3 = mysqli_fetch_array($result3)) {
				$avatar = $row3["Avatar"];
				$folder = "photos/avatars/";
				$image = $folder.$avatar;
				$display_name = $row3["Display_names"];
				$com = $row2["Comment"];
				$date = $row2["Date"];
				
				echo "<img class='av' src='$image'>";
				echo "<p class='dn'>$display_name (@$username)</p>";
				echo "<p class='cm'>$com</p>";
				echo "<p class='d'>$date</p>";
				
				if ((isset($_COOKIE["username"])) && ($_COOKIE["username"] == $username)) {
					$date = urlencode($date);
					echo "<form action='delete_comment.php?member=jin&date=$date' method='post'>
						<p><input type='submit' class='del' onclick=\"return confirm('Are you sure you want to delete?')\" value='Delete'/></p>
						</form>";
				}
			}
		}
	}
	close_connection($conn);
?>
	</div>
	
</body>
</html>