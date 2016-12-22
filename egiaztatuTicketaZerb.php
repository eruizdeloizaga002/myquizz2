<?php

require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

//$ns = "http://localhost/myquizz/egiaztatuTicketaZerb.php"; //name of the service
$ns = "http://enekordl.esy.es/myquiz/egiaztatuTicketaZerb.php";

$server = new soap_server;
$server->configureWSDL('ticket',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

$server->register('ticket',array('x'=>'xsd:int'),array('z'=>'xsd:string'),$ns);

function ticket($x){
	
	if($x == ""){
		"BALIOGABEA";
	}
	if($x == "1111" || $x == "2222" || $x == "3333"){
		return "BALIOZKOA";
	}
	return "BALIOGABEA";
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>