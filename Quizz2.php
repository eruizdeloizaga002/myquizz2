<!DOCTYPE HTML>
<html> 

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One" rel="stylesheet">
	
	<style>
	
	j1{
		color: black;
		font-family: 'Poiret One';
		font-size: 250%;
	}
	
	</style>

</head>

<body> 
  
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
	
	if(isset($_SESSION['kid'])){
		session_start();
		$kid = $_SESSION['kid'];
	}else{
		$kid = 0;
	}
	
	$eposta = "anonymous";
	
	$mota = "Galderak kontsultatu";
	
	$ordua = date("Y-m-d H:i:sa"); ;
	
	$IP = $_SERVER["REMOTE_ADDR"];
	
	$sql = "INSERT INTO ekintzak VALUES ('$unekoZenb2','$kid','$eposta','$mota','$ordua','$IP')";
	
	//Konexioa
	if(!mysqli_query($connect, $sql)){
		die('Errorea: ' . mysqli_error($connect));
	}
	
	mysqli_close($connect);

?>
 
 
<div class="container">
<div class="jumbotron">
  <p align='center'><j1>Questions</j1></p>
</div>
	<strong><?php echo "<p align = 'center'> <a href = 'layout2.php'> Back </a> </p>"; ?></strong>
	<br>
<div class="row">
<div class="col-xs-6 col-xs-offset-3">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Galdera</th>
        <th>Zailtasuna</th>
      </tr>
    </thead>
    <tbody>
	
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
	
	$sql = "SELECT Galdera,Zailtasuna FROM galderak";
	
	$erab = mysqli_query($connect, $sql);
	
	while ($row = mysqli_fetch_array($erab, MYSQLI_ASSOC)){
		echo '<tr><td>'.$row['Galdera'].'</td><td>'.$row['Zailtasuna'].'</td><tr>';
	}
	
	?>
    </tbody>
  </table>
 </div>
</div>
</div>
  
</body> 
</html> 