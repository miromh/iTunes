<<<<<<< HEAD
<?php
include_once 'includes/db_connect.php';

if (isset($_GET['track_id'])) {
    $track_id             = $_GET['track_id'];
    $file                 = "";
    $read_file_path_query = "SELECT `file_path` FROM `songs` WHERE `song_id` = $track_id";
    $result               = mysqli_query($con, $read_file_path_query);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $file = $row['file_path'];
        }
    }
   
    if (file_exists($file)) {
        $update_downloads_query = "UPDATE `songs` SET `downloads`= downloads+1 WHERE `song_id` = $track_id";
        mysqli_query($con, $update_downloads_query);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
    
} else {
    header("Location: index.php");
}
?>
=======
<?php 
include_once 'includes/db_connect.php';


if (isset($_GET['track_id'])) {
	$track_id = $_GET['track_id'];
	$file = "";
	$read_file_path_query = "SELECT `file_path` FROM `songs` WHERE `song_id` = $track_id";
	$result = mysqli_query($con, $read_file_path_query);
	if (mysqli_num_rows($result) >0) { 
		while($row = mysqli_fetch_assoc($result)){
			$file = $row['file_path'];			
		}
	}		
	if (file_exists($file)) {
	$update_downloads_query = "UPDATE `songs` SET `downloads`= downloads+1 WHERE `song_id` = $track_id";	
	mysqli_query($con, $update_downloads_query);
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}

}else{
	header("Location: index.php");
}

 ?>
>>>>>>> origin/master
