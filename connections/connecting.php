<?php
$servername = 'localhost';
$username = 'itunes';
$pass = 'itunes1234';
$dbname = 'itunes';
$conn = mysqli_connect($servername,$username,$pass,$dbname);
if(!$conn){
	die('Connection failed'.mysqli_connect_error());
}else{
	echo "Connection is ok with itunes";
}