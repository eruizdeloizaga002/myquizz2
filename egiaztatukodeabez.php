<?php

//TICKETAK

require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$soapclient = new nusoap_client("http://enekordl.esy.es/myquiz/egiaztatuTicketaZerb.php?wsdl", true);
//$soapclient = new nusoap_client("http://localhost/myquizz/egiaztatuTicketaZerb.php?wsdl", true);

	if(isset($_POST['Ticket'])){
	$result = $soapclient->call('ticket', array('x'=>$_POST['Ticket'])); 
	echo $result;
	}
?>