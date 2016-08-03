<?php require_once('../../config.php'); ?>
<title>Arbejdsliste</title>
<head>
<link href="http://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link href="http://status.ophug1.dk/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="refresh" content="60;url=./">
</head>
<p>Arbejdsliste</p>
<p>
<table><tr><td><FORM METHOD="LINK" ACTION="../index.php">
<button TYPE="submit" class="knap"><span><img src="/images/leftturnarrow32.png" height="15px"/> Forside</span></button>
</FORM></td><td><FORM METHOD="LINK" ACTION="add.php">
<button TYPE="submit" class="knap"><span><img src="/images/pencilplus32.png" height="15px"/> Opret</span></button>
</FORM></td></tr>
</table></p>

<?php

$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$db);
mysqli_query($connection,"SET NAMES utf8");
mysqli_query($connection,"SET character_set_results=’utf8′");

  $sql = "SELECT * FROM afmont ORDER BY id DESC";

    // henter og viser liste
include '../func_list.php';

$connection->close();
?>
