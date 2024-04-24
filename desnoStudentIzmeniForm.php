
<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" /> 

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
<b><font face="Trebuchet MS" color="black" size="3px">ИЗМЕНА ПОДАТАКА ИСПИТНЕ ПРИЈАВЕ</b></br>
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


<!------------------------FORMA ZA UNOS ---- ACTION="studentsnimi.php" --->
<table style="width:50%;" bgcolor="#D8E7F4" padding:0" align="center" cellspacing="0" cellpadding="0" border="0">
<form name="FormaZaUnosIspitnePrijave" action="ispitnaPrijavaIzmeni.php" METHOD="POST" enctype="multipart/form-data" >

<tr>
<td align="right" valign="bottom">     
<b><font face="Trebuchet MS" color="black" size="2px">Ознака испита&nbsp;&nbsp;</font></b>
</td>
<td align="left" valign="bottom">
<input name="OznakaIspita" type="text" size="50" value="<?php echo $StaraOznakaIspita; ?>"  />
<input type="hidden" name="StaraOznakaIspita" value="<?php echo $StaraOznakaIspita; ?>">

</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>
<!--
<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Презиме и име&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="Student" type="text" size="50" value="<?php echo $korisnik; ?>"/>
</td>
</tr> ---->

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

<!-- <tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Име&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="StudentIme" type="text" size="50" value="<?php echo $StaroStudentIme; ?>"/>
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr> -->

<tr>
<td align="right" valign="top">
<b><font face="Trebuchet MS" color="black" size="2px">Испитни рок&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<select name="OznakaRoka" required TABINDEX=7>		
	<option value="">изаберите...</option>
	<?php
	// upis vrednosti iz bp - Tip vozila
		
	// PREDSTAVLJANJE U OPTION KROZ FOR CIKLUS
	if ($UkupanBrojZapisa>0) 
	{					
		for ($brojacRoka = 0; $brojacRoka < $UkupanBrojZapisa; $brojacRoka++) 
			{
				$OznakaRoka =$RokObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisa, $brojacRoka, 0);				
				$NazivRoka=$RokObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisa, $brojacRoka, 1);				
				echo "<option value=\"$OznakaRoka\">$NazivRoka</option>";						
			} //for
										
	} // 
	
	?>
		
</select>
<br/>
<font face="Trebuchet MS" color="black" size="2px">Стари испитни рок: <?php echo $StaraOznakaRoka; ?></font>
<input type="hidden" name="StaraOznakaRoka" value="<?php echo $StaraOznakaRoka; ?>">

</td>
</tr>

<tr>
<td align="right" valign="top">
<b><font face="Trebuchet MS" color="black" size="2px">Предмет&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<select name="OznakaPredmeta" required TABINDEX=7>		
	<option value="">изаберите...</option>
	<?php
	// upis vrednosti iz bp - Tip vozila
		
	// PREDSTAVLJANJE U OPTION KROZ FOR CIKLUS
	if ($UkupanBrojZapisa>0) 
	{					
		for ($brojacPredmeta = 0; $brojacPredmeta < $UkupanBrojZapisa; $brojacPredmeta++) 
			{
				$OznakaPredmeta =$PredmetObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisa, $brojacPredmeta, 0);				
				$NazivPredmeta=$PredmetObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisa, $brojacPredmeta, 1);				
				echo "<option value=\"$OznakaPredmeta\">$NazivPredmeta</option>";						
			} //for
										
	} // 
	
	?>
		
</select>
<br/>
<font face="Trebuchet MS" color="black" size="2px">Стари предмет: <?php echo $StaraOznakaPredmeta; ?></font>
<input type="hidden" name="StaraOznakaPredmeta" value="<?php echo $StaraOznakaPredmeta; ?>">

</td>
</tr>

<tr>
<td align="right" valign="top">
<b><font face="Trebuchet MS" color="black" size="2px">Термин&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<select name="Termin" required TABINDEX=7>		
	<option value="">изаберите...</option>
	<option value="1">1</option>
	<option value="2">2</option>
</select>
<br/>
<font face="Trebuchet MS" color="black" size="2px">Стари термин: <?php echo $StariTermin; ?></font>
<input type="hidden" name="StariTermin" value="<?php echo $StariTermin; ?>">

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
<td><input TYPE="submit" name="snimiButton" value="СНИМИ ИЗМЕНУ" TABINDEX=3/>
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
    