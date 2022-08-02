<?php require "templates/header.php"; ?>

<!--<table style="color: #d96459; padding: 2px; cellspacing: 2; border-spacing: 3px;"> -->
<div class="w3-container">
<table class="w3-table-all" style="font-size: 12px;">
  <thead>
   <tr class="w3-brown">
     <th>r.br.</th>
     <th>Ime</th>
     <th>Prezime</th>
     <th>Broj licence</th>
     <th>Ustanova</th>
     <th>Adresa</th>
     <th>Telefon</th>
     <th>E-mail</th>
     <th>Plaćanje</th>
     <th>Rad.1</th>
     <th>Rad.2</th>
     <th>Rad.3</th>
     <th>Rad.4</th>
     <th>kurs</th>
     <th>Vreme prijave</th>
   </tr>
  </thead> 
<?php
require "../config.php";
require "../common.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$zan=array('doktori','sestre');
foreach( $zan as $z ) {
 $sql = "SELECT * FROM prijave WHERE zanimanje like '$z' ";
 $sql_01 = "SELECT COUNT(*) as total FROM prijave WHERE zanimanje like '$z' ";
 
 $result = $conn->query($sql);
 $result_01 = $conn->query($sql_01);
 $zbr = $result_01->fetch_assoc();
// echo $zbr['total']; 
 if ($result->num_rows > 0) {
    // output data of each row
    $i = 1;
    echo "<tr class='w3-orange w3-text-brown'><td colspan='15'><strong>".$z."(".$zbr['total'].")".":</strong></td></tr>";
//    echo "<tr><td colspan='8'><strong>".$z.":</strong></td></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td align='right'>".$i++.
	     "</td><td>".$row["ime"]. 
	     "</td><td>".$row["prezime"].
	     "</td><td align='center'>".$row["licenca"].
	     "</td><td>".$row["ustanova"].
	     "</td><td>".$row["adresa"].
	     "</td><td>".$row["telefon"].
	     "</td><td>".$row["email"].
         "</td><td>".$row["placanje"].
         "</td><td align='center'>".$row["r1"].
         "</td><td align='center'>".$row["r2"].
         "</td><td align='center'>".$row["r3"].
         "</td><td align='center'>".$row["r4"].
         "</td><td align='center'>".$row["kurs"].
	     "</td><td>".$row["date"].
             "</tr></td>";
    }
 } 
 /* else {
    echo "0 results";
 } */
}
$conn->close();
?>

</table>
</div>
<?php require "templates/footer.php"; ?>
