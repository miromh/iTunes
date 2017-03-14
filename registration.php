<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>

</body>
</html>


<?php
include('connections/connecting.php');
if(isset($_GET['submit'])){
	$f_name = $_GET['f_name'];
	$l_name = $_GET['l_name'];
	$user_name = $_GET['user_name'];
	
	$password = md5($_GET['password']);//кеширане на паролата
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	// проверка дали е валиден имейла(премахва неочаквани символи като: <,>,?,#,!, и т.н.)
	if (filter_var($email, FILTER_VALIDATE_EMAIL)){
	$insert_query = 	"INSERT INTO registration (f_name,l_name,user_name,password,email) 
						VALUES ('$f_name','$l_name','$user_name','$password','$email')";
			
			$insert_result= mysqli_query($conn, $insert_query);
			if ($insert_result) {
				echo "</br>Успешно се регистрирахте в iTunes!";
			
			}else{
				echo "Неуспешна регистрация! Моля опитайте по-късно!";
					
	}}else{
	$Error ="Invalid Email Format....!!!!";
	}
			

}
else {//форма за регистрация
	echo '<div class="col-md-2">';
	
	echo "<form class='form-group' method='get' action='registration.php'>";
	
	echo '<div class="form-group">';
	echo "<input class='form-control' type='text' name='f_name' placeholder='Име...' required='requaired' minlength='3'></div>";
	
		
	echo '<div class="form-group">';
	echo "<input class='form-control' type='text' name='l_name' placeholder='Фамилия...' required='requaired' minlength='5'>";
	echo '</div>';
	
	echo '<div class="form-group">';
	echo "<input  class='form-control' type='text' name='user_name' placeholder='потребилско име...' required='requaired' minlength='5'>";
	echo '</div>';

	echo '<div class="form-group">';
	echo "<input class='form-control' type='password' name='password' placeholder='парола...' required='requaired'minlength='6'>";
	echo '</div>';

	echo '<div class="form-group">';
	echo "<input class='btn btn-primary btn-block' type='submit' name='submit' value='Регистрация'>";
	echo '</div>';

	echo "</form>";

	echo '</div>';
}
