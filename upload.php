<?php 
session_start();
include_once 'includes/db_connect.php';
include 'includes/functions.php';
include 'includes/header.php';
require_once('includes/getid3/getid3.php');
if (isset($_SESSION['usr_id'])) {
?>

<div class="form_center">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 well">
				<form action="upload.php" method="post" enctype="multipart/form-data">
				    <label for="fileToUpload">Качи песен от твоят компютър: </label>
				    <input type="file" name="fileToUpload" id="fileToUpload" required>
				    <p></p>
				    <p><input  class="btn btn-primary btn-block" type="submit" value="Изпрати" name="submit"></p>
				</form>
			</div>
		</div>
	</div>			
</div>

<?php 
if (isset($_POST['submit'])) {
	
	$user_id = $_SESSION['usr_id'];

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$file_type = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    // if($check !== false) {
	    //     // echo "File is an image - " . $check["mime"] . ".";
	    //     $uploadOk = 1;
	    // } else {
	    //     // echo "File is not an image.";
	    //     $uploadOk = 0;
	    // }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	// if ($_FILES["fileToUpload"]["size"] > 5000000000) {
	//     echo "Sorry, your file is too large.";
	//     $uploadOk = 0;
	// }
	// Allow certain file formats
	if($file_type != "mp3") {
	    echo '<div class="alert alert-danger"><strong>ВНИМАНИЕ! </strong>Позволени са само mp3 файлове</div>';
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    // echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    	$date = date('Y-m-d');
	    	$getID3 = new getID3;
	    	$id3 = $getID3->analyze($target_file);
	    	$artist = "";
	    	$song = "";
	    	if (isset($id3['id3v1'])) {
	    		$artist = $id3['id3v1']['artist'];
	    		$song = $id3['id3v1']['title'];
	    	}else{
	    		$song = str_replace('uploads/','', $target_file);
	    		$song = str_replace('.mp3','', $song);
	    	}
	        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	        $insert_query = "INSERT INTO `songs`(`artist`, `song`, `uploader_id`, `file_path`, `date_uploaded`) VALUES ('$artist', '$song', $user_id, '$target_file', '$date')";
	        $result = mysqli_query($con, $insert_query);
	        if ($result) {
			return header('Location: index.php');  
			} else {
			echo "Error: " . $update_query . " - " . mysqli_error($conn);
	}
	        
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
}	

}else{
	header("Location: index.php");
}
 ?>
