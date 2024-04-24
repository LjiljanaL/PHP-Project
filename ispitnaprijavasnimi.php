 <?php
        
		session_start();  
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   $korisnik=$_SESSION["korisnik"];
	   $korisnik_Id=$_SESSION["idkorisnika"];  //id korisnika nam je potreban jer ga prosledjujemo za upis u bp, korisnik je i student
      
	  // ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
			if (!isset($korisnik))
			{
					header ('Location:index.php');
				}	
	   
	   
	      // -------------------------------------
	   
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
		// provera poslovne logike
		require "klase/PrijavaIspita.php";
		$PrijavaIspitaObject = new PrijavaIspita($KonekcijaObject, 'raspored ispita');
		$dozvoljenaPrijavaIspita=$PrijavaIspitaObject->DaLiJeAdekvatanDatumPrijave($IspitniRok, $Predmet, $Termin);
			//echo "odgovarajuci datum prijavljivanja".$dozvoljenaPrijavaIspita;
		if ($dozvoljenaPrijavaIspita=="DA")
			{
				//echo "USPESNA KONEKCIJA";
				require "klase/BaznaTransakcija.php";
				$TransakcijaObject = new Transakcija($KonekcijaObject);
				$TransakcijaObject->ZapocniTransakciju();
				
				require "klase/DBIspitnaPrijava.php";
				$IspitObject = new DBIspitnaPrijava($KonekcijaObject, 'ispitna prijava');
				$IspitObject->OznakaIspita=$OznakaIspita;
				$IspitObject->Student=$Student;
			//	$IspitObject->StudentIme=$StudentIme;
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
			}
			else
			{
				$UtvrdjenaGreska="Не можете пријавити испит после датума и термина одржавања испита!";
			}
        	
		} // od if db selected

      // ZATVARANJE KONEKCIJE KA DBMS
	  $KonekcijaObject->disconnect();
	
	// prikaz uspeha aktivnosti	
	
	if ($UtvrdjenaGreska!=null) {
	echo "Грешка: $UtvrdjenaGreska";	
     }	
	 else
	 {
		//echo "Snimljeno!";	
		header ('Location:IspitnaPrijavaLista.php');	
	 }
		
	  
      ?>

