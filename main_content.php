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
                                   
                          }  
                      }
            }
    
?>	


<script>
  audiojs.events.ready(function() {
    var as = audiojs.createAll();
  });
</script>



<div class="container col-xs-8 col-xs-offset-2">
<!-- <div class="table-responsive"> -->
<table class="table table-striped table-bordered">
	
		  
<?php 
$arrow_up = '&#8595';
$arrow_down = '&#8593';
  
if(isset($_GET['uploader_id'])){
      $uploader_id = $_GET['uploader_id'];
      $date = '?sort=date_desc';   //add url link
      $artist = '?sort=artist_desc';	
      $song = '?sort=song_desc';
      $uploader = '?sort=uploader_desc';
      $dl = '?sort=dl_desc';
	  
	 //filter by uploader
      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null AND `uploader_id` = $uploader_id ORDER BY `songs`.`date_uploaded` DESC";
  }else{

                  if ($_GET == null) {
                      
                      $date = '?sort=date_desc';
                      $artist = '?sort=artist_desc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_desc';
                      $dl = '?sort=dl_desc';
                      $rating = '?sort=rating_desc';

                    $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`song_id` DESC"; 
                 
                  }elseif ($_GET['sort'] == 'date_asc') {
                      
                      $date = '?sort=date_desc';
                      $artist = '?sort=artist_desc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_desc';
                      $dl = '?sort=dl_asc';
                      $rating = '?sort=rating_desc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`date_uploaded` ASC";//sorting by  date  asc
                  
                  }elseif ($_GET['sort'] == 'date_desc') {
                      
                      $date = '?sort=date_asc';
                      $artist = '?sort=artist_asc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_asc';
                      $dl = '?sort=dl_desc';
                      $rating = '?sort=rating_asc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`date_uploaded` DESC";//sorting by  date  desc

                  }elseif($_GET['sort'] == 'artist_asc'){
                      
                      $date = '?sort=date_desc';
                      $artist = '?sort=artist_desc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_desc';
                      $dl = '?sort=dl_asc';
                      $rating = '?sort=rating_desc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`artist` ASC";//sorting by  artist  asc

                  }elseif($_GET['sort'] == 'artist_desc'){
                      
                      $date = '?sort=date_asc';
                      $artist = '?sort=artist_asc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_asc';
                      $dl = '?sort=dl_asc';
                      $rating = '?sort=rating_asc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`artist` DESC";//sorting by artist desc

                  }elseif($_GET['sort'] == 'song_asc'){
                      
                      $date = '?sort=date_desc';
                      $artist = '?sort=artist_desc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_desc';
                      $dl = '?sort=dl_desc';
                      $rating = '?sort=rating_desc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`song` DESC";//sorting by  song  desc

                  }elseif($_GET['sort'] == 'song_desc'){
                      
                      $date = '?sort=date_asc';
                      $artist = '?sort=artist_asc';
                      $song = '?sort=song_asc';
                      $uploader = '?sort=uploader_asc';
                      $dl = '?sort=dl_asc';
                      $rating = '?sort=rating_asc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`song` ASC"; //sorting by  date  asc

                  }elseif($_GET['sort'] == 'dl_asc'){
                      
                      $date = '?sort=date_desc';
                      $artist = '?sort=artist_desc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_desc';
                      $dl = '?sort=dl_desc';
                      $rating = '?sort=rating_desc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`downloads` ASC"; //sorting by  downloads asc

                  }elseif($_GET['sort'] == 'dl_desc'){
                      
                      $date = '?sort=date_asc';
                      $artist = '?sort=artist_asc';
                      $song = '?sort=song_asc';
                      $uploader = '?sort=uploader_asc';
                      $dl = '?sort=dl_asc';
                      $rating = '?sort=rating_asc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER BY `songs`.`downloads` DESC";//sorting by  date  desc
                  }elseif($_GET['sort'] == 'rating_asc'){
                      
                      $date = '?sort=date_desc';
                      $artist = '?sort=artist_desc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_desc';
                      $dl = '?sort=dl_desc';
                      $rating = '?sort=rating_desc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER by `rating`/`num_votes` ASC"; //sorting by  votes  asc

                  }elseif($_GET['sort'] == 'rating_desc'){
                      
                      $date = '?sort=date_asc';
                      $artist = '?sort=artist_asc';
                      $song = '?sort=song_desc';
                      $uploader = '?sort=uploader_asc';
                      $dl = '?sort=dl_asc';
                      $rating = '?sort=rating_asc';

                      $read_query = "SELECT * FROM `songs` JOIN users ON songs.uploader_id = users.id WHERE songs.date_deleted is null ORDER by `rating`/`num_votes` DESC";//sorting by  votes desc

                  }
      }              



  $result = mysqli_query($con, $read_query);
  
  

?>  
 <tr>
    
/* Checking for administrator */
    <?php 
      if ($is_admin == 1) {
                    echo '<td class="bg-warning"></td>'; 
                  }
    
                           
    ?>
/* navigation for sorting   */  
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


</strong></td>
<td class="bg-warning"><strong class="text-primary">Качено от</strong></td>
<td class="bg-warning"><a href="index.php<?=$dl?>"><strong>Свалено</strong>
   <?php 
    if(isset($_GET['sort'])){
      if($_GET['sort']=='dl_asc'){
        echo $arrow_down;
      }elseif ($_GET['sort']=='dl_desc') {
        echo $arrow_up;
      }
    }
    echo '</td>';
   ?>

  <td class="bg-warning"><a href="index.php<?=$rating?>"><strong class="text-primary">Рейтинг</strong>
  <?php 
    if(isset($_GET['sort'])){
      if($_GET['sort']=='rating_asc'){
        echo $arrow_down;
      }elseif ($_GET['sort']=='rating_desc') {
        echo $arrow_up;
      }
    }
    echo '</td>';
   ?>


  <td class="bg-warning"><strong class="text-primary">Слушай | Свали</strong></td></tr>
 
<?php

      if (mysqli_num_rows($result) >0) { 
          while($row = mysqli_fetch_assoc($result)){
                $normal_date = strtotime( $row['date_uploaded']);
                $row['date_uploaded'] = date('d.m.Y', $normal_date);
                $rating = 0;
                if ($row['rating'] != 0 && $row['num_votes'] != 0) {
                   $rating = $row['rating']/$row['num_votes'];//calculate rating
                }
                $star = 0;
                if ($rating > 0 && $rating < 2) {
                  $star = 1;
                }elseif ($rating >= 2 && $rating < 3) {
                  $star = 2;
                }elseif ($rating >= 3 && $rating < 4) {
                  $star = 3;
                }elseif ($rating >= 4 && $rating < 5) {
                  $star = 4;
                }elseif ($rating >= 5) {
                  $star = 5;
                }
                echo '<tr>';
                  if ($is_admin == 1) {
                    echo '<td><a href="delete_view.php?delete_id=' . $row['song_id'] . '"><img src="images/delete.png"></td>'; //add column for delete by admin
                  }

  
                echo '<td>' . $row['date_uploaded'] . ' г.</td><td><strong>' . $row['artist'];
                    if ($row['artist'] != null) {
                    echo ' - ';
                    }
                echo $row['song'] . '</strong></td><td>';

                echo '<a href="index.php?uploader_id=' . $row['uploader_id'] . '">' . $row['name'] . '</a></td>';
              
                
                echo '<td>' . $row['downloads'] . '</td>';
                echo '<td>'  ;
                echo '<a href="vote.php?song_id=' . $row["song_id"] .  '">' . '<img src="images/star_' . $star . '.png"></a>';
                echo '</td>';
                echo '<td><div class="inline-td"><audio preload="none">';
                echo '<source src="' . $row['file_path'] . '"></audio>';
                echo '<a href="download.php?track_id=' . $row['song_id'] . '"><button type="button" class="btn btn-success">Свали</button></a></div></td>';
       
          }
      }
   
   ?>
	


</table>

</div>

<?php 
}else{//should login
	header("Location: index.php");
}

?>

