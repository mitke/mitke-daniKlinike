<!DOCTYPE html>
<head>
   <meta content="text/html; charset=UTF-8" />
   <title>Dani Klinike 2022</title>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">
</style>
<script language="javascript">

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

function provera() {
if (document.forms["form_prijava"]["ime"].value.trim() == "" 
	|| document.forms["form_prijava"]["prezime"].value.trim() == "" 
	|| document.forms["form_prijava"]["licenca"].value.trim() == ""
	|| document.forms["form_prijava"]["ustanova"].value.trim() == ""
	|| document.forms["form_prijava"]["adresa"].value.trim() == ""  
	|| document.forms["form_prijava"]["telefon"].value.trim() == ""  
	|| document.forms["form_prijava"]["email"].value.trim() == "") {
  alert("Niste uneli obavezna polja!!!");
  return false;
  }

}
</script>

</head>

<body bgcolor="#ffffcc">


