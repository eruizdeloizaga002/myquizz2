<?php

//EMAILA

require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');
	
$soapclient = new nusoap_client("http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl", false);

	if (isset($_POST['Email'])){
	echo '<h1> Matrikulatuta WS: ' . $soapclient->call('egiaztatuE',array('x'=>$_POST['Email'])). '</h1>';
	}

?>