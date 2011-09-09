<?php

$from = $_REQUEST['From'];

	// make an associative array of callers we know, indexed by phone number
	$people = array(
		"+16179133167"=>"Your caller ID was verified."
	);
	
	// if the caller is known, then greet them by name
	// otherwise, consider them just another monkey
	//if(!$name = $people[$_REQUEST['From']])
	//	$name = "Sorry, you have the wrong number.";
	        if(array_key_exists($from,$people))
                $name = $people[$from];
                else
                $name="Sorry, you have the wrong number.";

	$service_status=`/etc/init.d/pure-ftpd status`;	
	if (strpos($service_status,'started'))
	$service_status = "FTP is up";
	else
	$service_status = "FTP is down";

	// now greet the caller
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
	<Say><?php echo $name ?>.</Say>
	<?php if ($name == 'Sorry, you have the wrong number.') { ?>
	<Hangup/>
	<?php } ?>
	<Pause length="2"/>
	<Say><?php echo $service_status ?>.</Say>
	<Gather numDigits="1" action="sysstatphone-handle-key.php" method="POST">
		<Say>
			To start or restart FTP, press 1.  
			To stop FTP, press 2.
	  		Press any other key to start over.
	  	</Say>
	</Gather>
</Response>
