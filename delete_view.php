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
            	
    if (isset($_GET['delete_id'])) {
                      
                                
?>

<div class="form_center">
<?php ob_start(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 well">
            	
            	<p class="lead">Наистина ли искате да изтриете файла ?</p>
            	<p>
				
            		<form action="delete.php" method="post">
            			<input type="text" name="id" value="<?=$_GET['delete_id']?>" hidden>
            			<input type="submit" class="btn btn-primary btn-lg" name="confirm_delete" value="Изтрий">
						<input type="submit" class="btn btn-default btn-lg" name="confirm_delete" value="Отказ">
            		</form>
            		
				</p>
			</div>
		</div>
	</div>
</div>

<?php 
}else{

  echo '<div class="form_center">';
  echo '<div class="alert alert-danger"><strong>ВНИМАНИЕ! </strong>Нямате правo на това действие</div>';
  echo '</div>';
    
  header( "refresh:2;url=index.php" );
}
}
}



 ?>