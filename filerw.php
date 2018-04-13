<?php
// functions to read/write file and change crontab
// author: M.Pühlhöfer, 2018


function &rfcron ($filename) {
    // read file containing start-stop values
    // format: Mo_start_h, Mo_start_min, Mo_stop_h, Mo_stop_min, Di_start_h. Di_start_min, ... 
    // return array of start-stop values
    
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
	// write file containing start-stop values
	// format: Mo_start_h, Mo_start_min, Mo_stop_h, Mo_stop_min, Di_start_h. Di_start_min, ...
	// the last start-stop values before changing are stored in "coffee-before" (to enable reset)
	
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

function &reset_wfcron ($filename) {
    // reset to start-stop values before recent change
    
    return rfcron ($filename);
}

function createcron ($startstop) {
    //copy crontab into crontab-old and create a new crontab with new coffee-schedule
    
    $rc = copy ('./crontab', './crontab.old');
    
    $format = array();
    $format[1] = "# /etc/crontab: system-wide crontab\n";
    $format[2] = "# Unlike any other crontab you don't have to run the `crontab'\n";
    $format[3] = "# command to install the new version when you edit this file\n";
    $format[4] = "# and files in /etc/cron.d. These files also have username fields,\n";
    $format[5] = "# that none of the other crontabs do.\n\n";
    $format[6] = "SHELL=/bin/sh\n";
    $format[7] = "PATH=/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin\n";
    $format[8] = "# m h dom mon dow user	command\n\n";
    $format[9] = "17 *	* * *	root    cd / && run-parts --report /etc/cron.hourly\n";
    $format[10] = "25 6	* * *	root	test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.daily )\n";
    $format[11] = "47 6	* * 7	root	test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.weekly )\n";
    $format[12] = "52 6	1 * *	root	test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.monthly )\n";
    $format[13] = "$startstop[1] $startstop[2] * * 1	root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[14] = "$startstop[3] $startstop[4] * * 1	root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[15] = "$startstop[5] $startstop[6] * * 1	root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[16] = "$startstop[7] $startstop[8] * * 1	root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[17] = "$startstop[9] $startstop[10] * * 1	root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[18] = "$startstop[11] $startstop[12] * * 1	root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[19] = "$startstop[13] $startstop[14] * * 1	root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[20] = "$startstop[15] $startstop[16] * * 1	root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[21] = "$startstop[17] $startstop[18] * * 1	root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[22] = "$startstop[19] $startstop[20] * * 1	root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[23] = "$startstop[21] $startstop[22] * * 1	root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[24] = "$startstop[23] $startstop[24] * * 1	root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[25] = "$startstop[25] $startstop[26] * * 1	root	/home/pi/Projects/remote-control/start-coffee\n";
    $format[26] = "$startstop[27] $startstop[28] * * 1	root	/home/pi/Projects/remote-control/stop-coffee\n";
    $format[27] = "#";  
      
    echo file_put_contents("crontab", $format);       
}


?>
