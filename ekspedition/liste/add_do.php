<?php require_once('../../config.php'); ?>
<title>Tilføjer til liste</title>
<head>
<link href="http://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link href="/style.css" rel="stylesheet" type="text/css"> 
</head>
<p>Tilføjer til liste...</p>
<meta http-equiv="refresh" content="3; url=./">
<?php
  $stamnr     = $_POST['stamnr'];
  $bil    = $_POST['bil'];
  $reservedel     = $_POST['reservedel'];
  $varetur = $_POST['varetur'];
  $besked = $_POST['besked'];
  $status    = 'Bestilt';
  $ekspedient    = $_POST['ekspedient'];
  date_default_timezone_set('Europe/Copenhagen');
  $tid = date('d.m.Y - H:i', time());
  

/* connect to the db */

$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$db);
mysqli_query($connection,"SET NAMES utf8");
mysqli_query($connection,"SET character_set_results= ^ ^ utf8 ^  ");

    $sql = "INSERT INTO afmont (stamnr, bil, reservedel, varetur, status, ekspedient, tid, besked)
VALUES ('$stamnr', '$bil', '$reservedel', '$varetur', '$status', '$ekspedient', '$tid', '$besked')";

$result = mysqli_query($connection,$sql);
$cleanupSQL = "DELETE FROM afmont WHERE id NOT IN (
  SELECT id
  FROM (
    SELECT id
    FROM afmont
    ORDER BY id DESC
    LIMIT 100
  ) x
);";
mysqli_query($connection,$cleanupSQL);
echo '<p>Oprettet OK - du stilles tilbage om 3 sekunder</p>';



$connection->close();
?>
<p>
<a href="./">Tilbage til opgaveliste</a>
</p>
