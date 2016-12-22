<?php session_start();
		$dbhost = "mysql.hostinger.es";
	$dbuser = "u515227455_root";
	$dbpass = "password";
	$dbname = "u515227455_quiz";
	
	/*$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "quiz";*/
	
	$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server'); 
	
	$score=$_SESSION['Score'];
	$questions=$_SESSION['Questions'];
	
	if(isset($_SESSION['login_user'])){
		$user=$_SESSION['login_user'];
		$sql="UPDATE galdetegi_emaitzak SET erantzundakoak=erantzundakoak+$questions, asmatutakoak=asmatutakoak+$score WHERE erabIzena='$user'";
		$query= mysqli_query($connect,$sql);
		if(!$query){
			die('Errorea1: ' . mysqli_error($connect));
		}
	}else if(isset($_SESSION['user2'])){
		$user=$_SESSION['user2'];
		$sql="UPDATE galdetegi_emaitzak SET erantzundakoak=erantzundakoak+$questions, asmatutakoak=asmatutakoak+$score WHERE erabIzena='$user'";
		$query= mysqli_query($connect,$sql);
		if(!$query){
			die('Errorea1: ' . mysqli_error($connect));
		}
	}else if(isset($_SESSION['nickname'])){
		$nick=$_SESSION['nickname'];
		$sql="UPDATE galdetegi_emaitzak SET erantzundakoak=erantzundakoak+$questions, asmatutakoak=asmatutakoak+$score WHERE erabIzena='$nick'";
		$query= mysqli_query($connect,$sql);
		if(!$query){
			die('Errorea2: ' . mysqli_error($connect));
		}
	}
	
	mysqli_close($connect);
	header("Location: playGame.php");
?>