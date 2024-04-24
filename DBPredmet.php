<?php
class DBPredmet extends Tabela 
{
    /*klasa sluzi za rad sa podacima vezanim za tabelu predmet
    podaci tabele predmet su vec uneti u bazu podataka pa se isti prikazuju na korisnickom interfejsu
    koristeci combo box, odakle se citaju podaci iz baze i prosledjuju prilikom kreiranja insert into upita*/

// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
public $OznakaPredmeta;
public $NazivPredmeta; 
public $Rok;

// METODE

// konstruktor
//metoda sluzi za citanje podataka iz baze
public function UcitajKolekcijuSvihPredmeta()
{
$SQL = "select * from `Predmet` ORDER BY NazivPredmeta ASC";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
//return $this->Kolekcija; // uzima iz baznek klase vrednost atributa
}

}
?>