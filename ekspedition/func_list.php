<?php  $result = mysqli_query($connection,$sql)or die(mysql_error());
 
 
  echo "<table>";
  echo "<tr bgcolor='#333333'><td><b>Stamnr</b></td><td><b>Bil</b></td><td><b>Reservedel</b></td><td><b>Besked</b></td><td><b>Varetur</b></td><td><b>Status</b></td><td><b>Ekspedient</b></td><td><b>Mekaniker</b></td><td><b>Bestilt</b></td><td><b>Note fra værksted</b></td><td><b>Print</b></td></tr>";
 
  while($row = mysqli_fetch_array($result)){

 
  $stamnr     = $row['stamnr'];
  $bil    = $row['bil'];
  $reservedel     = $row['reservedel'];
  $varetur = $row['varetur'];
  $status    = $row['status'];
  $ekspedient    = $row['ekspedient'];
  $mekaniker    = $row['mekaniker'];
  $tid = $row['tid'];
  $note = $row['note'];
  $besked = $row['besked'];
  $id = $row['id'];


 if ($status == "Bestilt") {
    $bgcolor = "#AB0000";
 }
 elseif ($status == "På vej") {
    $bgcolor = "#ABAB00";
  }
  else {
    $bgcolor = "#2BAB00";
  }

echo "<tr bgcolor='$bgcolor'><td class='stamnr'>".$stamnr."</td><td class='bil'>".$bil."</td><td class='reservedel'>".$reservedel."</td><td class='besked'>".$besked."</td><td class='varetur'>".$varetur."</td><td class='status'>".$status."</td><td class='ekspedient'>".$ekspedient."</td><td class='mekaniker'>".$mekaniker."</td><td class='tid'>".$tid."</td><td class='note'>".$note."</td><td><center><a href='/print.php?id=".$id."' target='_blank'><img src='/images/printer32.png' height='20px' /></a></center></td></tr>";
}

echo "</table>";

?>
