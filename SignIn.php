<!DOCTYPE html>
<html>
<body>
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
	
		$error=''; 


		if (isset($_POST['loginB'])) {
			if (empty($_POST['erabiltzailea']) || empty($_POST['pasahitza'])) {
				echo ("Username or Password empty");
			}
			else
			{
				$username=$_POST['erabiltzailea'];
				$password=$_POST['pasahitza'];
				$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server'); 
				$sql = "SELECT Email FROM erabiltzaile where Password='$password' AND Email='$username'";
				$query = mysqli_query($connect, $sql);
				$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
				$num = mysqli_num_rows($query);
				
				if ($num == 1) {
					session_start();
					$_SESSION['login_user']=$username;
					header("Location: InsertQuestion.html");
				} else {
					echo ("Username or Password is invalid");
				}
				mysqli_close($connect); 
				
			}
		}
	?>
</body>
</html> 