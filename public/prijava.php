<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";

try  {
 $connection = new PDO($dsn, $username, $password, $options);
 $new_user = array(
            "ime"	=> $_POST['ime'],
            "prezime"	=> $_POST['prezime'],
            "licenca" => $_POST['licenca'],
            "zanimanje"	=> $_POST['zanimanje'],
            "email"	=> $_POST['email'],
            "ustanova"	=> $_POST['ustanova'],
            "adresa"	=> $_POST['adresa'],
            "telefon"	=> $_POST['telefon'],
            "placanje" => $_POST['placanje'],
            "r1" => $_POST['r1'],
            "r2" => $_POST['r2'],
            "r3" => $_POST['r3'],
            "r4" => $_POST['r4']
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
<div class="w3-container">
<?php if (isset($_POST['submit']) && $statement) { ?>
<p class="w3-panel w3-deep-orange w3-round"><strong><?php echo $_POST['ime'], " ", $_POST['prezime']; ?> je uspešno prijavljen/a</strong></p>
<?php } ?>

<form name="form_prijava" onsubmit="return provera()" method="post" >

<table width="100%" border="0" cellspacing="0" cellpadding="0" 
  <tr>
    <td colspan="3"><div class="w3-panel w3-orange w3-round-large"><h3>Prijava učesnika za dane Univerzitetske dečje klinike 2022.</h3></div> </td>
  </tr>

  <tr>
    <td width="20" class="w3-right-align">&nbsp;</td>
    <td width="220">&nbsp;</td>
    <td width="220">&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align w3-text-brown">&nbsp;</td>
    <td width="220"><input class="w3-input w3-border" name="ime" type="text" placeholder="Ime"></td>
    <td>*</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align w3-text-brown">&nbsp;</td>
    <td width="220"><input class="w3-input w3-border" name="prezime" type="text" placeholder="Prezime">
    	<input name="zanimanje" type="hidden" size="30" value="doktori"></td>
    <td>*</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align w3-text-brown">&nbsp;</td>
    <td width="220"><input name="licenca" class="w3-input w3-border" type=text" placeholder="Broj licence"></td>
    <td>*</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align w3-text-brown">&nbsp; </td>
    <td width="220"><input class="w3-input w3-border" name="ustanova" type="text" placeholder="Ustanova"> </td>
    <td>*</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align w3-text-brown">&nbsp;</td>
    <td width="220"><input class="w3-input w3-border" name="adresa" type="text" placeholder="Adresa"> </td>
    <td>*</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align w3-text-brown">&nbsp;</td>
    <td width="220"><input class="w3-input w3-border" name="telefon" type="text" placeholder="Telefon"></td>
    <td>*</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align w3-text-brown">&nbsp;</td>
    <td width="220"><input class="w3-input w3-border" name="email" type="text" placeholder="e-mail adresa"></td>
    <td>*</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td width="220">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align w3-text-brown">Način plaćanja:&nbsp;</td>
    <td width="220" style="text-align: left"><input type="radio" id="licno" name="placanje" value="lično"> <label class="w3-text-brown" for="licno">lično</label></td>
    <td class="w3-text-brown">&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align w3-text-brown"> &nbsp; </td>
    <td width="220" style="text-align: left"><input type="radio" id="sponzor" name="placanje" value="sponzor"> <label class="w3-text-brown" for="sponzor">sponzor</label></td>
    <td class="w3-text-brown"></td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td width="220">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align w3-text-brown">Radionice:&nbsp; </td>
    <td width="220" class="w3-left-align w3-text-brown">1 <input type="checkbox" name="r1" value="+"></td>
    <td> &nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align"> &nbsp; </td>
    <td width="220" class="w3-left-align w3-text-brown">2&nbsp;<input type="checkbox" name="r2" value="+"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align">&nbsp;</td>
    <td width="220" class="w3-left-align w3-text-brown">3&nbsp;<input type="checkbox" name="r3" value="+"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align">&nbsp;</td>
    <td width="220" class="w3-left-align w3-text-brown">4&nbsp;<input type="checkbox" name="r4" value="+"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align">&nbsp;</td>
    <td><div class="w3-panel w3-orange w3-round-large"><p><strong>Polja označena * su obavezna.</strong><br /> Prijavu <strong>OBAVEZNO </strong> popuniti latinicom </p></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align">&nbsp; </td>
    <td width="220">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;<input class="w3-button w3-round w3-deep-orange w3-hover-brown" name="submit" type="submit" value="Pošalji">
      <input class="w3-button w3-round w3-deep-orange w3-hover-brown" name="btnReset" type="reset" id="btnReset2" value="Obriši"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td width="220">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
        <div class="w3-panel w3-orange w3-round-large">
		   <h5> <strong>INFORMACIJE O PLAĆANJU</strong></h5>
		   <p>Glavni program: 9600 dinara (u cenu je uračunat i PDV)<br />
                  
                      Uplate za učešće u programima možete izvršiti na
                      <strong> žiro račun: 840 – 629667 - 08, sa pozivom na broj: 24L, </strong>
                      svrha uplate: „kotizacija za osnovni program“.</p>
                  <p><strong>Za učesnike iz regiona kotizacija se plaća na licu mesta.</strong></p>
	          <p>Tehnička podrška za uplate kotizacija:<br />
		     referent Jasna Pavlović:  011/20 60 655, e-mail:jasna.pavlovic@udk.bg.ac.rs<br />
                     Kontakt e-mail: dani2021@udk.bg.ac.rs</p>
	</div>
    </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>


</form>
<!-- <a href="index.php">Back to home</a> -->
</div>
<?php require "templates/footer.php"; ?>
