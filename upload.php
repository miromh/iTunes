<<<<<<< HEAD
<?php
session_start();
include_once 'includes/db_connect.php';
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
				    <p><input  class="btn btn-success btn-block" type="submit" value="Изпрати" name="submit"></p>
				</form>
			</div>
		</div>
	</div>			
</div>

<?php
    if (isset($_POST['submit'])) {
        
        $user_id = $_SESSION['usr_id'];
        
        $target_dir  = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk    = 1;
        $file_type   = pathinfo($target_file, PATHINFO_EXTENSION);
        
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        
        
        // Allow certain file formats
        if ($file_type != "mp3") {
            echo '<div class="alert alert-danger"><strong>ВНИМАНИЕ! </strong>Позволени са само mp3 файлове</div>';
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                
                $date   = date('Y-m-d');
                $getID3 = new getID3;
                $id3    = $getID3->analyze($target_file);
                $artist = "";
                $song   = "";
                if (isset($id3['id3v1'])) {
                    // if ($id3['id3v1']['artist'] != '' && $song = $id3['id3v1']['title'] != '') {
                        $artist = $id3['id3v1']['artist'];
                        $song   = $id3['id3v1']['title'];
                    // }
                }elseif (isset($id3['id3v2'])) {
                    // if ($id3['id3v2']['comments']['artist'][0] != '' && ['id3v2']['comments']['artist'][0] != '') {
                    $artist = $id3['id3v2']['comments']['artist'][0];
                    $song = $id3['id3v2']['comments']['title'][0];
                    // }
                }else {
                    $song = str_replace('uploads/', '', $target_file);
                    $song = str_replace('.mp3', '', $song);
                }
                $artist        = preg_replace('/[^A-Za-z0-9\-]/', ' ', $artist);
                $song          = preg_replace('/[^A-Za-z0-9\-]/', ' ', $song);
                $new_file_name = preg_replace('/[^A-Za-z0-9\-]_.-/', ' ', $target_file);
                $new_file_name = str_replace("'", "", $new_file_name);
                
                // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $insert_query = "INSERT INTO `songs`(`artist`, `song`, `uploader_id`, `file_path`, `date_uploaded`) VALUES ('$artist', '$song', $user_id, '$new_file_name', '$date')";
                $result       = mysqli_query($con, $insert_query);
                if ($result) {
                    rename($target_file, $new_file_name);
                    
                    return header('Location: index.php');
                } else {
                    echo "Error: " . $insert_query . " - " . mysqli_error($con);
                }
                
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    
} else {
    header("Location: index.php");
}

?>
=======
<?php 
session_start();
include_once 'includes/db_connect.php';
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
				    <p><input  class="btn btn-success btn-block" type="submit" value="Изпрати" name="submit"></p>
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
	// if(isset($_POST["submit"])) {
	    // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    // if($check !== false) {
	    //     // echo "File is an image - " . $check["mime"] . ".";
	    //     $uploadOk = 1;
	    // } else {
	    //     // echo "File is not an image.";
	    //     $uploadOk = 0;
	    // }
	// }
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	

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
	    	if (isset($id3['id3v3'])) {
	    		if ($id3['id3v']['artist'] != '' && $song = $id3['id3v']['title'] != '') {
		    		$artist = $id3['id3v']['artist'];
		    		$song = $id3['id3v']['title'];
	    		}
	    	}else{
	    		$song = str_replace('uploads/','', $target_file);
	    		$song = str_replace('.mp3','', $song);
	    	}
	    	$artist = preg_replace('/[^A-Za-z0-9\-]/', ' ', $artist);
	    	$song = preg_replace('/[^A-Za-z0-9\-]/', ' ', $song);
	    	$new_file_name = preg_replace('/[^A-Za-z0-9\-]_.-/', ' ', $target_file);
	    	
	        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	        $insert_query = "INSERT INTO `songs`(`artist`, `song`, `uploader_id`, `file_path`, `date_uploaded`) VALUES ('$artist', '$song', $user_id, '$new_file_name', '$date')";
	        $result = mysqli_query($con, $insert_query);
	        if ($result) {
	        rename($target_file, $new_file_name);	

			return header('Location: index.php');  
			} else {
			echo "Error: " . $insert_query . " - " . mysqli_error($con);
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
>>>>>>> origin/master
