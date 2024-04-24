<?php 
class PrijavaIspita extends Tabela
{
  //klasa poslovne logike
    //atributi
    private $bazapodataka;
    private $UspehKonekcijeNaDBMS;
    
    //metode

    public function DaLiJeAdekvatanDatumPrijave($IspitniRokParametar, $PredmetParametar, $Termin)
    {
        //smatra se ispravnim datumom prijavljivanja ispit ukoliko je manji od datuma odrzavanja ispita u odredjenom isptinom roku i terminu
        $odgovor = "NE";
        //generisani danasnji datum, identican sa korisnikim interfejsom, u korisnickom interfejsu se koristi drugaciji format datuma
       // $DanasnjiDatum = new DateTime("now");
        $DanasnjiDatum = date("Y-m-d"); //mora ovakav format zbog strtotime funkcije radi pretvaranja i kasnijeg uporedjivanja sa podacima iz bp
        $datum = strtotime($DanasnjiDatum); //pretvaranje stringa u datetime format za uporedjivanje datuma
        
      //izdvajanje podataka iz tabele raspored ispita
        $Polje1Termin = "`DatumPrviTermin`";
        $KriterijumFiltriranja1 = "`Rok`='".$IspitniRokParametar."' AND `Predmet`='".$PredmetParametar."'";
        $KriterijumSortiranja1 = "`ID`";
        $DatumIspitaPrviTermin=$this->DajVrednostJednogPoljaPrvogZapisa($Polje1Termin, $KriterijumFiltriranja1, $KriterijumSortiranja1);
       $datum1 = strtotime($DatumIspitaPrviTermin);

        $Polje2Termin = "`DatumDrugiTermin`";
        $KriterijumFiltriranja2 = "`Rok`='".$IspitniRokParametar."' AND `Predmet`='".$PredmetParametar."'";
        $KriterijumSortiranja2 = "`ID`";
        $DatumIspitaDrugiTermin=$this->DajVrednostJednogPoljaPrvogZapisa($Polje2Termin, $KriterijumFiltriranja2, $KriterijumSortiranja2);
        $datum2 = strtotime($DatumIspitaDrugiTermin);

        /*$TrazenoPolje = "`Termin`";
        $KriterijumFiltriranja="`IspitniRok`='".$IspitniRokParametar."' AND `Predmet`='".$PredmetParametar."'";
        $KriterijumSortiranja = "`OznakaIspita`";

        $Termin=$this->UcitajPoljaFiltrirano($TrazenoPolje, $KriterijumFiltriranja, $KriterijumSortiranja);*/
      /*  echo "termin za parametar: ".$Termin;
        echo "<br>";
      // echo "danasnji datum: ".$DanasnjiDatum;
      //echo date('d/m/Y');
        //echo date("d/m/Y \n", $datum1);
        //echo date("d/m/Y \n", $datum2);
        echo $DanasnjiDatum;
        echo "<br>";
        echo $datum;
        echo "<br>";
        echo $DatumIspitaPrviTermin;
        echo "<br>";
        echo $datum1;
        echo "<br>";
        echo $DatumIspitaDrugiTermin;
        echo "<br>";
        echo $datum2;
        echo "<br>";*/
      //$razlika = $DanasnjiDatum->diff($DatumIspitaPrviTermin);
     //  echo "razlika izmedju danasnjeg datuma i datuma prvi termin".$razlika;
   /*  var_dump(($datum) > ($datum1));
     var_dump(($datum) == ($datum1));
     var_dump(($datum) < ($datum1));*/

    /* if($Termin = "1" &&( ($datum) < ($datum1)))
     {
        echo "yes";
     }
     else
     {
        echo "no";
     }*/
     //provera da li je ispravan datum za odredjeni termin
        if($Termin = "1" && ($DanasnjiDatum < $DatumIspitaPrviTermin))
        {
            $odgovor = "DA";
        }
        else
        {
            $odgovor = "NE";
        }

        if($Termin = "2" && ($DanasnjiDatum < $DatumIspitaDrugiTermin))
        {
            $odgovor = "DA";
        }
        else
        {
            $odgovor = "NE";
        }
        return $odgovor;
    }
}
?>