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
	$password=$_POST['Password'];
	$username=$_POST['Email'];
	$encrypt=sha1($password);
	$sql = "UPDATE erabiltzaile SET Password='$encrypt' WHERE Email='$username'";
	$query = mysqli_query($connect, $sql);
	
	if($query){
		header("Location: SignIn_html.php");
	}else{
		echo "Something was wrong, try again!";
		echo '<P ALIGN=center><input type="button" onclick="setNewPassword.html">';
	}
?>