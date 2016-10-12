<!DOCTYPE HTML>
<HTML>
<head> <title> Enroll PHP </title></head>
<body>
<P>
<?php 
//connection
	$dbhost = "mysql.hostinger.es";
	$dbuser = "u515227455_root";
	$dbpass = "password";
	$dbname = "u515227455_quiz";
	
	//$dbhost = "localhost";
	//$dbuser = "root";
	//$dbpass = "";
	//$dbname = "quiz";
	
	$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server'); 
		
		if($_POST['Speciality'] == "Others"){
			$var = $_POST['OthersField'];
		}else{
			$var = $_POST['Speciality'];
		}
		
	
		
	$sql = "INSERT INTO erabiltzaile VALUES ('$_POST[Name]','$_POST[SName]','$_POST[Password]','$_POST[Email]','$_POST[Telephone]','$var','$_POST[Comments]')";
	
	if(!mysqli_query($connect, $sql)){
		die('Errorea: ' . mysqli_error($connect));
	}
	
	echo "1 record added";
	mysqli_close($connect);
	echo "<p> <a href = 'ShowUsers.php'> Erregistroak ikusi </a> </p>";
	
?> 

</body>
</HTML>