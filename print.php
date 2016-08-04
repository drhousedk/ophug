<?php require_once('./config.php'); ?>
<head>
    <style>
        body {
            font-size: 18px;
        }

        table {
            font-size: 24px;
        }

        table .overskrift {
            font-weight: bold;
            padding-right: 50px;
        }

        table .tekst {
            max-width: 100%;
        }

        table td {
            padding-bottom: 15px;
        }
    </style>
</head>
<body onload="window.print()">
<?php
/* connect to the db */
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$db);
mysqli_query($connection, "SET NAMES utf8");
mysqli_query($connection, "SET character_set_results=’utf8′");
$id = $_GET['id'];
$sql = "SELECT * FROM afmont WHERE id = '$id'";
$result = mysqli_query($connection,$sql)or die(mysql_error());

  while($row = mysqli_fetch_array($result)){


      $stamnr     = $row['stamnr'];
      $bil    = $row['bil'];
      $reservedel     = $row['reservedel'];
      $varetur = $row['varetur'];
      $status    = $row['status'];
      $ekspedient    = $row['ekspedient'];
      $mekaniker    = $row['mekaniker'];
      $tid = $row['tid'];
      $id = $row['id'];
      $besked = $row['besked'];
      $note = $row['note'];

      if ($besked == "") { $besked = "-"; }

echo "
<table>
<tr>
    <td class='overskrift'>Opgavenr</td>
    <td class='tekst'>$id</td>
</tr>
<tr>
    <td class='overskrift'>Stamnr</td>
    <td class='tekst'>$stamnr</td>
</tr>
<tr>
    <td class='overskrift'>Bil</td>
    <td class='tekst'>$bil</td>
</tr>
<tr>
    <td class='overskrift'>Reservedel</td>
    <td class='tekst'>$reservedel</td>
</tr>
<tr>
    <td class='overskrift'>Besked</td>
    <td class='tekst'>$besked</td>
</tr>
<tr>
    <td class='overskrift'>Varetur</td>
    <td class='tekst'>$varetur</td>
</tr>
<tr>
    <td class='overskrift'>Bestilt af</td>
    <td class='tekst'>$ekspedient</td>
</tr>
</table>
<button type=\"button\" 
        onclick=\"window.open('', '_self', ''); window.close();\">Luk</button>
";

  }


?>
</body>
