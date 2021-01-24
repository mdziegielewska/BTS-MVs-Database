<!DOCTYPE html>

<html>
<head>
<title>Admin page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>

<body onload="page_init()">
<a href="log_out.php" class="logout">Log out</a>

<nav class="users">
<h1 class="h1"> Manage users </h1>
<?php
	include 'db_connection.php';
	$conn = open_connection();
	$sql = "SELECT * FROM users ORDER BY users.Id DESC";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		echo "<table class='table1'>
			<tr>
				<th>Avatar</th>
				<th>Username</th>
				<th>Display name</th>
				<th>Password</th>
				<th>Delete</th>
			</tr>";
		while($row = $result-> fetch_assoc()) {
			$avatar = $row["Avatar"];
			$folder = "photos/avatars/";
			$image = $folder.$avatar;
		echo "<tr><td> <img class='pp' src='$image'>
			</td><td>" . $row["Usernames"]. 
			"</td><td>" . $row["Display_names"]. 
			"</td><td>" . $row["Passwords"]. 
			"</td><td> <a class='del' onclick=\"return confirm('Are you sure you want to delete?')\" href='delete.php?user=" . $row["Usernames"]. "'>Delete</a>
		</td></tr>";  
		}	
		echo "</table>";
	}
?>
</nav>
<nav class="comments">
<h2 class="h2"> Manage comments </h2>
<?php
	$sql2 = "SELECT * FROM comments ORDER BY comments.Member DESC";
	$result2 = $conn->query($sql2);
	
	if ($result2->num_rows > 0) {
		echo "<table class='table2'>
			<tr>
				<th>Member</th>
				<th>Avatar</th>
				<th>Username</th>
				<th>Display name</th>
				<th>Comment</th>
				<th>Date</th>
				<th>Delete</th>
			</tr>";
		while($row2 = $result2-> fetch_assoc()) {
			$username = $row2['Username'];
			$sql3 = "SELECT Display_names, Avatar FROM users WHERE Usernames = '$username'";
			$result3 = mysqli_query($conn, $sql3);
			
			while($row3 = mysqli_fetch_array($result3)) {
				$avatar = $row3["Avatar"];
				$folder = "photos/avatars/";
				$image = $folder.$avatar;
				
				echo "<tr><td>" . $row2["Member"] .
					"</td><td> <img class='pp' src='$image'>
					</td><td> $username
					</td><td>" . $row3["Display_names"]. 
					"</td><td>" . $row2["Comment"]. 
					"</td><td>" . $row2["Date"] .
					"</td><td> <a class='del' onclick=\"return confirm('Are you sure you want to delete?')\" href='delete_comment.php?member=" .$row2['Member'] . "&date=" .$row2['Date'] . "'>Delete</a>
				</td></tr>";  
			}
		}	
		echo "</table>";
	}
	close_connection($conn);
?>
</nav>
</body>
</html>