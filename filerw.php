<?php
// functions to read/write file and change crontab


function &rfcron ($filename) {
    $startstop = array();
    $i = 0;
    // $filename = './coffee-schedule';
    $file = fopen( $filename, "r" );
        
    if( $file == false ) {
       echo ( "Error in opening file" );
       exit();
    }   
    
	while(!feof($file)) {
		$startstop[$i++] = fgets($file);
	}
	
    fclose( $file ); 
	return $startstop;   
}


function wfcron ($startstop, $filename) {
    $i = 0;
    //$filename = './coffee-schedule';
    
    $rc = copy ($filename, './coffee-before');
    
    if ( $rc == false) {
        echo ( "Error while copying file" );
        exit();
    }
    
    $file = fopen( $filename, "w" );
    
    if( $file == false ) {
        echo ( "Error in opening file" );
        exit();
    }
    
    while($i < count($startstop)) {
        fputs($file, $startstop[$i++]);
    }
    
    fclose( $file );
}


?>
