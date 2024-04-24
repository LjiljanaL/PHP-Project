<?php
class DBIspitnaPrijava extends Tabela 
{
	//klasa za rad sa stored procedurom za snimanje nove ispitne prijave
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
public $OznakaIspita;
public $Student; //student je i korisnik pa prosledjujemo samo njegov ID za upis u bazu
//public $StudentIme;
public $IspitniRok; //prosledjujemo id jer je ispitni rok posebna tabela
public $Predmet; //prosledjujemo id jer je predmet posebna tabela
public $Termin;

// METODE

// konstruktor
//metoda koja vrsi upis u bazu podataka uz pomoc stored procedure
public function DodajNovuIspitnuPrijavu()
{
	//$SQL = "INSERT INTO `student` (BrojIndeksa, Prezime, Ime, OznakaSmera, NazivFajlaFotografije) VALUES ('$this->BrojIndeksa','$this->Prezime', '$this->Ime', '$this->OznakaSmera', '$this->NazivFajlaFotografije')";
	//$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	//parametri za stored proceduru koji se preuzimaju sa korisnickog interfejsa
		$GreskarezultatPar1 = $this->IzvrsiAktivanSQLUpit ("SET @OznakaIspitaParametar='".$this->OznakaIspita."'");
		
		$GreskarezultatPar2 = $this->IzvrsiAktivanSQLUpit ("SET @StudentParametar='".$this->Student."'");
		
	//	$GreskarezultatPar3 =  $this->IzvrsiAktivanSQLUpit ("SET @StudentImeParametar='".$this->StudentIme."'");
		
		$GreskarezultatPar3 = $this->IzvrsiAktivanSQLUpit (  "SET @IspitniRokParametar='".$this->IspitniRok."'");
		
		$GreskarezultatPar4 = $this->IzvrsiAktivanSQLUpit (  "SET @PredmetParametar='".$this->Predmet."'");

		$GreskarezultatPar5 = $this->IzvrsiAktivanSQLUpit (  "SET @TerminParametar='".$this->Termin."'");
		
		$GreskarezultatCall = $this->IzvrsiAktivanSQLUpit ( "CALL `DodajIspitnuPrijavu`(@OznakaIspitaParametar,@StudentParametar,@IspitniRokParametar,@PredmetParametar,@TerminParametar);");
		
	
	$greska=$GreskarezultatPar1.$GreskarezultatPar2.$GreskarezultatPar3.$GreskarezultatPar4.$GreskarezultatPar5.$GreskarezultatCall;
	return $greska;
}


}
?>