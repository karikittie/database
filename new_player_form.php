<html>
<body>
<?php echo file_get_contents("header.html"); ?>

<h1>Input new user information</h1>

<form action="new_player.php" method="post">
Username: <input type="text" name ="username"/><br><br>
First Name: <input type="text" name="first_name" /><br><br>
Last Name: <input type="text" name="last_name" /><br><br>
Something about yourself (visible to others): <input type="text" name="profile_text" /><br><br>
 
<input type="submit" />
</form>
</body>
</html>
