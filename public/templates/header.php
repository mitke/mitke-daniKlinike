<!DOCTYPE html>
<head>
   <meta content="text/html; charset=UTF-8" />
   <title>Dani Klinike 2022</title>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">
</style>
<script language="javascript">

/*
function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
} 
*/

function provera() {
if (document.forms["form_prijava"]["ime"].value.trim() == "")
  {
    alert("Ne možete da se prijavite ako nam ne kažete Vaše cenjeno ime!!!");
    document.getElementById("id_ime").focus();
    return false; 
  }
if (document.forms["form_prijava"]["prezime"].value.trim() == "")
  {
    alert("Ne možete da se prijavite ako nam ne kažete Vaše cenjeno prezime!!!");
    document.getElementById("id_prezime").focus();
    return false; 
  }

var licencaExp = /^\d{7}$/; 
if (!document.forms["form_prijava"]["licenca"].value.match(licencaExp))
  {
    alert("Licenca mora da se sastoji od 7 cifara");
    document.getElementById("id_licenca").focus();
    return false;
  }

if (document.forms["form_prijava"]["ustanova"].value.trim() == "")
  {
    alert("Moramo da znamo gde radite!!!");
    document.getElementById("id_ustanova").focus();
    return false; 
  }
if (document.forms["form_prijava"]["adresa"].value.trim() == "")
  {
    alert("Adresa je obavezno polje!!!");
    document.getElementById("id_adresa").focus();
    return false; 
  }
if (document.forms["form_prijava"]["telefon"].value.trim() == "")
  {
    alert("Vaš broj telefona je obavezno polje!!!");
    document.getElementById("id_telefon").focus();
    return false; 
  }

/*i
var telExp = /^0\d{7,9}$/; 
if (!document.forms["form_prijava"]["telefon"].value.match(telExp))
  {
    alert("Broj telefona mora biti u obliku 0xxxxxxx");
    document.getElementById("id_telefon").focus();
    return false;
  }
*/
if (document.forms["form_prijava"]["email"].value.trim() == "")
  {
    alert("Vaša email adressa je obavezno polje!!!");
    document.getElementById("id_email").focus();
    return false; 
  }
var emailExp = /^[\w\-\.\+]+\@[a-zA-ZАБВГДЂЕЖЗИЈКЛЉМНЊОПРСТЋУФХЦЧЏШабвгдђежзијклљмнњопрстћуфџцчџш0-9\.\-]+\.[a-zA-ZАБВГДЂЕЖЗИЈКЛЉМНЊОПРСТЋУФХЦЧЏШабвгдђежзијклљмнњопрстћуфџцчџш0-9]{2,4}$/; 
if (!document.forms["form_prijava"]["email"].value.match(emailExp))
  {
    alert("Ovo nije važeća email adresa");
    document.getElementById("id_email").focus();
    return false;
  }
}
</script>

</head>

<body bgcolor="#ffffcc">