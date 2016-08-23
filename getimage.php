<?php

require_once('./config.php'); 

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
mysqli_query($connection, "SET NAMES utf8");
mysqli_query($connection, "SET character_set_results=’utf8′");

$id = $_GET['id'];

$sql = "SELECT imgcontent FROM afmont WHERE id=$id";
$result = mysqli_query($connection, "$sql");
$row = mysqli_fetch_assoc($result);

header("Content-type: image/jpeg");
echo $row['imgcontent'];

$connection->close();
?>