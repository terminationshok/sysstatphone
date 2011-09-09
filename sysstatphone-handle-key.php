<?php

	// if the caller pressed anything but 1 or 2 send them back
	if($_REQUEST['Digits'] != '1' and $_REQUEST['Digits'] != '2') {
		header("Location: sysstatphone.php");
		die;
	}
	
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

if ($_REQUEST['Digits'] == '1') {
	$lol1=`sudo /etc/init.d/pure-ftpd restart`;
	sleep(2);
	header("Location: sysstatphone.php");
 } elseif ($_REQUEST['Digits'] == '2') {
	$lol2=`sudo /etc/init.d/pure-ftpd stop`;
        sleep(2);
	header("Location: sysstatphone.php");
} ?>
