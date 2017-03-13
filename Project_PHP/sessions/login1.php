<?php 
session_start();
echo "Hello, ".$_SESSION['username'];
?>
<a href="login2.php">next</a>