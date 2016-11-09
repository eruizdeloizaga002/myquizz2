<?php

//PASAHITZA

require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

//$soapclient = new nusoap_client("http://enekordl.esy.es/myquiz/egiaztatuPasahitzaZerb.php?wsdl", true);
$soapclient = new nusoap_client("http://localhost/myquizz/egiaztatuPasahitzaZerb.php?wsdl", true);

	if(isset($_POST['Password'])){
	echo '<h1> Pasahitza : ' . $soapclient->call('egiaztatu', array('x'=>$_POST['Password'])). '</h1>'; 
	}
	
?>