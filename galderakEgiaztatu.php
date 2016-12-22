<!DOCTYPE HTML>
<HTML>
<head> <title> Enroll PHP </title></head>
<body>
<P>
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

	$subject = $_SESSION['Gaia'];
	
	$sql = "SELECT Erantzuna FROM galderak WHERE Gaia = '$subject'";
		
	$erab = mysqli_query($connect, $sql);
	
	$score = 0;
	
	$var = 0;
	
	$questions = 0;
	
	while ($row = mysqli_fetch_array($erab, MYSQLI_ASSOC)){
		
		if($_POST[$var] == $row['Erantzuna']){
			$score = $score + 1;
		}
		
		$var = $var + 1;
		$questions = $questions + 1;
	}
	
	$_SESSION['Score'] = $score;
	$_SESSION['Questions'] = $questions;
		
	mysqli_close($connect);

	header("Location: setTotalScore.php");
	
?> 

</body>
</HTML>