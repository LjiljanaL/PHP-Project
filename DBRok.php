<?php
class DBRok extends Tabela 
{
	/*klasa sluzi za rad sa podacima vezanim za tabelu rok
    podaci tabele rok su vec uneti u bazu podataka pa se isti prikazuju na korisnickom interfejsu
    koristeci combo box, odakle se citaju podaci iz baze i prosledjuju prilikom kreiranja insert into upita*/
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
public $OznakaRoka;
public $NazivRoka; 
public $UkupanBrojStudenata;

// METODE

// konstruktor
//metoda sluzi za citanje podataka iz baze
public function UcitajKolekcijuSvihRokova()
{
$SQL = "select * from `Rok` ORDER BY NazivRoka ASC";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
//return $this->Kolekcija; // uzima iz baznek klase vrednost atributa
}
//metoda sluzi za rad sa transakcijom prilikom upisa u bazu, u bazi se prilikom upisa ispitne prijave povecava br studenata u tabeli rok za 1
public function InkrementirajBrojStudenata($IDRok)
{
	//radi transakcije prilikom upisa u bazu
	// izdvajanje stare vrednosti broja vozila za taj tip
	//$SQL = "select UkupanBrojStudenata from `".$this->bazapodataka."`.`smer` WHERE Oznaka=".$IDSmer;
	$KriterijumFiltriranja="OznakaRoka='".$IDRok."'";
	$StaraVrednostUkBrStudenata=$this->DajVrednostJednogPoljaPrvogZapisa ('UkupanBrojStudenata', $KriterijumFiltriranja, 'UkupanBrojStudenata'); 
	
	// izracunavanje nove vrednosti
	$NovaVrednostUkBrStudenata=$StaraVrednostUkBrStudenata + 1;
	
	// izvrsavanje izmene
    $SQL = "UPDATE `".$this->NazivBazePodataka."`.`rok` SET UkupanBrojStudenata=".$NovaVrednostUkBrStudenata." WHERE OznakaRoka='".$IDRok."'";
	$greska= $this->IzvrsiAktivanSQLUpit($SQL);

	return $greska;
	
	}

}
?>