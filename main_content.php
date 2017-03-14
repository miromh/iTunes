<?php 
// session_start();
include_once 'includes/db_connect.php';
if (isset($_SESSION['usr_name'])) {
?>	

<!-- DEMO -->
<!-- <div class="container col-md-10-offset-2">
<table class="table table-striped table-bordered">
	<tr><td class="bg-danger text-center" colspan="5">DEMO</td></tr>
	<tr><td>Изпълнител</td><td>Песен</td><td>Дата на публикуване</td><td>Брой сваляния</td><td>Свали</td></tr>	  
	<tr><td>name</td><td>track</td><td>14.3.2017</td><td>0</td><td> <audio controls>  <source src="uploads/track.mp3" type="audio/mpeg">
</audio> </td></tr>
<tr><td>name</td><td>track</td><td>14.3.2017</td><td>0</td><td> <audio controls>  <source src="uploads/track.mp3" type="audio/mpeg">
</audio> </td></tr>

</table>
</div> -->
<!-- DEMO -->

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>




<?php 
}else{
	header("Location: index.php");
}

?>