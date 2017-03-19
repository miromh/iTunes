<<<<<<< HEAD
<?php
session_start();
include_once 'includes/db_connect.php';
include 'includes/header.php';
?>


<?php 
if (isset($_SESSION['usr_id'])) {
    include 'main_content.php';
}else{
    header("Location: login.php");
}

 ?>

</body>
=======
<?php
session_start();
include_once 'includes/db_connect.php';
include 'includes/header.php';
?>


<?php 
if (isset($_SESSION['usr_id'])) {
    include 'main_content.php';
}else{
    header("Location: login.php");
}

 ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
>>>>>>> origin/master
</html>