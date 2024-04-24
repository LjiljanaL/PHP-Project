<?php
class DBIspitnaPrijava extends Tabela 
{
	//klasa sluzi za rad sa podacima vezanim za tabelu ispitna prijava
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
public $OznakaIspita;
public $Student; //student je i korisnik pa prosledjujemo samo njegov ID za upis u bazu
public $IspitniRok; //prosledjujemo id jer je ispitni rok posebna tabela
public $Predmet; //prosledjujemo id jer je predmet posebna tabela
public $Termin;

// METODE

// konstruktor
//metoda sluzi za tabelarni prikaz svih ispitnih prijava
public function DajKolekcijuSvihIspitnihPrijava()
{
$SQL = "select * from `ispitna prijava` ORDER BY Student ASC";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
return $this->Kolekcija; // uzima iz bazne klase vrednost atributa
}
//metoda sluzi za prikaz ispitne prijave po odredjenom parametru prilikom filtriranja
public function UcitajIspituPrijavuPoOznaci($OznakaIspitaParametar)
{
$SQL = "select * from `ispitna prijava` where `OznakaIspita`='".$OznakaIspitaParametar."'";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
// raspolazemo sa:
// $Kolekcija;
//  $BrojZapisa;
}
//metoda za dodavanje nove ispitne prijave koriscenjem insert into upita i prosledjivanjem podataka sa korisnicke forme
public function DodajNovuIspitnuPrijavu()
{
	$SQL = "INSERT INTO `ispitna prijava` (OznakaIspita, Student, IspitniRok, Predmet, Termin) VALUES ('$this->OznakaIspita','$this->Student', '$this->IspitniRok', '$this->Predmet', '$this->Termin')";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}

//metoda za brisanje ispitne prijave koriscenjem delete from upita i prosledjivanjem podataka sa korisnicke forme
public function ObrisiIspitnuPrijavu($IdZaBrisanje)
{
	$SQL = "DELETE FROM `ispitna prijava` WHERE OznakaIspita='".$IdZaBrisanje."'";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}

//metoda za izmenu ispitne prijave koriscenjem update upita i prosledjivanjem podataka sa korisnicke forme
public function IzmeniIspitnuPrijavu($StaraOznakaIspita, $OznakaIspita, $Student, $IspitniRok, $Predmet, $Termin)
{
	$SQL = "UPDATE `ispitna prijava` SET OznakaIspita='".$OznakaIspita."', Student='".$Student."', IspitniRok='".$IspitniRok."', Predmet='".$Predmet."', Termin='".$Termin."' WHERE OznakaIspita='".$StaraOznakaIspita."'";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}


}
?>