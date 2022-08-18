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

<?php require "templates/header_sestre.php"; ?>

<div class="w3-container">
<?php if (isset($_POST['submit']) && $statement) { ?>
<p class="w3-panel w3-brown w3-round"><strong><?php echo $_POST['ime'], " ", $_POST['prezime']; ?> je uspešno prijavljen/a.</p></strong>
<?php } ?>

<form name="form_prijava" onsubmit="return provera()" method="post" >

<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                    <input name="zanimanje" type="hidden" size="30" value="sestre"></td>
    <td>*</td>
  </tr>
   <tr>
    <td width="20" class="w3-right-align w3-text-brown">&nbsp;</td>
    <td width="220"><input class="w3-input w3-border" name="ustanova" type="text" placeholder="Ustanova"></td>
    <td>*</td>
  </tr>
  <tr>
    <td width="20" class="w3-right-align w3-text-brown">&nbsp;</td>
    <td width="220"><input class="w3-input w3-border" name="adresa" type="text" placeholder="Adresa"></td>
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
    <td  width="20" class="w3-right-align w3-text-brown">Prijava za kurs&nbsp;<br />(do 50 učesnika)&nbsp;</td>
    <td  width="220" style="text-align: left">
          &nbsp;<input type="radio" name="kurs" value="+"><label for="+">&nbsp;da</label><br />
          &nbsp;<input type="radio" name="kurs" value="-"><label for="-">&nbsp;ne</label>&nbsp;*</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td width="220">&nbsp;</td>
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
		    <p><strong>Glavni program:</strong> 2000 dinara (u cenu je uračunat i PDV)<br />
          Uplate za učešće u glavnom programima možete izvršiti na<strong> žiro račun:</strong> 840 – 629667 - 08, <strong>poziv na broj:</strong> S2022, 
          <strong>svrha uplate:</strong> „kotizacija za glavni program“.</p>
          <p><strong>Nacionalni kurs:</strong> 1500 dinara (u cenu je uračunat i PDV)<br />
          Uplate za učešće u programima možete izvršiti na<strong> žiro račun:</strong> 840 – 629667 - 08, <strong>poziv na broj:</strong> SK2022, 
          <strong>svrha uplate:</strong> „kotizacija za nacionalni kurs“.</p>
        <p>Za učesnike iz regiona kotizacija se plaća na licu mesta.</strong></p>
	      <p><strong>Tehnička podrška za uplatu kotizacija:</strong><br />
		    referent Jasna Pavlović:  011/20 60 655, e-mail:jasna.pavlovic@udk.bg.ac.rs</p>
        <p><strong>Kontakt e-mail:</strong> sofija.alijevic@udk.bg.ac.rs</p>
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
