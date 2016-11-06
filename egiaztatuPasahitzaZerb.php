<?php

require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

//$ns = "http://localhost/myquizz/egiaztatuPasahitzaZerb.php"; //name of the service
$ns = "http://enekordl.esy.es/myquiz/egiaztatuPasahitzaZerb.php";

$server = new soap_server;
$server->configureWSDL('egiaztatu',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

$server->register('egiaztatu',array('x'=>'xsd:string'),array('z'=>'xsd:string'),$ns);

function egiaztatu($x){
	
	$file = file_get_contents('toppasswords.txt');
	
	if(!strpos($file, $x)){
		return "BALIOZKOA";
	}
	return "BAILOGABEA";
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>