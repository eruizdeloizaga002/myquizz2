<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One" rel="stylesheet">
		
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		j1 {
			color: black;
			font-family: 'Poiret One';
			font-size: 250%;
		}
	</style>
	<div class="container">
		<div class="jumbotron">
			<p align="center"><j1>Personal total score</j1></p>
		</div>
	</div>
</head>
<body>
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
	
	if(isset($_SESSION['login_user'])){
		$user=$_SESSION['login_user'];
		$sql= "SELECT erantzundakoak, asmatutakoak FROM galdetegi_emaitzak WHERE erabIzena='$user'";
		$query= mysqli_query($connect,$sql);
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$num = mysqli_num_rows($query);
		echo '<div class="container"><div class="row"><div class="col-xs-6 col-xs-offset-3">';
		if($num==1){
			echo '<table class="table table-hover"><thead><tr><th> Total questions </th><th> Correct answers </th></tr></thead>';
			echo '<tr><td>'.$row['erantzundakoak'].'</td><td>'.$row['asmatutakoak'].'</td></tr></table>';
		}
		echo '<strong><p align="center"><a href="playGame.php">Back</a></p><strong>';
		echo '<br>';
		echo '<strong><p align="center"><a href="layout2.php">Home</a></p><strong>';
		echo '</div></div></div>';
		
	}else if(isset($_SESSION['nickname'])){
		
		$nickname=$_SESSION['nickname'];
		$sql= "SELECT erantzundakoak, asmatutakoak FROM galdetegi_emaitzak WHERE erabIzena='$nickname'";
		$query= mysqli_query($connect,$sql);
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$num = mysqli_num_rows($query);
		echo '<div class="container"><div class="row"><div class="col-xs-6 col-xs-offset-3">';
		if($num==1){
			echo '<table class="table table-hover"><thead><tr><th> Total questions </th><th> Correct answers </th></tr></thead>';
			echo '<tr><td>'.$row['erantzundakoak'].'</td><td>'.$row['asmatutakoak'].'</td></tr></table>';
		}
		echo '<strong><p align="center"><a href="playGame.php">Back</a></p><strong>';
		echo '<strong><p align="center"><a href="destroysession.php">Home</a></p><strong>';
		echo '</div></div></div>';
	}else if(!isset($_SESSION['login_user']) && !isset($_SESSION['nickname'])){
		
		echo "<p align=center> To watch the total score it's necesary to be registered or to insert a nickname!</p>";
		echo '<br>';
		echo '<strong><span class="right"><P ALIGN=center><a href="playGame.php">Back to Game</a></p></span><strong>';
		echo '<br>';
		echo '<strong><span class="right"><P ALIGN=center><a href="destroysession.php">Home</a></p></span></strong>';
	
	}

?>
</body>
</html>