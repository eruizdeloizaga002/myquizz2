<?php 
//connection
	$dbhost = "mysql.hostinger.es";
	$dbuser = "u515227455_root";
	$dbpass = "password";
	$dbname = "u515227455_quiz";*/
	
	/*$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "quiz";*/
	
	$kontErabiltzaileGalderak=0;
	$kontGalderaGuztiak=0;
	
	$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server');
	session_start();
	$erabiltzaile=$_SESSION['login_user'];
	$sql= "SELECT Galdera FROM galderak WHERE Egilea = '$erabiltzaile'";
	$sql2= "SELECT Galdera FROM galderak";
	$galderak1= mysqli_query($connect,$sql);
	$galderak2= mysqli_query($connect,$sql2);
	while ($row = mysqli_fetch_array($galderak1, MYSQLI_ASSOC)){
		$kontErabiltzaileGalderak=$kontErabiltzaileGalderak+1;
	}
	while ($row = mysqli_fetch_array($galderak2, MYSQLI_ASSOC)){
		$kontGalderaGuztiak=$kontGalderaGuztiak+1;
	}
	echo "'$erabiltzaile' erabiltzailearen galdera kopurua: '$kontErabiltzaileGalderak'/ '$kontGalderaGuztiak' galdera daude guztira.";
	mysqli_close($connect);
?> 