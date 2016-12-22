<?php 
	
		$dbhost = "mysql.hostinger.es";
	$dbuser = "u515227455_root";
	$dbpass = "password";
	$dbname = "u515227455_quiz";
	
	/*$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "quiz";*/

	$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server'); 
	
	$sql = "SELECT DISTINCT Gaia FROM galderak ";
	
	$erab = mysqli_query($connect, $sql);

	$var = 0;
	
	while ($row = mysqli_fetch_array($erab, MYSQLI_ASSOC)){
		
		echo '<p align=center><button style = "text-align: center;" id = '.$var.' onClick= "getItem('.$var.')" class="list-group-item"><j2>'.$row['Gaia'].'<j2></button></p>';
		$var = $var + 1;
	}
	
?>