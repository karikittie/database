<html>
<body>
<?php echo file_get_contents("header.html"); ?>

<h1>Adding new user</h1>
 
<?php
$username = "w17ddb34";
include 'pwddb1.php'; // $password = "your DB password";
$databasename = "w17ddb34";
$hostname = "dbclass.cs.pdx.edu";
$connection = pg_connect("host=$hostname dbname=$databasename user=$username password=$password")
    or die ("Could not connect");

// First, check that the username isn't already taken
$query = "select username from worldzer0.player where username = '$_POST[username]'";
$result = pg_query($connection, $query)
   or die("Query error:" . pg_last_error());
if (pg_num_rows($result) != 0) {
	// while invalid username, ask for username
	echo "Username " . $_POST[username] . " already exists.";
	pg_close($connection);
	?>
	<html>
	<body>
	<h1>Inputer new username</h1>

	<form action="new_player.php" method="post">
	Username: <input type="text" name ="username"/><br><br>
	 
	<input type="submit" />
	</form>
	</body>
	</html>
	<?php
}
else {
	$player_url = "web.cecs.pdx.edu/~arredon/u/".$_POST[username];
	 
	$query="INSERT INTO worldzer0.player (score, level, url, first_name, 
		last_name, username, profile_text)
		VALUES (0, 1, '$player_url','$_POST[first_name]','$_POST[last_name]',
			'$_POST[username]','$_POST[profile_text]')";
	 
	$result = pg_query($connection, $query)
	   or die("Query error:" . pg_last_error());
	   
	echo "Insert successful, '$_POST[username]' added";
}
 
pg_close($connection);
?>
</body>
</html>
