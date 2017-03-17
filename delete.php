<?php 
session_start();
include_once 'includes/db_connect.php';
include 'includes/header.php';
 
if (isset($_SESSION['usr_name'])) {
      $id = $_SESSION['usr_id'];
      $admin_check_query = "SELECT `is_admin` FROM `users` WHERE `id` = $id";
      $chk_result = mysqli_query($con, $admin_check_query);
      $is_admin = 0;
            if (mysqli_num_rows($chk_result) >0) { 
                      while($row = mysqli_fetch_assoc($chk_result)){
                        if ($row['is_admin'] == 1) {
                              $is_admin = 1; 
                          }  
                      }
            }

  if ($is_admin == 1) {
            	
                    
 		if (isset($_POST['confirm_delete'])) {
 			if ($_POST['confirm_delete'] == 'Изтрий') {
 				$delete_id = $_POST['id'];
 				$date = date('Y-m-d');
 				$file_path = "";
 				$read_file_path_query = "SELECT `file_path` FROM `songs` WHERE `song_id` = $delete_id";
 				$result = mysqli_query($con, $read_file_path_query);
 				if (mysqli_num_rows($result) >0) { 
          			while($row = mysqli_fetch_assoc($result)){
          				$file_path = $row['file_path'];
          			}
          		}		

 				$delete_query = "UPDATE `songs` SET `date_deleted`= '$date' WHERE `song_id` = $delete_id";
 				mysqli_query($con, $delete_query);
 				unlink($file_path);
				echo '<div class="form_center">';
        echo '<img src="images/done.png">';
        echo '</div>';
				header( "refresh:1;url=index.php" );
				
 			}elseif ($_POST['confirm_delete'] == 'Отказ') {
 				header("Location: index.php");
 			}
 		}





 	}else{
	 	echo '<div class="form_center">';
		echo '<div class="alert alert-danger"><strong>ВНИМАНИЕ! </strong>Нямате правo на това действие</div>';
		echo '</div>';
		header( "refresh:2;url=index.php" );
 	}
}else{
		echo '<div class="form_center">';
		echo '<div class="alert alert-danger"><strong>ВНИМАНИЕ! </strong>Нямате правo на това действие</div>';
		echo '</div>';
		header( "refresh:2;url=index.php" );
}   



?>

