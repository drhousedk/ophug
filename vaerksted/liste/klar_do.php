<?php require_once('../../config.php'); ?>
<title>Tag opgave</title>
<head>
    <link href="http://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
    <meta http-equiv="refresh" content="3; url=./">
</head>
<p>Melder klar. Du stilles tilbage om 3 sekunder.</p>
<?php
$id = $_GET['id'];
$note = $_POST['note'];


/* connect to the db */

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
mysqli_query($connection, "SET NAMES utf8");
mysqli_query($connection, "SET character_set_results= ^ ^ utf8 ^  ");
$sql = "UPDATE afmont SET status='Klar', note='$note' WHERE id='$id'";

$result = mysqli_query($connection, $sql);
echo '<p>Meldt klar OK</p>';
mysql_close();
?>
<p>
    <a href="./">Tilbage til opgaveliste</a>
</p>
