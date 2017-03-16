<?php 
// session_start();
include_once 'includes/db_connect.php';
if (isset($_SESSION['usr_name'])) {
      $id = $_SESSION['usr_id'];
      $admin_check_query = "SELECT `is_admin` FROM `users` WHERE `id` = $id";
      $chk_result = mysqli_query($con, $admin_check_query);
      $is_admin = 0;
            if (mysqli_num_rows($chk_result) >0) { 
                      while($row = mysqli_fetch_assoc($chk_result)){
                        if ($row['is_admin'] == 1) {
                              $is_admin = 1; 
                              echo 'I AM ADMIN';      
                          }  
                      }
            }
    
?>	

<!-- DEMO -->
<div class="container col-md-10-offset-2">
<table class="table table-striped table-bordered">
	
		  
<?php 
$arrow_up = '&#8595';
$arrow_down = '&#8593';
  
if(isset($_GET['uploader_id'])){
      $uploader_id = $_GET['uploader_id'];
      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null AND `uploader_id` = $uploader_id";
  }else{

                  if ($_GET == null) {
                      
                      $date = '?sort=date_desc';
                      $artist = '?sort=artist_desc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_desc';

                    $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`song_id` DESC";
                  
                  }elseif ($_GET['sort'] == 'date_asc') {
                      
                      $date = '?sort=date_desc';
                      $artist = '?sort=artist_desc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_desc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`song_id` ASC";
                  
                  }elseif ($_GET['sort'] == 'date_desc') {
                      
                      $date = '?sort=date_asc';
                      $artist = '?sort=artist_asc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_asc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`song_id` DESC";

                  }elseif($_GET['sort'] == 'artist_asc'){
                      
                      $date = '?sort=date_desc';
                      $artist = '?sort=artist_desc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_desc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`artist` ASC";

                  }elseif($_GET['sort'] == 'artist_desc'){
                      
                      $date = '?sort=date_asc';
                      $artist = '?sort=artist_asc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_asc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`artist` DESC";

                  }elseif($_GET['sort'] == 'song_asc'){
                      
                      $date = '?sort=date_desc';
                      $artist = '?sort=artist_desc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_desc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`song` DESC";

                  }elseif($_GET['sort'] == 'song_desc'){
                      
                      $date = '?sort=date_asc';
                      $artist = '?sort=artist_asc';
                      $song = '?sort=song_asc';
                      $uploader = '?sort=uploader_asc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`song` ASC";

                  }
      }              



  $result = mysqli_query($con, $read_query);
  
  

?>  
 <tr>
    <?php 
      if ($is_admin == 1) {
                    echo '<td class="bg-warning"></td>'; 
                  }
     ?>

    <td class="bg-warning">
    <strong><a href="index.php<?=$date?>">Качено на 
      <?php 
      if(isset($_GET['sort'])){
        if($_GET['sort']=='date_asc'){
          echo $arrow_down;
        }elseif ($_GET['sort']=='date_desc') {
          echo $arrow_up;
        }
      }
      ?>
     </strong>
   </td>
 

 <td class="bg-warning"><strong><a href="index.php<?=$artist?>">Изпълнител
 <?php 
  if(isset($_GET['sort'])){
    if($_GET['sort']=='artist_asc'){
      echo $arrow_down;
    }elseif ($_GET['sort']=='artist_desc') {
      echo $arrow_up;
    }
  }
  ?>
    
  </a> / <a href="index.php<?=$song?>">песен
  
  <?php 
    if(isset($_GET['sort'])){
    if($_GET['sort']=='song_asc'){
      echo $arrow_down;
    }elseif ($_GET['sort']=='song_desc') {
      echo $arrow_up;
    }
  }

   ?>


  </strong></td><td class="bg-warning"><strong>Качено от</strong></td><td class="bg-warning"><strong>Преслушване / сваляне</strong></td></tr>
 
<?php
      if (mysqli_num_rows($result) >0) { 
          while($row = mysqli_fetch_assoc($result)){
                
                
                echo '<tr>';

                  if ($is_admin == 1) {
                    echo '<td><a href="delete.php?delete_id=' . $row['song_id'] . '"><img src="images/delete.png"></td>'; 
                  }

  
                echo '<td>' . $row['date_uploaded'] . '</td><td>' . $row['artist'];
                if ($row['artist'] != null) {
                echo ' - ';
                }
                echo $row['song'] . '</td><td>';
                echo '<a href="index.php?uploader_id=' . $row['uploader_id'] . '">';
                echo $row['name'];
                echo '</a></td><td><audio controls>';
                echo '<source src="' . $row['file_path'] . '"></audio>';


                // echo '<td><div class="audio-player">';
                // echo '<audio id="audio-player" id="player"><source src="';
                // echo '$row["file_path"]';
                // echo '" type="audio/mpeg"></audio></div></td></tr>';

          }
      }
   
   ?>
	


</table>
</div>

<?php 
}else{
	header("Location: index.php");
}

?>