﻿<?php require_once('../../config.php'); ?>
<title>Arbejdsliste</title>
<head>
<link href="http://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link href="http://status.ophug1.dk/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="refresh" content="60;url=./">
</head>
<p>Arbejdsliste</p>
<?php
/* connect to the db */
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$db);
mysqli_query($connection, "SET NAMES utf8");
mysqli_query($connection, "SET character_set_results=’utf8′");

// For the purpose of saving space on my post I'm going to limit the amount of results to 4, see "LIMIT 4" below.
  $sql = "SELECT * FROM afmont ORDER BY id DESC";

      // lister resultater
  include '../func_list.php';

$connection->close();
?>
<p><a href=../>Tilbage til forsiden</a></p>
