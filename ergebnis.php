<!DOCTYPE html>
<meta charset="utf-8">
<h2>Danke, die geänderten Start-Stop Zeiten sind nur registriert!</h2>
<form>
  <button formaction="coffee2.php">Weitere Änderungen vornehmen (zurück zur Startseite)?</button>
</form>

<?php
require ('filerw.php');
$filename = "./tmp/coffee-schedule";
?>

<?php
// POST-Formulardaten verarbeiten
// ...
//todo:
// reset button implementieren
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
     
     /*
     for ($i=0; $i <= 27; $i++) {
     	echo "$startstop[$i] ";
     }
     */
     
     wfcron($startstop, $filename);
     createcron($startstop);
              
   }
}
?>




