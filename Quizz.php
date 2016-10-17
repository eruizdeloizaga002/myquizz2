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
	
	
	$zenb2 = "SELECT Zenbakia FROM ekintzak";
	$unekoZenb2 = 0;
	
	$result = $connect->query($zenb2);

	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			if($row["Zenbakia"] > $unekoZenb2){
				$unekoZenb2 = $row["Zenbakia"];
			}
		}
	} else {
		echo "0 results on table";
	}
	
	if ($unekoZenb2 == 0){
		$unekoZenb2 = 1;
	}else{
		$unekoZenb2 = $unekoZenb2 + 1;
	}
	
	session_start();
	$kid = $_SESSION['kid'];
	
	$eposta = "anonymous";
	
	$mota = "Galderak kontsultatu";
	
	$ordua = date("Y-m-d H:i:sa"); ;
	
	$IP = $_SERVER["REMOTE_ADDR"];
	
	$sql = "INSERT INTO ekintzak VALUES ('$unekoZenb2','$kid','$eposta','$mota','$ordua','$IP')";
	
	//Konexioa
	if(!mysqli_query($connect, $sql)){
		die('Errorea: ' . mysqli_error($connect));
	}
	
	echo " 1 record added <br>";	
	
	mysqli_close($connect);
	
	
	echo "<p> <a href = 'layout.html'> Back </a> </p>";
?>
  
</body> 
</html> 