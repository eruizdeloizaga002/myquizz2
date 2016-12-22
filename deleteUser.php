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
	
	$erabiltzailea=$_POST['er'];

	$sql="DELETE FROM erabiltzaile WHERE Email='$erabiltzailea'";
	$query=mysqli_query($connect,$sql);
	
	if(!$query){
		echo "Something was wrong! ";
	}else{
		echo "The delete was made successfully";
	}
	mysqli_close($connect);
	echo "<a href='removeUser.php'> Back </a>";
?>