 <?php
        
		session_start();  
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   $korisnik=$_SESSION["korisnik"];
	   $korisnik_Id=$_SESSION["idkorisnika"]; //id korisnika nam je potreban jer ga prosledjujemo za upis u bp, korisnik je i student
      
	  // ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
				if (!isset($korisnik))
				{
					header ('Location:index.php');
				}	
	   

	      // -------------------------------------

	   // preuzimanje vrednosti sa forme
	   $OznakaIspita=$_POST['OznakaIspita'];
	   $StaraOznakaIspita=$_POST['StaraOznakaIspita'];
	   $Student=$_POST['idkorisnika'];
	   $Termin=$_POST['Termin'];
	   //  $StudentIme=$_POST['StudentIme'];

	   if (isset($_POST['OznakaRoka']))
	   {
		$OznakaRoka=$_POST['OznakaRoka'];
	   }
	   else // ako nije nista promenjeno
	   {
		$StaraOznakaRoka=$_POST['StaraOznakaRoka'];
		$OznakaRoka=$StaraOznakaRoka;
	   }

	   if (isset($_POST['OznakaPredmeta']))
	   {
		$OznakaPredmeta=$_POST['OznakaPredmeta'];
	   }
	   else // ako nije nista promenjeno
	   {
		$StaraOznakaPredmeta=$_POST['StaraOznakaPredmeta'];
		$OznakaPredmeta=$StaraOznakaPredmeta;
	   }

	//    if (isset($_POST['ID']))
	//    {
	// 	$ID=$_POST['ID'];
	//    }
	//    else // ako nije nista promenjeno
	//    {
	// 	$StariID=$_POST['StariID'];
	// 	$ID=$StariID;
	//    }
	  
	   // koristimo klasu za poziv procedure za konekciju
		require "klase/BaznaKonekcija.php";
		require "klase/BaznaTabela.php";
		$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
		$KonekcijaObject->connect();
		if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
		{	
			require "klase/DBIspitnaPrijava.php";
			$IspitObject = new DBIspitnaPrijava($KonekcijaObject, 'ispitna prijava');
			$greska=$IspitObject->IzmeniIspitnuPrijavu($StaraOznakaIspita, $OznakaIspita, $Student, $OznakaRoka, $OznakaPredmeta, $Termin);
		}
		else
		{
			echo "Nije uspostavljena konekcija ka bazi podataka!";
		}
		
    $KonekcijaObject->disconnect();
	   
	// prikaz uspeha aktivnosti	
	//echo "Ukupno procesirano $retval zapisa";
	//echo "Greska $greska";	

	header ('Location:IspitnaPrijavaLista.php');	
		
	  
      ?>

