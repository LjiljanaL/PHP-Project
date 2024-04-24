<?php
class DBRasporedIspita extends Tabela
{
    /*klasa sluzi za rad sa podacima vezanim za tabelu raspored ispita
    podaci tabele raspored ispita su vec uneti u bazu podataka i koriste se prilikom provere poslovne logike*/
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
public $ID; //auto-increment
public $DatumPrviTermin; 
public $DatumDrugiTermin;
public $Rok;
public $Predmet;

// METODE

// konstruktor
//metoda sluzi za ucitavanje podataka iz tabele koristeci odredjene parametre kao sto su predmet i rok
public function UcitajKolekcijuSvihDatuma($Rok, $Predmet)
{
$SQL = "select `DatumPrviTermin`, `DatumDrugiTermin` from `raspored ispita` where `rok` = '".$Rok."' and `predmet` = '".$Predmet."'";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
//return $this->Kolekcija; // uzima iz baznek klase vrednost atributa
}

}
?>