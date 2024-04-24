 <?php
        
		session_start();  
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   $korisnik=$_SESSION["korisnik"];
      
	  // ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
				if (!isset($korisnik))
				{
					header ('Location:index.php');
				}	
	   
	   // preuzimanje vrednosti sa forme
	   $IdZaBrisanje=$_POST['OznakaIspita'];
	   
      // koristimo klasu za poziv procedure za konekciju
	require "klase/BaznaKonekcija.php";
	require "klase/BaznaTabela.php";
	$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
	$KonekcijaObject->connect();
	if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
    {	
		require "klase/DBIspitnaPrijava.php";
		$IspitObject = new DBIspitnaPrijava($KonekcijaObject, 'ispitna prijava');
		$greska=$IspitObject->ObrisiIspitnuPrijavu($IdZaBrisanje);
	}
		
    $KonekcijaObject->disconnect();
	
	// prikaz uspeha aktivnosti	
	//echo "Ukupno procesirano $retval zapisa";
	//echo "Greska $greska";	

	header ('Location:IspitnaPrijavaLista.php');	
		
	  
      ?>

