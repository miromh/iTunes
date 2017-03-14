<?php
include('connections/connecting.php');
if(isset($_GET['submit'])){
$song_name = $_GET['song_name'];
$date_input=date('d/m/y');
$time_input=date('H:i:s');
$insert_query = 	"INSERT INTO songs (song_name,date_input,time_input) 
						VALUES ('$song_name','$date_input','$time_input')";
			
			$insert_result= mysqli_query($conn, $insert_query);
			if ($insert_result) {
				echo " Вие успешно качихте вашата песен в iTunes! $time_input";
			
			}else{
				echo "Неуспешно качване! Моля опитайте по-късно!";
			}
}else {
	echo '<div class="col-md-2">';
	
	echo "<form class='form-group' method='get' action='input.php'>";
	
	echo '<div class="form-group">';
	echo "<input class='form-control' type='text' name='song_name' placeholder='Име на песента..' required='requaired' minlength='3'></div>";
	
	echo '<div class="form-group">';
	echo "<input class='btn btn-primary btn-block' type='submit' name='submit' value='Качи песента'>";
	echo '</div>';

	echo "</form>";

	echo '</div>';


}
