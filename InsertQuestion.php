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
	
	/*$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "quiz";*/
	
	$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server'); 

	if (empty($_POST['Question']) || empty($_POST['Answer'])) {
		echo ("Question or Answer empty");
	}else{
	
	$zenb = "SELECT Zenbakia FROM galderak";
	$unekoZenb = 0;
	
	$result = $connect->query($zenb);

	if ($result-> num_rows > 0) {
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
	
	$sql = "INSERT INTO galderak VALUES ('$unekoZenb','$eposta','$_POST[Question]','$_POST[Answer]','$_POST[Subject]','$_POST[Difficulty]')";
	
	//Konexioa
	
	if(!mysqli_query($connect, $sql)){
		die('Errorea: ' . mysqli_error($connect));
	}
	//XML
	
	$xml = simplexml_load_file('galderak.xml');

	$assessmentItem = $xml->addChild('assessmentItem');
	
		$assessmentItem -> addAttribute('complexity', $_POST['Difficulty']);
	
		$assessmentItem -> addAttribute('subject', $_POST['Subject']);
	
	$itemBody = $assessmentItem->addChild('itemBody');
	
		$itemBody-> addChild('p', $_POST['Question']);

	$correctResponse = $assessmentItem->addChild('correctResponse');
	
		$correctResponse-> addChild('value', $_POST['Answer']);
	
	$xml->asXML('galderak.xml');
	
		
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
	
	$kid = $_SESSION['kid'];
	
	$mota = "Galdera txertatu";
	
	$ordua = date("Y-m-d H:i:sa"); ;
	
	$IP = $_SERVER["REMOTE_ADDR"];
	
	$sql = "INSERT INTO ekintzak VALUES ('$unekoZenb2','$kid','$eposta','$mota','$ordua','$IP')";
	

	//Konexioa
	if(!mysqli_query($connect, $sql)){
		die('Errorea: ' . mysqli_error($connect));
	}
	
	echo "Your question was saved succesfully! <br>";

	mysqli_close($connect);
	echo "<strong><p> <a href = 'layout2.php'> Home </a> </p> <br><strong>";
	
	}
?> 

</body>
</HTML>