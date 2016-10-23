<!DOCTYPE HTML>
<html> 
<body> 
  
<?php 
$dbhost = "mysql.hostinger.es";
	$dbuser = "u515227455_root";
	$dbpass = "password";
	$dbname = "u515227455_quiz";
	
	//$dbhost = "localhost";
	//$dbuser = "root";
	//$dbpass = "";
	//$dbname = "quiz";

	$xml = simplexml_load_file('galderak.xml');
	
	foreach ($xml->xpath('//assessmentItem') as $assessmentItem){
		echo "--------------------------------------------------------------------------------------- <br>";
		echo "Galdera:<br>";
		foreach($assessmentItem-> children() as $itemBody ){
			echo utf8_decode("$itemBody->p<br>");
		}
	
	echo "Zailtasuna:<br>";	
	echo utf8_decode("$assessmentItem[complexity]<br><br>");
	
	echo "Gaia:<br>";	
	echo utf8_decode("$assessmentItem[subject]<br><br>");
	
	}
	
?>
  
</body> 
</html> 