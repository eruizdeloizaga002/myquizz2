<?php

//PASAHITZA

require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$soapclient = new nusoap_client("http://enekordl.esy.es/myquiz/egiaztatuPasahitzaZerb.php?wsdl", true);
//$soapclient = new nusoap_client("http://localhost/myquizz/egiaztatuPasahitzaZerb.php?wsdl", true);

	if(isset($_POST['Password'])){
	$result = $soapclient->call('egiaztatu', array('x'=>$_POST['Password'])); 
	echo $result;
	//echo '<h2>Request</h2><pre>'.htmlspecialchars($soapclient->request, ENT_QUOTES).'</pre>';
	//echo '<h2>Response</h2><pre>'.htmlspecialchars($soapclient->response, ENT_QUOTES).'</pre>';
	}
	
?>