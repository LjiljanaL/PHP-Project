<?php
class DBIspitnaPrijava extends Tabela 
{
	//klasa za rad sa pogledom

// METODE

// konstruktor
//metoda za rad sa pogledom
public function DajSvePodatkeOIspitima($filterParametar)
{
	if (isset($filterParametar))
	{
		// nad pogledom se moze dodati filter, jer se pogled koristi kao da je tabela
		$upit="select * from `".$this->NazivBazePodataka."`.`SviPodacioIspitnimPrijavama` where `OznakaIspita`='".$filterParametar."'";
	}
	else
	{
		$upit="select * from `".$this->NazivBazePodataka."`.`SviPodacioIspitnimPrijavama`";
	}
	$this->UcitajSvePoUpitu($upit);
	// sada raspolazemo sa:
	//$this->Kolekcija 
	//$this->BrojZapisa
}


}
?>