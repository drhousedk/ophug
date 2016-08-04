<head>
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
    <title>Redigér ekspedienter</title>
</head>

<?php require_once('../config.php');

$action = $_GET['action'];
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
mysqli_query($connection, "SET NAMES utf8");
mysqli_query($connection, "SET character_set_results=’utf8′");
$count = "SELECT * from ekspedient";
$counted=mysqli_query($connection,$count);
$rowcount=mysqli_num_rows($counted);
echo "<p>Administrér ekspedienter - Antal licenser: $rowcount</p>";

?>
<p>
<table>
    <tr>
        <td>
            <FORM METHOD="LINK" ACTION="/ekspedition/">
                <button TYPE="submit" class="knap"><span><img src="/images/leftturnarrow32.png" height="15px"/> Tilbage</span>
                </button>
            </FORM>
        </td>
    </tr>
</table></p> <?php



if (!$action) {

    $sql = "SELECT * FROM ekspedient ORDER BY navn ASC";

    $result = mysqli_query($connection, $sql) or die(mysql_error());

    echo "<table class='ekspedient'>";
    echo "<tr bgcolor='#333333'><td><b>Navn</b></td><td><b>Handling</b></td></tr>";

    while ($row = mysqli_fetch_array($result)) {


        $id = $row['id'];
        $navn = $row['navn'];

        echo "<tr bgcolor=#cecece><td class='navn'>$navn</td><td class='action'><a href='?id=$id&action=edit'><img src='/images/pencil32.png' height='20px'/></a></td></tr>";
    }

    echo "</table>";


} else if ($action == "edit") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM ekspedient WHERE id=$id";
    $result = mysqli_query($connection, $sql) or die(mysql_error());
    $row = mysqli_fetch_array($result);
    $navn = $row['navn'];
    echo " <form method='get' action='ekspedient.php?action=save'><p>Redigér <b>$navn</b></p><form>
           <table>
           <tr><td><p class='black'>Navn:</p></td><td><input type='text' name='navn' value='$navn'</td></tr>
           <tr></tr><td></td><td><input type='hidden' value='save' name='action' />
                                 <input type='hidden' value='$id' name='id' /><input type='submit' value='Gem'></tr>
           </table>
           </form><p class='black'><a href='ekspedient.php'>Tilbage</a></p>";

} else if ($action == "save") {
    $navn = $_GET['navn'];
    $id = $_GET['id'];
    echo "<p>Id $id opdateret til: $navn</p><p class='black'><a href='./ekspedient.php'>Tilbage</a></p>";
    $sql = "UPDATE ekspedient SET navn='$navn' WHERE id='$id'";
    $result = mysqli_query($connection, $sql);
}


$connection->close();
?>