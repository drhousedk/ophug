<?php $result = mysqli_query($connection, $sql) or die(mysql_error());


echo "<table>";
echo "<tr bgcolor='#333333'><td><b>Stamnr</b></td><td><b>Bil</b></td><td><b>Reservedel</b></td><td><b>Besked</b></td><td><b>Varetur</b></td><td><b>Status</b></td><td><b>Ekspedient</b></td><td><b>Mekaniker</b></td><td><b>Bestilt</b></td><td><b>Tag opgave</b></td><td><b>Meld klar</b></td><td><b>Note</b></td><td><b>Print</b></td></tr>";

while ($row = mysqli_fetch_array($result)) {


    $stamnr = $row['stamnr'];
    $bil = $row['bil'];
    $reservedel = $row['reservedel'];
    $varetur = $row['varetur'];
    $status = $row['status'];
    $ekspedient = $row['ekspedient'];
    $mekaniker = $row['mekaniker'];
    $tid = $row['tid'];
    $id = $row['id'];
    $besked = $row['besked'];
    $note = $row['note'];


    if ($status == "Bestilt") {
        echo "<tr bgcolor='#AB0000'><td>" . $stamnr . "</td><td>" . $bil . "</td><td>" . $reservedel . "</td><td>" . $besked . "</td><td>" . $varetur . "</td><td>" . $status . "</td><td>" . $ekspedient . "</td><td>" . $mekaniker . "</td><td>" . $tid . "</td>
        <td>";

        $connection2 = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
        mysqli_query($connection2, "SET NAMES utf8");
        mysqli_query($connection2, "SET character_set_results= ^ ^ utf8 ^  ");
        $sql2 = "SELECT * FROM mekaniker ORDER BY navn ASC";
        $result2 = mysqli_query($connection2, $sql2);

        while ($row = mysqli_fetch_array($result2)) {
            $navn = $row['navn'];
            echo "<a href=tag_do.php?id=$id&mekaniker='$navn'>$navn</a> - ";
        }

        $connection2->close();

        echo "</td><td></td><td>" . $note . "</td><td><center><a href='/print.php?id=" . $id . "' target='_blank'><img src='/images/printer32.png' height='20px' /></a></center></td></tr>";
    } elseif ($status == "På vej") {

        echo "<tr bgcolor='#ABAB00'><td>" . $stamnr . "</td><td>" . $bil . "</td><td>" . $reservedel . "</td><td>" . $besked . "</td><td>" . $varetur . "</td><td>" . $status . "</td><td>" . $ekspedient . "</td><td>" . $mekaniker . "</td><td>" . $tid . "</td><td>Er taget</td></td><td>
<form name='klar' method='post' action='klar_do.php?id=" . $id . "'><input type='submit' value='Meld klar!'><!--<a href=klar_do.php?id=" . $id . ">Meld klar</a>--></td><td><input type='text' name='note'></form></td><td><center><a href='/print.php?id=" . $id . "' target='_blank'><img src='/images/printer32.png' height='20px' /></a></center></td></tr>";
    } else {

        echo "<tr bgcolor='#2BAB00'><td>" . $stamnr . "</td><td>" . $bil . "</td><td>" . $reservedel . "</td><td>" . $besked . "</td><td>" . $varetur . "</td><td><b>" . $status . "</b></td><td>" . $ekspedient . "</td><td>" . $mekaniker . "</td><td>" . $tid . "</td><td></td><td></td><td>
" . $note . "</td><td><center><a href='/print.php?id=" . $id . "' target='_blank'><img src='/images/printer32.png' height='20px' /></a></center></td></tr>";

    }
}

echo "</table>";

?>
