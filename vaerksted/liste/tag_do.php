﻿<?php require_once('../../config.php'); ?>
<title>Tag opgave</title>
<head>
<link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link href="/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="refresh" content="3; url=./">
</head>
<p>Tager opgave. Du stilles tilbage om 3 sekunder.</p>
<?php
  $id     = $_GET['id'];
  $mekaniker = $_GET['mekaniker'];

  

/* connect to the db */

$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$db);
mysqli_query($connection,"SET NAMES utf8");
mysqli_query($connection,"SET character_set_results= ^ ^ utf8 ^  ");

$sql = "UPDATE afmont SET mekaniker='$mekaniker',status='På vej' WHERE id='$id'";

$result = mysqli_query($connection, $sql);
echo "<p>Optaget taget OK $mekaniker</p>";




mysqli_close();
?>
<p>
<a href="./">Tilbage til opgaveliste</a>
</p>
