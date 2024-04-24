<?php
// OVO JE SUSTINSKO ODJAVLJIVANJE KORISNIKA
	   session_start();
     	   
	   // citanje vrednosti iz sesije
	   $korisnik=$_SESSION["korisnik"];
	   $korisnik_Id=$_SESSION["idkorisnika"]; //id korisnika nam je potreban jer ga prosledjujemo za upis u bp, korisnik je i student
      
	  // ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
				if (!isset($korisnik))
				{
					header ('Location:index.php');
				}	

// REALIZACIJA CITANJA hidden polja za filter radi pristupa, cita sa IspitnaPrijavaLista
$StaraOznakaIspitaZaIzmenu=$_POST['OznakaIspita'];

// KONEKTOVANJE NA BAZU
	require "klase/BaznaKonekcija.php";
	$KonekcijaObject = new Konekcija("klase/BaznaParametriKonekcije.xml");
	$KonekcijaObject->connect();
	$db_handle = $KonekcijaObject->konekcijaMYSQL;
	$bazapodataka=$KonekcijaObject->KompletanNazivBazePodataka;
	$UspehKonekcijeNaBazu=$KonekcijaObject->konekcijaDB;
	
	require "klase/BaznaTabela.php";
	$StariStudent = $korisnik_Id;
	// IZDVAJANJE PODATAKA KORISTECI KLASU SMER
	require "klase/DBRok.php";
	$RokObject = new DBRok($KonekcijaObject, "rok");
	$RokObject->UcitajKolekcijuSvihRokova();
	$KolekcijaZapisa= $RokObject->Kolekcija;
	$UkupanBrojZapisa= $RokObject->BrojZapisa;

	require "klase/DBPredmet.php";
	$PredmetObject = new DBPredmet($KonekcijaObject, "predmet");
	$PredmetObject->UcitajKolekcijuSvihPredmeta();
	$KolekcijaZapisa= $PredmetObject->Kolekcija;
	$UkupanBrojZapisa= $PredmetObject->BrojZapisa;

	require "klase/DBKorisnik.php";

	// PREUZIMANJE STARIH VREDNOSTI ZA IZABRANOG STUDENTA
	require "klase/DBIspitnaPrijava.php";
	$IspitObject = new DBIspitnaPrijava($KonekcijaObject, 'ispitna prijava');
	$IspitObject->UcitajIspituPrijavuPoOznaci($StaraOznakaIspitaZaIzmenu);
	$KolekcijaZapisaIspita= $IspitObject->Kolekcija;
	$UkupanBrojZapisaIspita = $IspitObject->BrojZapisa;
	
	if ($UkupanBrojZapisaIspita>0) 
	{
		$row=0;  // prvi i jedini red ima taj id
		$StaraOznakaIspita=$IspitObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaIspita, $row, 0);//mysql_result($result,$row,"REGISTARSKIBROJ");
		$StariStudent=$IspitObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaIspita, $row, 1);
		//$StaroIme=$IspitObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaIspita, $row, 2);
		$StaraOznakaRoka=$IspitObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaIspita, $row, 2);
		$StaraOznakaPredmeta=$IspitObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaIspita, $row, 3);
		$StariTermin=$IspitObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaIspita, $row, 4);
	}         

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="sr-RS" xml:lang="sr-RS">
<meta charset="UTF-8">
<head>
<title>ТФ М Пупин Зрењанин</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
<script src="JavaScript/provera.js"> </script>
</head>
<body>

<!-----VELIKA TABELA KOJA SADRZI SVE---->
<!-----10% SADRZAJ 10%---->
<table class="no-spacing" style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0;">

<!-------------------------- ZAGLAVLJE ------->
<?php include 'delovi/zaglavljewelcome.php';?>


<!-------------------------- DONJI DEO  ------->
<tr style="padding:0px;">

<!-----LEVO PRAZNINA---->
<td style="width:10%;">
</td>

<!------------------------------------------------------------------------------------------->
<!---------------------- SREDINA DONJEG DELA SA SADRZAJEM pocinje ovde ---------------------->
<td align="center" valign="middle" style="width:80%; padding:0" > 

<table style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#003366">

<tr>
<td style="width:1%;">
</td>

<td style="width:15%;padding:0" cellspacing="0" cellpadding="0" border="0" valign="top">
<?php include 'delovi/menilevoadmin.php';?>
</td>

<td style="width:1%;">
</td>

<td style="width:80%;padding:0" cellspacing="0" cellpadding="0" border="0" valign="top">
<!------- GLAVNI SADRZAJ desno ----------->  
<?php include 'delovi/desnoStudentIzmeniForm.php';?>
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
<?php include 'delovi/footer.php';?>

</table>

</body>
</html>