<!DOCTYPE HTML>
<HTML>
<head> <title> ShowUsers PHP </title></head>
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
		
	$erab = mysqli_query($connect, "select * from erabiltzaile");
	
	echo '<table border=1><tr><th> Name </th><th> Last Name </th><th> Password </th><th> E-mail </th><th> Phone Number </th><th> Speciality </th><th> Other Comments </th></tr>';

	while ($row = mysqli_fetch_array($erab, MYSQLI_ASSOC)){
		echo '<tr><td>'.$row['Name'].'</td><td>'.$row['Last Name'].'</td><td>'.$row['Password'].'</td><td>'.$row['E-mail'].'</td><td>'.$row['Phone Number'].'</td><td>'.$row['Speciality'].'</td><td>'.$row['Other Comments'].'</td><tr>';
	}
	
	echo '</table>';
	mysqli_close($connect);
		
?> 

</body>
</HTML>