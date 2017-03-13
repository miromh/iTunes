<?php
include('connections/connecting.php');
if(isset($_GET['submit'])){
	$f_name = $_GET['f_name'];
	$l_name = $_GET['l_name'];
	$user_name = $_GET['user_name'];
	
	$password = $_GET['password'];
	$insert_query = 	"INSERT INTO registration (f_name,l_name,user_name,password) 
						VALUES ('$f_name','$l_name','$user_name','$password')";
			
			$insert_result= mysqli_query($conn, $insert_query);
			if ($insert_result) {
				echo "</br>Успешно се регистрирахте в iTunes!";
			
			}else{
				echo "Неуспешна регистрация! Моля опитайте по-късно!";
			
			}

}
else {
	echo "<form method='get' action='registration.php'>";
	echo "</br></br><input type='text' name='f_name'>";
	echo "</br></br><input type='text' name='l_name'>";
	
	echo "</br></br><input type='text' name='user_name'>";
	echo "</br></br><input type='password' name='password'>";
	echo "</br></br><input type='submit' name='submit' value='submit'>";
	echo "</form>";
}