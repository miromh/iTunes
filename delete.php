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
?>

<div class="form_center">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 well">
            	<p class="lead">Наистина ли искате да изтриете файла ?</p>
</div>
</div>
</div>
</div>


 <?php
}    


 ?>

