<?php
	  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(session_id() == '') {
    session_start();
}
   
	   // citanje vrednosti iz sesije
	   $korisnik=$_SESSION["korisnik"];
	   $korisnik_Id=$_SESSION["idkorisnika"]; //id korisnika nam je potreban jer ga prosledjujemo za upis u bp, korisnik je i student
      		
?>
<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" /> 
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<table style="width:100%";style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#D8E7F4">
<tr>
<td style="width:5%;">
</td>

<td align="left">
<br/>
<b><font face="Trebuchet MS" color="darkblue" size="4px">  </font></b>
<table style="width:100%;" bgcolor="#D8E7F4" padding:0" align="center" cellspacing="0" cellpadding="0" border="0">

<tr>
<td style="width:3%;">
</td>
<td align="center">
<font color="#D8E7F4" size="1px">.</font>
</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>
<td align="center">
<b><font face="Trebuchet MS" color="black" size="3px">УНОС НОВЕ ИСПИТНЕ ПРИЈАВЕ применом stored procedure</b></br>
</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>
<td align="center">
<font color="#D8E7F4" size="1px">.</font>
</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>

<td align="center">


<!------------------------FORMA ZA UNOS ---- ACTION="ispitnaprijavasnimiSP.php" --->
<table style="width:50%;" bgcolor="#D8E7F4" padding:0" align="center" cellspacing="0" cellpadding="0" border="0">
<form name="FormaZaUnosIspitnePrijave" action="ispitnaprijavasnimiSP.php" METHOD="POST" enctype="multipart/form-data" >

<tr>
<td align="right" valign="bottom">     
<b><font face="Trebuchet MS" color="black" size="2px">Ознака испита&nbsp;&nbsp;</font></b>
</td>
<td align="left" valign="bottom">
<input name="OznakaIspita" type="text" size="50" placeholder="Унесите ознаку испита"  />
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Презиме и име&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<!--<input name="StudentPrezime" type="text" size="50" placeholder="Унесите презиме"/>---->
<b><?php echo $korisnik ;?></b>
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Датум&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<!-- <input name="StudentIme" type="text" size="50" placeholder="Унесите име"/> -->
<b><?php echo date("d/m/Y") ;?></b>
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Испитни рок&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<select name="IspitniRok" required TABINDEX=7>		
	<option value="">изаберите...</option>
	<?php
		
	// PREDSTAVLJANJE U OPTION KROZ FOR CIKLUS
	if ($UkupanBrojZapisa>0) 
	{					
		for ($brojacRokova = 0; $brojacRokova < $UkupanBrojZapisa; $brojacRokova++) 
			{
				$OznakaRoka =$RokObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisa, $brojacRokova, 0);				
				$NazivRoka=$RokObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisa, $brojacRokova, 1);				
				echo "<option value=\"$OznakaRoka\">$NazivRoka</option>";						
			} //for
										
	} // 
	
	?>
		
</select>


</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Предмет&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<select name="Predmet" required TABINDEX=7>		
	<option value="">изаберите...</option>
	<?php
		
	// PREDSTAVLJANJE U OPTION KROZ FOR CIKLUS
	if ($UkupanBrojZapisaPredmeta>0) 
	{					
		for ($brojacPredmeta = 0; $brojacPredmeta < $UkupanBrojZapisaPredmeta; $brojacPredmeta++) 
			{
				$OznakaPredmeta =$PredmetObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaPredmeta, $brojacPredmeta, 0);				
				$NazivPredmeta=$PredmetObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaPredmeta, $brojacPredmeta, 1);				
				echo "<option value=\"$OznakaPredmeta\">$NazivPredmeta</option>";						
			} //for
										
	} // 
	
	?>
		
</select>


</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Термин&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<select name="Termin" required TABINDEX=7>		
	<option value="">изаберите...</option>
	<option value="1">1</option>
	<option value="2">2</option>
		
</select>


</td>
</tr>


<!-------------------------- prazan red ------->
<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<tr>

<td>       
</td>
<td><input TYPE="submit" name="snimiButton" class="btn btn-primary" value="СНИМИ" TABINDEX=3/>
</td>
</form>
</table>

</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>
<td align="center">
<font color="#D8E7F4" size="1px">.</font>
</td>
<td style="width:3%;">
</td>
</tr>
</table>
</td>

<td style="width:5%;">
</td>

</tr>
</table>
<img src="images/sredinadole.jpg" width="100%" height="5" alt="" class="flt1" /> 
    