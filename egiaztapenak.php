<!DOCTYPE html>
<html>
	
	<style type="text/css">
	
	body { 
	font-family: 'Open Sans Condensed', sans-serif;
	font-size: 125%;
	margin-left: 100px;
	margin-right: 100px;
	
	cursor: crosshair;
	}
	
	fieldset {
    background-color:  #dfdfdf;
    border:  1px solid #ccc;
    margin:  2em 0;
    padding:  1em;
	}
	
	h1 {
    color: black;
    font-family: 'Poiret One';
    font-size: 250%;
	}
	</style> 

	<head>
		<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One" rel="stylesheet">
		
		<title>	simpleSignUp.html </title>

		<h1 ALIGN=center> TESTING </h1>
		
	</head>

	<body>
		
		<form id="erregistro" name="erregistro" method = "post" action = "egiaztapenak.php">

		<fieldset>
			
			<legend> Personal information: </legend><br>
			
			E-mail:* <br>
			<input type="text" name="Email" id="e"><br>
			
			Password:*<br>
			<input type="password" name= "Password" id ="p"><br>
			
			<P ALIGN=center><input type="submit" value="Submit"></input></p>

			</fieldset>
		</form>
			<span class="right"><P ALIGN=center><a href="layout.html">Back</a></p></span>
	</body>

</html>


<?php

//EMAILA

require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');
	
$soapclient = new nusoap_client("http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl", false);

	if (isset($_POST['Email'])){
	echo '<h1> Matrikulatuta WS: ' . $soapclient->call('egiaztatuE',array('x'=>$_POST['Email'])). '</h1>';
	}

//PASAHITZA

require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

$soapclient = new nusoap_client("http://enekordl.esy.es/myquiz/egiaztatuPasahitzaZerb.php?wsdl", true);
//$soapclient = new nusoap_client("http://localhost/myquizz/egiaztatuPasahitzaZerb.php?wsdl", true);

	if(isset($_POST['Password'])){
	echo '<h1> Pasahitza : ' . $soapclient->call('egiaztatu', array('x'=>$_POST['Password'])). '</h1>'; 
	}
?>