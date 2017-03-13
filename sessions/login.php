<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
</head>
<body>
<?php 
if (!empty($_POST['submit'])) {
	$_SESSION['username'] = $_POST['username'];
	echo "Hello, ".$_SESSION['username'];
	echo '<a href="login1.php">next</a>';
} else {
?>
	<form action="login.php" method="post">
	username<input type="text" name="username">
	password<input type="password" name="password">
	<input type="submit" name="submit" value="login">		
	</form>

	<?php
}
	?>
</body>
</html>