<?php
session_start();

$OznakaIspitaZaStampu=$_POST['OznakaIspitaFilter'];

// KONEKTOVANJE NA BAZU
	require "klase/BaznaKonekcija.php";
	$KonekcijaObject = new Konekcija("klase/BaznaParametriKonekcije.xml");
	$KonekcijaObject->connect();
	
	// PREUZIMANJE STARIH VREDNOSTI ZA IZABRANOG STUDENTA
	require "klase/BaznaTabela.php";
	require "klase/DBIspitnaPrijavaV.php";
	$IspitObject = new DBIspitnaPrijava($KonekcijaObject, 'ispitna prijava');
	$IspitObject->DajSvePodatkeOIspitima($OznakaIspitaZaStampu);
	$KolekcijaZapisaIspita= $IspitObject->Kolekcija;
	$UkupanBrojZapisaIspita = $IspitObject->BrojZapisa;
	
	if ($UkupanBrojZapisaIspita>0) 
	{
		$row=0;  // prvi i jedini red ima taj id
		$OznakaIspita=$IspitObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaIspita, $row, 0);//mysql_result($result,$row,"REGISTARSKIBROJ");
		$StudentPrezime=$IspitObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaIspita, $row, 1);
		$StudentIme=$IspitObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaIspita, $row, 2);
		$IspitniRok=$IspitObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaIspita, $row, 3);
		$Predmet=$IspitObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaIspita, $row, 4);
		$Termin=$IspitObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaIspita, $row, 5);

	}         

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="sr-RS" xml:lang="sr-RS">
<meta charset="UTF-8">
<head>
<title>ТФ М Пупин</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
</head>
<body>

<!-----VELIKA TABELA KOJA SADRZI SVE---->
<!-----10% SADRZAJ 10%---->
<table class="no-spacing" style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0;">

<!-------------------------- ZAGLAVLJE ------->
<?php include 'delovi/zaglavljestampa.php';?>


<!-------------------------- DONJI DEO  ------->
<tr style="padding:0px;">

<!-----LEVO PRAZNINA---->
<td style="width:10%;">
</td>

<!------------------------------------------------------------------------------------------->
<!---------------------- SREDINA DONJEG DELA SA SADRZAJEM pocinje ovde ---------------------->
<td align="center" valign="middle" style="width:80%; padding:0" > 

<table style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">

<tr>
<td style="width:1%;">
</td>

<td style="width:80%;padding:0" cellspacing="0" cellpadding="0" border="0" valign="top">
<!------- GLAVNI SADRZAJ desno ----------->  
<?php include 'delovi/desnostampaoispitnojprijavi.php';?>
</td>

<td style="width:1%;">
</td>

</tr>
</table>

</td>
<!---------------------- SADRZAJ zavrsava ovde ---------------------->

<!-----DESNO PRAZNINA---->
<td style="width:10%;">
</td>

</tr>
<!---------------------- DONJI DEO zavrsava ovde ---------------------->


<tr style="padding:0px;">
<td style="width:10%;"></td>
<td align="center" valign="middle"></td>
<td style="width:10%;"></td>
</tr>
<!--- DONJI DEO sa donjom ivicom zavrsava ovde  ------->
<!-- footer panel starts here -->
<?php include 'delovi/footerstampa.php';?>

</table>

</body>
</html>