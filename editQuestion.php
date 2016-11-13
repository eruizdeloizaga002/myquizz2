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
	
	$galdera=$_POST['gald'];
	$erantzuna=$_POST['er'];
	$gaia=$_POST['gai'];
	$zailtasuna=$_POST['zail'];
	$user = $_POST['user'];
	$id = $_POST['id'];
	
	$update = "UPDATE galderak 
			   SET Galdera= '$galdera', Erantzuna = '$erantzuna', Gaia = '$gaia', Zailtasuna = '$zailtasuna'
			   WHERE Egilea = '$user' AND Zenbakia = '$id' ";
	
	$query=mysqli_query($connect,$update);
	
	if($query){
		echo "The question was updated succesfully!";
	}else{
		echo "Something went wrong!";
	}
	mysqli_close($connect);
	echo "<a href='reviewingQuizes.php'> Back </a>";
?>