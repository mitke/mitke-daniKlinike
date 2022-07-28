<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

if (isset($_POST['submit'])) {
    require "../db.conf.php";
    require "../common.php";

try  {
 $connection = new PDO($dsn, $username, $password, $options);
 $new_user = array(
            "ime"	=> $_POST['ime'],
            "prezime"	=> $_POST['prezime'],
            "zanimanje"	=> $_POST['zanimanje'],
            "email"	=> $_POST['email'],
            "ustanova"	=> $_POST['ustanova'],
            "adresa"	=> $_POST['adresa'],
            "telefon"	=> $_POST['telefon'],
            "kurs"	=> $_POST['kurs']
        );
  $sql = sprintf(
  "INSERT INTO %s (%s) values (%s)",
  "prijave",
  implode(", ", array_keys($new_user)),
  ":" . implode(", :", array_keys($new_user))
  );

  $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessustanova();
    }
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
<p class="slova2"><?php echo $_POST['ime'], " ", $_POST['prezime']; ?> je uspešno prijavljen/a.</p>
<?php } ?>

<form name="form_prijava" onsubmit="return provera()" method="post" >

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan="3" class="naslov_sestre">PRIJAVA UČESNIKA ZA DANE UNIVERZITETSKE DEČJE KLINIKE 2021. </td>
</tr>
<tr>
<td width="90" class="text_sestre">&nbsp;</td>
<td width="5">&nbsp;</td>
<td width="520">&nbsp;</td>
</tr>
<tr>
<td width="90" class="text_sestre">Ime : </td>
<td width="5" height="5">&nbsp;</td>
<td><input name="ime" type="text" size="30">
*</td>
</tr>
<tr>
<td width="90" class="text_sestre">Prezime : </td>
<td width="5">&nbsp;</td>
<td><input name="prezime" type="text" size="30">
<input name="zanimanje" type="hidden" size="30" value="sestre">
*</td>
</tr>
<tr>
<td width="90" class="text_sestre">Ustanova : </td>
<td width="5">&nbsp;</td>
<td><input name="ustanova" type="text" size="30"> *</td>
</tr>
<tr>
<td width="90" class="text_sestre">Adresa : </td>
<td width="5">&nbsp;</td>
<td><input name="adresa" type="text" size="30"> *</td>
</tr>
<tr>
<td width="90" class="text_sestre">Telefon : </td>
<td width="5">&nbsp;</td>
<td><input name="telefon" type="text" size="30"> *   </td>
</tr>
<tr>
<td width="90" class="text_sestre">e-mail adresa : </td>
<td width="5">&nbsp;</td>
<td><input name="email" type="text"size="30"> *   </td>
</tr>
<tr>
    <td width="90" class="text_sestre">Prijava za kurs (do 50 učesnika)</td>
    <td width="5">&nbsp;</td>
    <td><input type="checkbox" name="kurs" value="+"></td>
</tr>

<!--
 <tr><td>&nbsp;</td><td>&nbsp;</td><td>Radionica 1 - Neonatalna hirurgija: najčešće ambulantne intervencije: </td></tr>

 <tr><td>&nbsp;</td><td>&nbsp;</td><td>Radionica 2 - Morbili: prepoznavanje i zbrinjavanje komplikacija i rizičnih grupa bolesnika</td></tr>

 </td>

  <tr>
    <td width="90" class="text_sestre">Petak radionice<br /> (SAMO jedna) 3 ili 4 : </td>
    <td width="5">&nbsp;</td>
    <td><input name="dani" type="text" id="txtIme11" size="30"></td>
  </tr>
 <tr><td>&nbsp;</td><td>&nbsp;</td><td>Radionica 3 - Alergologija: savremeni principi za dijagnostiku i lečenje alergija kod dece </td></tr>

  <tr><td>&nbsp;</td><td>&nbsp;</td><td>Radionica 4 - Epileptologija: dileme u dijagnostici, lečenju i praktičnom savetovanju roditelja </td></tr>

 <tr>
    <td width="90" align="right">&nbsp; </td>
    <td width="5">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
-->
  <tr>
    <td width="90" align="right">&nbsp;</td>
    <td width="5">&nbsp;</td>

    <td><span class="text_sestre_dno"><strong>Polja označena * su obavezna.</strong><br /> Prijavu <strong>OBAVEZNO </strong> popuniti latinicom </span></td>
  </tr>
<!--
  <tr>
    <td width="90" align="right">&nbsp; </td>
    <td width="5">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
-->
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="text_sestre_dno"><input name="submit" type="submit" value="Pošalji">
      <input name="btnReset" type="reset" id="btnReset2" value="Obriši"></td>
  </tr>
  <tr>
    <td width="90">&nbsp;</td>
    <td width="5">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="style3">
    <td colspan="3">
		   <p><strong>INFORMACIJE O PLAĆANJU</strong>
		   <br />Glavni program simpozijuma: 2000 dinara (u cenu je uračunat i PDV) - Uplate na žiro račun: 840 – 629667 - 08, sa pozivom na broj: S2021<br /> 
		   Kotizacija za kurs: 1500 dinara (u cenu je uračunat i PDV) - Uplate na žiro račun: 840 – 629667 - 08, sa pozivom na broj: SK2021</p> 
       <p><strong>Za učesnike iz regiona kotizacija se plaća na licu mesta.</strong></p>
	           <p><strong>Tehnička podrška za uplate kotizacija:</strong><br />
		   referent Jasna Pavlović:  011/20 60 655, e-mail:jasna.pavlovic@udk.bg.ac.rs</p>
                   <p>Ostale informacije: dani2021@udk.bg.ac.rs</p>

    </td>
  </tr>
  <tr class="style3">
    <td colspan="3">&nbsp;</td>
  </tr>
  
  <tr class="style3">
    <td colspan="3">&nbsp;</td>
  </tr>
</table>


</form>
<!-- <a href="index.php">Back to home</a> -->

<?php require "templates/footer.php"; ?>
