<!DOCTYPE HTML>
<HTML>
<head> <title> ShowUsersWithImage PHP </title></head>
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
		
	$erab = mysqli_query($connect, "select * from erabiltzaile");
		
	echo '<table border=1><tr><th> Name </th><th> Last Name </th><th> E-mail </th><th> Phone Number </th><th> Speciality </th><th> Other Comments </th><th> Image </th></tr>';

	while ($row = mysqli_fetch_array($erab, MYSQLI_ASSOC)){
		echo '<tr><td>'.$row['Name'].'</td><td>'.$row['Last Name'].'</td><td>'.$row['Email'].'</td><td>'.$row['Phone Number'].'</td><td>'.$row['Speciality'].'</td><td>'.$row['Other Comments'].'</td><td><img src="data:image/jpeg;base64,'.base64_encode( $row['Image'] ).'" width="300"/></td><tr>';
	}
	
	echo '</table>';
	mysqli_close($connect);
	
	echo "<p> <a href = 'layout.html'> Go to Layout </a> </p> <br>";
?> 

</body>
</HTML>