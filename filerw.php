<?php
// functions to read/write file and change crontab
// author: M.Pühlhöfer, 2018


function &rfcron ($filename) {
    // read file containing start-stop values
    // format: Mo_start_h, Mo_start_min, Mo_stop_h, Mo_stop_min, Di_start_h. Di_start_min, ... 
    // return array of start-stop values
    
    $startstop = array();
    $i = 0;
    
    $file = fopen( $filename, "r" );  
    
    if( $file == false ) {
       echo ( "Error while opening file" );
       exit();
    }   
    
	while(!feof($file)) {
		$startstop[$i++] = fgets($file);
	}
	fclose( $file ); 
	return $startstop;   
}


function wfcron ($startstop, $filename) {
	// write file containing start-stop values
	// format: Mo_start_h, Mo_start_min, Mo_stop_h, Mo_stop_min, Di_start_h. Di_start_min, ...
	// the last start-stop values before changing are stored in "coffee-before" (to enable reset)
	
    $i = 0;
    //$filename = './coffee-schedule';
    
    $rc = copy ($filename, "./tmp/coffee-before");
    //$rc = copyemz ($filename, "./tmp/coffee-before");
        
    if ( $rc == false) {
        echo ( "Error while copying file (schedule)" );
        exit();
    }
    
    $file = fopen( $filename, "w" );
    
    if( $file == false ) {
        echo ( "Error while opening file" );
        exit();
    }
    
    while($i < count($startstop)) {
        fputs($file, $startstop[$i++]);
        fputs($file, "\n");
    }
        
    fclose( $file );
}

function &reset_wfcron ($filename) {
    // reset to start-stop values before recent change
    
    return rfcron ($filename);
}

function createcron ($startstop) {
    //copy crontab into crontab-old and create a new crontab with new coffee-schedule
    //when deploying on the target system enter the correct path here: ./tmp/crontab
    
    $rc = copy ("./tmp/crontab", "./tmp/crontab.old");
    if( $rc == false ) {
    	echo ( "Error while copying file (crontab)" );
    	exit();
    }
    
    $format = array();
    $format[0] = "# /etc/crontab: system-wide crontab\n";
    $format[1] = "# Unlike any other crontab you don't have to run the `crontab'\n";
    $format[2] = "# command to install the new version when you edit this file\n";
    $format[3] = "# and files in /etc/cron.d. These files also have username fields,\n";
    $format[4] = "# that none of the other crontabs do.\n\n";
    $format[5] = "SHELL=/bin/sh\n";
    $format[6] = "PATH=/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin\n\n";
    $format[7] = "# m h dom mon dow user	command\n";
    $format[8] = "17 *	* * *	root    cd / && run-parts --report /etc/cron.hourly\n";
    $format[9] = "25 6	* * *	root	test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.daily )\n";
    $format[10] = "47 6	* * 7	root	test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.weekly )\n";
    $format[11] = "52 6	1 * *	root	test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.monthly )\n";
    $format[12] = "$startstop[1] $startstop[0]    * * 1   root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[13] = "$startstop[3] $startstop[2]    * * 1   root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[14] = "$startstop[5] $startstop[4]    * * 2   root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[15] = "$startstop[7] $startstop[6]    * * 2   root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[16] = "$startstop[9] $startstop[8]    * * 3   root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[17] = "$startstop[11] $startstop[10]    * * 3   root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[18] = "$startstop[13] $startstop[12]    * * 4   root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[19] = "$startstop[15] $startstop[14]    * * 4   root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[20] = "$startstop[17] $startstop[16]    * * 5   root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[21] = "$startstop[19] $startstop[18]    * * 5   root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[22] = "$startstop[21] $startstop[20]    * * 6   root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[23] = "$startstop[23] $startstop[22]    * * 6   root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[24] = "$startstop[25] $startstop[24]    * * 7   root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[25] = "$startstop[27] $startstop[26]    * * 7   root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[26] = "#\n";  
      
    file_put_contents("./tmp/crontab", $format);       
}


function &copyemz($file1, $file2) { 
    $contentx =@file_get_contents($file1); 
    $openedfile = fopen($file2, "w"); 
    fwrite($openedfile, $contentx); 
    fclose($openedfile); 
    if ($contentx == FALSE) { 
        $status=false; 
    } else $status=true; 
                 
    return $status; 
} 

?>
