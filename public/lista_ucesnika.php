<?php require "templates/header.php"; ?>

<!--<table style="color: #d96459; padding: 2px; cellspacing: 2; border-spacing: 3px;"> -->
<table style="color: #d96459; border-spacing: 2px;">
   <tr align='left'>
     <th>r.br.</th>
     <th>Ime</th>
     <th>Prezime</th>
     <th style="width:100px;">Broj licence</th>
     <th style="width:250px">Ustanova</th>
     <th style="width:200px">Adresa</th>
     <th style="width:150px">Telefon</th>
     <th>E-mail</th>
     <th>Plaćanje</th>
     <th>Rad.1</th>
     <th>Rad.2</th>
     <th>Rad.3</th>
     <th>Rad.4</th>
     <th>kurs</th>
     <th style="width:150px">Vreme prijave</th>
   </tr>
<?php
require "../db.conf.php";
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
    echo "<tr><td colspan='8'><br /><strong>".$z."(".$zbr['total'].")".":</strong></td></tr>";
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
 } else {
    echo "0 results";
 }
}
$conn->close();
?>

</table>
<?php require "templates/footer.php"; ?>
