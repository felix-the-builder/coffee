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
  font-size: 14px;
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
  font-size: 12px;
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
$filename = "./tmp/coffee-schedule";
$daten=rfcron($filename);
?>


<h1>Coffee Control</h1>
<form id="Coffee-schedule" method="post">
<table class="blueTable">
<thead>
<tr>
<th>Tag</th>
<th>Start h</th>
<th>Start min</th>
<th>Stop h</th>
<th>Stop min</th>
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
	<input name="start-h-MO" type="number" value=<?php echo $daten[0]; ?> /> <br /> 
</td>
<td>
	<input name="start-m-MO" type="number" value=<?php echo $daten[1]; ?> /> <br /> 
</td>
<td>
	<input name="stop-h-MO" type="number" value=<?php echo $daten[2]; ?> /> <br /> 
</td>
<td>
	<input name="stop-m-MO" type="number" value=<?php echo $daten[3]; ?> /> <br /> 
</td>
</tr>
<tr>
<td>Dienstag</td>
<td>
	<input name="start-h-DI" type="number" value=<?php echo $daten[4]; ?> /> <br /> 
</td>
<td>
	<input name="start-m-DI" type="number" value=<?php echo $daten[5]; ?> /> <br /> 
</td>
<td>
	<input name="stop-h-DI" type="number" value=<?php echo $daten[6]; ?> /> <br /> 
</td>
<td>
	<input name="stop-m-DI" type="number" value=<?php echo $daten[7]; ?> /> <br /> 
</td>
</tr>
<tr>
<td>Mittwoch</td>
<td>
	<input name="start-h-MI" type="number" value=<?php echo $daten[8]; ?> /> <br /> 
</td>
<td>
	<input name="start-m-MI" type="number" value=<?php echo $daten[9]; ?> /> <br /> 
</td>
<td>
	<input name="stop-h-MI" type="number" value=<?php echo $daten[10]; ?> /> <br /> 
</td>
<td>
	<input name="stop-m-MI" type="number" value=<?php echo $daten[11]; ?> /> <br /> 
</td>
</tr>
<tr>
<td>Donnerstag</td>
<td>
	<input name="start-h-DO" type="number" value=<?php echo $daten[12]; ?> /> <br /> 
</td>
<td>
	<input name="start-m-DO" type="number" value=<?php echo $daten[13]; ?> /> <br /> 
</td>
<td>
	<input name="stop-h-DO" type="number" value=<?php echo $daten[14]; ?> /> <br /> 
</td>
<td>
	<input name="stop-m-DO" type="number" value=<?php echo $daten[15]; ?> /> <br /> 
</td>
</tr>
<tr>
<td>Freitag</td>
<td>
	<input name="start-h-FR" type="number" value=<?php echo $daten[16]; ?> /> <br /> 
</td>
<td>
	<input name="start-m-FR" type="number" value=<?php echo $daten[17]; ?> /> <br /> 
</td>
<td>
	<input name="stop-h-FR" type="number" value=<?php echo $daten[18]; ?> /> <br /> 
</td>
<td>
	<input name="stop-m-FR" type="number" value=<?php echo $daten[19]; ?> /> <br /> 
</td>
</tr>
<tr>
<td>Samstag</td>
<td>
	<input name="start-h-SA" type="number" value=<?php echo $daten[20]; ?> /> <br /> 
</td>
<td>
	<input name="start-m-SA" type="number" value=<?php echo $daten[21]; ?> /> <br /> 
</td>
<td>
	<input name="stop-h-SA" type="number" value=<?php echo $daten[22]; ?> /> <br /> 
</td>
<td>
	<input name="stop-m-SA" type="number" value=<?php echo $daten[23]; ?> /> <br /> 
</td>
</tr>
<tr>
<td>Sonntag</td>
<td>
	<input name="start-h-SO" type="number" value=<?php echo $daten[24]; ?> /> <br /> 
</td>
<td>
	<input name="start-m-SO" type="number" value=<?php echo $daten[25]; ?> /> <br /> 
</td>
<td>
	<input name="stop-h-SO" type="number" value=<?php echo $daten[26]; ?> /> <br /> 
</td>
<td>
	<input name="stop-m-SO" type="number" value=<?php echo $daten[27]; ?> /> <br /> 
</td>
</tr>
</tbody>
</table>
<button form="Coffee-schedule" type="submit" method="post" formaction="ergebnis.php" name='submitpressed' value='1'>Änderungen übernehmen</button>
<button type="reset" value="Zurücksetzen">Reset</button>

<?php
/*
// POST-Formulardaten verarbeiten
// ...
//todo:
// reset button implementieren
// wieso weren nach dem Absenden des gänderten Formulars wieder die alten Werte angezeigt?!
// ...

$startstop = array();
if (isset($_POST['submitpressed'])){
   $new = $_POST['submitpressed'];
   if ($new=='1'){
     $startstop[0] = (int)$_POST['start-h-MO'];
     $startstop[1] = (int)$_POST['start-m-MO'];
     $startstop[2] = (int)$_POST['stop-h-MO'];
     $startstop[3] = (int)$_POST['stop-m-MO'];
          
     $startstop[4] = (int)$_POST['start-h-DI'];
     $startstop[5] = (int)$_POST['start-m-DI'];
     $startstop[6] = (int)$_POST['stop-h-DI'];
     $startstop[7] = (int)$_POST['stop-m-DI'];
     
     $startstop[8] = (int)$_POST['start-h-MI'];
     $startstop[9] = (int)$_POST['start-m-MI'];
     $startstop[10] = (int)$_POST['stop-h-MI'];
     $startstop[11] = (int)$_POST['stop-m-MI'];
     
     $startstop[12] = (int)$_POST['start-h-DO'];
     $startstop[13] = (int)$_POST['start-m-DO'];
     $startstop[14] = (int)$_POST['stop-h-DO'];
     $startstop[15] = (int)$_POST['stop-m-DO'];
     
     $startstop[16] = (int)$_POST['start-h-FR'];
     $startstop[17] = (int)$_POST['start-m-FR'];
     $startstop[18] = (int)$_POST['stop-h-FR'];
     $startstop[19] = (int)$_POST['stop-m-FR'];
     
     $startstop[20] = (int)$_POST['start-h-SA'];
     $startstop[21] = (int)$_POST['start-m-SA'];
     $startstop[22] = (int)$_POST['stop-h-SA'];
     $startstop[23] = (int)$_POST['stop-m-SA'];
     
     $startstop[24] = (int)$_POST['start-h-SO'];
     $startstop[25] = (int)$_POST['start-m-SO'];
     $startstop[26] = (int)$_POST['stop-h-SO'];
     $startstop[27] = (int)$_POST['stop-m-SO'];
     
     
     // for ($i=0; $i <= 27; $i++) {
     //	echo "$startstop[$i] ";
     // }
     
     wfcron($startstop, $filename);
     createcron($startstop);
     
     // echo file_get_contents('http://www/ergebnis.php');
    
    
   }
}
*/
?>


