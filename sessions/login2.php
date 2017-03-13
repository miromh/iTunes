<?php 
session_start();
echo "Hello, ".$_SESSION['username'];
?>
<a href="logout.php"><button type="button" class="btn btn-primary">Изход</button></a>
