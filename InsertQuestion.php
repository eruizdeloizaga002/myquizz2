<!DOCTYPE HTML>
<HTML>
<head> <title> Insert Question PHP </title></head>
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

	if (empty($_POST['Galdera']) || empty($_POST['Erantzuna'])) {
				echo ("Question or Answer empty");
	}else{
	
	$zenb = "SELECT Zenbakia FROM galderak";
	$unekoZenb = 0;
	
	$result = $connect->query($zenb);

	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			if($row["Zenbakia"] > $unekoZenb){
				$unekoZenb = $row["Zenbakia"];
			}
		}
	} else {
		echo "0 results on table";
	}
	
	if ($unekoZenb == 0){
		$unekoZenb = 1;
	}else{
		$unekoZenb = $unekoZenb + 1;
	}
	
	session_start();
	$eposta = $_SESSION['login_user'];
	
	$sql = "INSERT INTO galderak VALUES ('$unekoZenb','$eposta','$_POST[Question]','$_POST[Answer]','$_POST[Difficulty]')";
	
	//Konexioa
	
	if(!mysqli_query($connect, $sql)){
		die('Errorea: ' . mysqli_error($connect));
	}
	
	echo " 1 record added <br>";
	mysqli_close($connect);
	echo "<p> <a href = 'layout2.html'> Layout </a> </p> <br>";
	}
?> 

</body>
</HTML>