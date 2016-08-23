<?php require_once('./config.php'); ?>
<?php
if(isset($_GET['id']))
{
// if id is set then get the file with the id from database

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
    mysqli_query($connection, "SET NAMES utf8");
    mysqli_query($connection, "SET character_set_results=’utf8′");

// henter og viser liste
    include '../func_list.php';



    $id    = $_GET['id'];
    $query = "SELECT imgname, imgtype, imgsize, imgcontent " .
        "FROM afmont WHERE id = '$id'";

    $result = mysqli_query($connection, $query) or die('Error, query failed');
    list($name, $type, $size, $content) =                                  mysqli_fetch_array($result);

    header("Content-length: $size");
    header("Content-type: $type");
    header("Content-Disposition: attachment; filename=$name.jpg");
    echo $content;

    $connection->close();
    exit;
}

?>