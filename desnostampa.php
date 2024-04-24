
<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" /> 

<table style="width:100%";style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#D8E7F4">

<tr>
<td style="width:5%;">
</td>

<td align="center" valign="middle"> 
<font face="Trebuchet MS" color="darkblue" size="5px">
<b>СПИСАК ИСПИТНИХ ПРИЈАВА</br> </font>


</td>

<td style="width:5%;">
</td>
</tr>


<tr>
<td style="width:5%;">
</td>

<td align="left">
<br/>
<font face="Trebuchet MS" color="darkblue" size="4px">

<?php

// PRETHODNI KOD PREUZIMA PODATKE I TO JE NA INDEX.PHP

if ($IspitnaPrijavaViewObject->BrojZapisa==0)
{
	echo "НЕМА ЗАПИСА У ТАБЕЛИ!";
}
else
{
	// ------------ zaglavlje ----------------
	echo "<table style=\"width:90%; padding:0\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\"  bgcolor=\"#D8E7F4\">";
	echo "<tr>";
	echo "<td style=\"width:10%;\">";
	echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ОЗНАКА ИСПИТА</font><br/>";
	echo "</td>";
	echo "<td style=\"width:20%;\">";
	echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ПРЕЗИМЕ</font><br/>";
	echo "</td>";
	echo "<td style=\"width:20%;\">";
	echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ИМЕ</font><br/>";
	echo "</td>";
	echo "<td style=\"width:50%;\">";
	echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ИСПИТНИ РОК</font><br/>";
	echo "</td>";
	echo "<td style=\"width:50%;\">";
	echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ПРЕДМЕТ</font><br/>";
	echo "</td>";
	echo "<td style=\"width:50%;\">";
	echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ТЕРМИН</font><br/>";
	echo "</td>";
	echo "</tr>";

	for ($RBZapisa = 0; $RBZapisa < $IspitnaPrijavaViewObject->BrojZapisa; $RBZapisa++) 
	{
						
	// CITANJE VREDNOSTI IZ MEMORIJSKE KOLEKCIJE $RESULT I DODELJIVANJE PROMENLJIVIM
	$OznakaIspita=$IspitnaPrijavaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($IspitnaPrijavaViewObject->Kolekcija, $RBZapisa, 0);//mysql_result($result,$row,"REGISTARSKIBROJ");
	$StudentPrezime=$IspitnaPrijavaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($IspitnaPrijavaViewObject->Kolekcija, $RBZapisa, 1);
	$StudentIme=$IspitnaPrijavaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($IspitnaPrijavaViewObject->Kolekcija, $RBZapisa, 2);
	$IspitniRok=$IspitnaPrijavaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($IspitnaPrijavaViewObject->Kolekcija, $RBZapisa, 3);
	$Predmet=$IspitnaPrijavaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($IspitnaPrijavaViewObject->Kolekcija, $RBZapisa, 4);
	$Termin=$IspitnaPrijavaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($IspitnaPrijavaViewObject->Kolekcija, $RBZapisa, 5);

	// CRTANJE REDA TABELE SA PODACIMA
	echo "<tr>";
	echo "<td>";
	echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$OznakaIspita</font><br/>";
	echo "</td>";
	echo "<td>";
	echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$StudentIme</font><br/>";
	echo "</td>";
	echo "<td>";
	echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$StudentPrezime</font><br/>";
	echo "</td>";
	echo "<td>";
	echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Predmet</font><br/>";
	echo "</td>";
	echo "<td>";
	echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$IspitniRok</font><br/>";
	echo "</td>";
	echo "<td>";
	echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Termin</font><br/>";
	echo "</td>";
	echo "</tr>";

	}  //za for 
	echo "</table>";
	echo "<br/>";
	echo "<br/>";
	echo "УКУПАН БРОЈ ЗАПИСА:".$IspitnaPrijavaViewObject->BrojZapisa;
}
$KonekcijaObject->disconnect();

?>



</td>

<td style="width:5%;">
</td>

</tr>
</table>

    