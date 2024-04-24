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
	   
	   // preuzimanje vrednosti sa forme
	   $OznakaIspita=$_POST['OznakaIspita'];
	   $Student=$korisnik_Id;
	 //  $StudentIme=$_POST['StudentIme'];
	   $IspitniRok=$_POST['IspitniRok'];
	   $Predmet=$_POST['Predmet'];
	   $Termin=$_POST['Termin'];
	   
	   //KONEKCIJA KA SERVERU
	
// koristimo klasu za poziv procedure za konekciju
	require "klase/BaznaKonekcija.php";
	require "klase/BaznaTabela.php";
	$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
	$KonekcijaObject->connect();
	if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
    {	
		//echo "USPESNA KONEKCIJA";
		require "klase/BaznaTransakcija.php";
		$TransakcijaObject = new Transakcija($KonekcijaObject);
		$TransakcijaObject->ZapocniTransakciju();
		
		require "klase/DBIspitnaPrijavaSP.php";
		$IspitObject = new DBIspitnaPrijava($KonekcijaObject, 'ispitna prijava');
		$IspitObject->OznakaIspita=$OznakaIspita;
		$IspitObject->Student=$Student;
		$IspitObject->IspitniRok=$IspitniRok;
		$IspitObject->Predmet=$Predmet;
		$IspitObject->Termin=$Termin;
		$greska1=$IspitObject->DodajNovuIspitnuPrijavu();
		
		// inkrement broja studenata kroz klasu DBSmer
		require "klase/DBRok.php";
		$RokObject = new DBRok($KonekcijaObject, 'rok');
		$greska2=$RokObject->InkrementirajBrojStudenata($IspitniRok);
		
		// zatvaranje transakcije
		//$UtvrdjenaGreska=$greska1 or $greska2;
		$UtvrdjenaGreska=$greska1.$greska2;
		$TransakcijaObject->ZavrsiTransakciju($UtvrdjenaGreska);
        	
		} // od if db selected

      // ZATVARANJE KONEKCIJE KA DBMS
	  $KonekcijaObject->disconnect();
	
	// prikaz uspeha aktivnosti	
	
	if ($UtvrdjenaGreska) {
	echo "Greska $UtvrdjenaGreska";	
     }	
	 else
	 {
		//echo "Snimljeno!";	
		header ('Location:IspitnaPrijavaLista.php');		
	 }
		
	  
      ?>

