<?php 

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>iTunes</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="includes/audiojs/audio.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="includes/audiojs/audiojs.css"> -->


</head>

<style type="text/css" media="screen">
	body{
		background-image: url("images/bg.jpg");
		background-repeat: no-repeat;
		background-position: top;
    background-attachment: fixed;

	}	
	.form_center {
     position: absolute;
     top: 50%;
     left:50%;
     transform: translate(-50%,-50%);
   }
   table{
   	box-shadow: 0px 0px 50px #262626;
   }
   td{
   	background-color: rgba(255,255,255,0.9);
   }
   .inline-td {
    display: flex;
   }

}
</style>

<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">iTunes</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['usr_id'])) { ?>
                <li><p class="navbar-text"><a href="upload.php"><button type="button" class="btn btn-primary btn-sm">Качи песен</button></a></p></li>
                <li><p class="navbar-text"> <a href="index.php?uploader_id=<?=$_SESSION['usr_id']?>"><?php echo $_SESSION['usr_name']; ?></a></p></li>
                <li><a href="logout.php">Log Out</a></li>
                <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Sign Up</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>