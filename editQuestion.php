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
	$delete=false;
	if(!empty($_POST['delete'])){
		$delete= $_POST['delete'];
	}
	if($delete){
		$sql="DELETE FROM galderak WHERE Zenbakia='$id'";
	}else{
		$sql = "UPDATE galderak 
			   SET Galdera= '$galdera', Erantzuna = '$erantzuna', Gaia = '$gaia', Zailtasuna = '$zailtasuna'
			   WHERE Egilea = '$user' AND Zenbakia = '$id' ";
	}
	$query=mysqli_query($connect,$sql);
	if(!$query){
		echo "Something was wrong! ";
	}else{
		echo "The update was made successfully! ";
	}
	mysqli_close($connect);
	echo "<a href='reviewingQuizes.php'> Back </a>";
?>