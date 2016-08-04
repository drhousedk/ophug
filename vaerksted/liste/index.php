<?php require_once('../../config.php'); ?>
<title>Arbejdsliste</title>
<head>
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
    <meta http-equiv="refresh" content="60;url=./">
</head>
<p>Arbejdsliste</p>
<p>
<table>
    <tr>
        <td>
            <FORM METHOD="LINK" ACTION="../index.php">
                <button TYPE="submit" class="knap"><span><img src="/images/leftturnarrow32.png" height="15px"/> Forside</span>
                </button>
            </FORM>
        </td>
    </tr>
</table></p>
<?php
/* connect to the db */
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
mysqli_query($connection, "SET NAMES utf8");
mysqli_query($connection, "SET character_set_results=’utf8′");

// For the purpose of saving space on my post I'm going to limit the amount of results to 4, see "LIMIT 4" below.
$sql = "SELECT * FROM afmont ORDER BY id DESC";

// lister resultater
include '../func_list.php';

$connection->close();
?>
