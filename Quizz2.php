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

	$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server'); 
	
	$sql = "SELECT Galdera,Zailtasuna FROM galderak";
	
	$erab = mysqli_query($connect, $sql);
	
	echo '<table border=1><tr><th> Galdera </th><th> Zailtasuna</th></tr>';

	while ($row = mysqli_fetch_array($erab, MYSQLI_ASSOC)){
		echo '<tr><td>'.$row['Galdera'].'</td><td>'.$row['Zailtasuna'].'</td><tr>';
	}
	echo '</table>';
	mysqli_close($connect);
	
	echo "<p> <a href = 'layout2.html'> Back </a> </p>";
?>
  
</body> 
</html> 