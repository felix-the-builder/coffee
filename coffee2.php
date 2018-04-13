<!DOCTYPE html>
<meta charset="utf-8">
<style>
table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 10%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 12px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}


table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 10px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}
table.blueTable tfoot td {
  font-size: 10px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}

</style>


<?php
require ('filerw.php');
$filename = "./coffee-schedule";
$daten=rfcron($filename);
?>


<h1>Coffee Control</h1>
<table class="blueTable">
<thead>
<tr>
<th>Tag</th>
<th>Start Stunde</th>
<th>Start Minute</th>
<th>Stop Stunde</th>
<th>Stop Minute</th>
</tr>
</thead>
<tfoot>
<tr>
<td colspan="5">
</td>
</tr>
</tfoot>
<tbody>
<tr>
<td>Montag</td>
<td>
<form id=Start-h-Mo>
	<input name="start-h-MO" type="number" value=<?php echo $daten[0]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Start-m-Mo>
	<input name="start-m-MO" type="number" value=<?php echo $daten[1]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-h-Mo>
	<input name="stop-h-MO" type="number" value=<?php echo $daten[2]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-m-Mo>
	<input name="stop-m-MO" type="number" value=<?php echo $daten[3]; ?> /> <br /> 
</form>
</td>
</tr>
<tr>
<td>Dienstag</td>
<td>
<form id=Start-h-Di>
	<input name="start-h-DI" type="number" value=<?php echo $daten[4]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Start-m-Di>
	<input name="start-m-DI" type="number" value=<?php echo $daten[5]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-h-Di>
	<input name="stop-h-DI" type="number" value=<?php echo $daten[6]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-m-Di>
	<input name="stop-m-DI" type="number" value=<?php echo $daten[7]; ?> /> <br /> 
</form>
</td>
</tr>
<tr>
<td>Mittwoch</td>
<td>
<form id=Start-h-Mi>
	<input name="start-h-MI" type="number" value=<?php echo $daten[8]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Start-m-Mi>
	<input name="start-m-MI" type="number" value=<?php echo $daten[9]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-h-Mi>
	<input name="stop-h-MI" type="number" value=<?php echo $daten[10]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-m-Mi>
	<input name="stop-m-MI" type="number" value=<?php echo $daten[11]; ?> /> <br /> 
</form>
</td>
</tr>
<tr>
<td>Donnerstag</td>
<td>
<form id=Start-h-Do>
	<input name="start-h-DO" type="number" value=<?php echo $daten[12]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Start-m-Do>
	<input name="start-m-DO" type="number" value=<?php echo $daten[13]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-h-Do>
	<input name="stop-h-DO" type="number" value=<?php echo $daten[14]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-m-Do>
	<input name="stop-m-DO" type="number" value=<?php echo $daten[15]; ?> /> <br /> 
</form>
</td>
</tr>
<tr>
<td>Freitag</td>
<td>
<form id=Start-h-Fr>
	<input name="start-h-FR" type="number" value=<?php echo $daten[16]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Start-m-Fr>
	<input name="start-m-FR" type="number" value=<?php echo $daten[17]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-h-Fr>
	<input name="stop-h-FR" type="number" value=<?php echo $daten[18]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-m-Fr>
	<input name="stop-m-FR" type="number" value=<?php echo $daten[19]; ?> /> <br /> 
</form>
</td>
</tr>
<tr>
<td>Samstag</td>
<td>
<form id=Start-h-Sa>
	<input name="start-h-SA" type="number" value=<?php echo $daten[20]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Start-m-Sa>
	<input name="start-m-SA" type="number" value=<?php echo $daten[21]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-h-Sa>
	<input name="stop-h-SA" type="number" value=<?php echo $daten[22]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-m-Sa>
	<input name="stop-m-SA" type="number" value=<?php echo $daten[23]; ?> /> <br /> 
</form>
</td>
</tr>
<tr>
<td>Sonntag</td>
<td>
<form id=Start-h-So>
	<input name="start-h-SO" type="number" value=<?php echo $daten[24]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Start-m-So>
	<input name="start-m-SO" type="number" value=<?php echo $daten[25]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-h-So>
	<input name="stop-h-SO" type="number" value=<?php echo $daten[26]; ?> /> <br /> 
</form>
</td>
<td>
<form id=Stop-m-So>
	<input name="stop-m-SO" type="number" value=<?php echo $daten[27]; ?> /> <br /> 
</form>
</td>
</tr>
</tbody>
</table>
<button form="Start-h-Mo" form="Start-m-Mo" form="Stop-h-Mo" form="Stop-m-Mo" form="Start-h-Di" form="Start-m-Di" form="Stop-h-Di" form="Stop-m-Di" form="Start-h-Mi" form="Start-m-Mi" form="Stop-h-Mi" form="Stop-m-Mi" form="Start-h-Do" form="Start-m-Do" form="Stop-h-Do" form="Stop-m-Do" form="Start-h-Fr" form="Start-m-Fr" form="Stop-h-Fr" form="Stop-m-Fr" form="Start-h-Sa" form="Start-m-Sa" form="Stop-h-Sa" form="Stop-m-Sa" form="Start-h-So" form="Start-m-So" form="Stop-h-So" form="Stop-m-So" type="submit" name='submitpressed' value='1'>Submit</button>
<button type="reset" value="Reset">Reset</button>

<?php
// POST-Formulardaten verarbeiten
$startstop = array();
if (isset($_GET['submitpressed'])){
   $new = $_GET['submitpressed'];
   if ($new=='1'){
     echo "Kaffee ist eingeschaltet!"; 
     $startstop[0] = (int)$_GET['start-h-MO']; //OK
     $startstop[1] = (int)$_GET['start-m-MO']; //ab hier undefined index?!
     $startstop[2] = (int)$_GET['stop-h-MO'];
     $startstop[3] = (int)$_GET['stop-m-MO'];
          
     $startstop[4] = (int)$_GET['start-h-DI'];
     $startstop[5] = (int)$_GET['start-m-DI'];
     $startstop[6] = (int)$_GET['stop-h-DI'];
     $startstop[7] = (int)$_GET['stop-m-DI'];
     
     $startstop[8] = (int)$_GET['start-h-MI'];
     $startstop[9] = (int)$_GET['start-m-MI'];
     $startstop[10] = (int)$_GET['stop-h-MI'];
     $startstop[11] = (int)$_GET['stop-m-MI'];
     
     $startstop[12] = (int)$_GET["start-h-DO"];
     $startstop[13] = (int)$_GET["start-m-DO"];
     $startstop[14] = (int)$_GET["stop-h-DO"];
     $startstop[15] = (int)$_GET["stop-m-DO"];
     
     $startstop[16] = (int)$_GET["start-h-FR"];
     $startstop[17] = (int)$_GET["start-m-FR"];
     $startstop[18] = (int)$_GET["stop-h-FR"];
     $startstop[19] = (int)$_GET["stop-m-FR"];
     
     $startstop[20] = (int)$_GET["start-h-SA"];
     $startstop[21] = (int)$_GET["start-m-SA"];
     $startstop[22] = (int)$_GET["stop-h-SA"];
     $startstop[23] = (int)$_GET["stop-m-SA"];
     
     $startstop[24] = (int)$_GET["start-h-SO"];
     $startstop[25] = (int)$_GET["start-m-SO"];
     $startstop[26] = (int)$_GET["stop-h-SO"];
     $startstop[27] = (int)$_GET["stop-m-SO"];
     
     for ($i=0; $i <= 27; $i++) {
     	echo "$startstop[$i] ";
     }
     
     wfcron($startstop, $filename);
     createcron($startstop);
   }
}
?>


