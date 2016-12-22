<!DOCTYPE HTML>
<HTML>
<head> 
<title> ShowUsersWithImage PHP </title>
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
		<p align="center"><j1>USERS</j1></P>
	</div>
</div>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
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
		
	$erab = mysqli_query($connect, "select * from erabiltzaile");
		
	echo '<table class="table table-hover"><thead><tr><th> Name </th><th> Last Name </th><th> E-mail </th><th> Phone Number </th><th> Speciality </th><th> Other Comments </th><th> Image </th></tr></thead>';

	while ($row = mysqli_fetch_array($erab, MYSQLI_ASSOC)){
		echo '<tr><td>'.$row['Name'].'</td><td>'.$row['Last Name'].'</td><td>'.$row['Email'].'</td><td>'.$row['Phone Number'].'</td><td>'.$row['Speciality'].'</td><td>'.$row['Other Comments'].'</td><td><img src="data:image/jpeg;base64,'.base64_encode( $row['Image'] ).'" width="100"/></td><tr>';
	}
	
	echo '</table>';
	mysqli_close($connect);
	
	echo "<p align=center> <a href = 'layout.html'> Go to Layout </a> </p> <br>";
?> 
		</div>
	</div>
</div>
</body>
</HTML>