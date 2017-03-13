<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>login</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>

<?php
if (!empty($_POST['submit'])) {
	$_SESSION['username'] = $_POST['username'];
	echo "Hello, ".$_SESSION['username'];
	echo '<a href="login1.php">next</a>';
} else {
?>

		<div class="col-md-3">
			<form action="login.php" method="post" class="form-group">
				
				<div class="form-group">
					<input class="form-control" type="text" name="username" placeholder="потребителско име...">
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="password" placeholder="парола...">
				</div>
				<input class="btn btn-primary btn-block" type="submit" name="submit" value="Вход">
			</form>
		</div>
<?php
}
?>


	</body>
</html>