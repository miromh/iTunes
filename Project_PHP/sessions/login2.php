<?php 
session_start();
echo "Hello, ".$_SESSION['username'];
?>
<a href="logout.php">logout</a>