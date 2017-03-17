<?php 
session_start();
include_once 'includes/db_connect.php';
include 'includes/header.php';

if (isset($_SESSION['usr_id'])) {
	if (isset($_GET['song_id'])) {
		$song_id = $_GET['song_id'];
		$song_name = "";
		$read_query = "SELECT * FROM `songs` WHERE `song_id` = $song_id";
		$result = mysqli_query($con, $read_query);
			if (mysqli_num_rows($result) >0) { 
		        while($row = mysqli_fetch_assoc($result)){
		          	if ($row['artist'] != '') {
		          		$song_name = $row['artist'] . ' - ' . $row['song'];
		          	}else{
		          		$song_name = $row['song'];
		          	}
		        }
		    }      	
	}
	ob_start();
?>	

<div class="form_center">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-4 well">
				<form action="vote.php" method="post">
				    <p class="text-center"><strong><?=$song_name?></strong></p>
				    <div class="col-md-1 col-md-offset-1">
				    
					<input type="text" name="song_id" value="<?=$song_id?>" hidden>	
				    <div class="radio">
					  <label>
					    <input type="radio" name="vote" id="options" value="1" required>
					    <img src="images/star_1.png" alt="">	
					  </label>
					</div>
						
					<div class="radio">
					  <label>
					    <input type="radio" name="vote" id="options" value="2" required>
					    <img src="images/star_2.png" alt="">	
					  </label>
					</div>	
					
					<div class="radio">
					  <label>
					    <input type="radio" name="vote" id="options" value="3" required>
					    <img src="images/star_3.png" alt="">	
					  </label>
					</div>

					<div class="radio">
					  <label>
					    <input type="radio" name="vote" id="options" value="4" required>
					    <img src="images/star_4.png" alt="">	
					  </label>
					</div>

					<div class="radio">
					  <label>
					    <input type="radio" name="vote" id="options" value="5" required>
					    <img src="images/star_5.png" alt="">	
					  </label>
					</div>

					</div>
				    <p><input  class="btn btn-success btn-block" type="submit" value="Гласувай" name="submit"></p>
				</form>
			</div>
		</div>
	</div>			
</div>
<?php

	if (isset($_POST['submit'])) {
		ob_clean();
		$song_id = $_POST['song_id'];
		$rating = $_POST['vote'];
		$vote_query = "UPDATE `songs` SET `num_votes`= num_votes+1,`rating`= rating + $rating WHERE `song_id` = $song_id";
		mysqli_query($con, $vote_query);
		echo '<div class="form_center">';
        echo '<img src="images/done.png">';
        echo '</div>';
		header( "refresh:1;url=index.php" );
	}




}
?>


