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
	session_start();
	$erabiltzaile = $_SESSION['login_user'];
    $sql= "SELECT Galdera FROM galderak WHERE Egilea = '$erabiltzaile' ";
    $erab = mysqli_query($connect, $sql);
	
    echo '<div class="col-xs-8 col-xs-offset-2">';   
	echo '<table class="table table-hover"><thead><tr><th> Galdera </th></tr></thead>';

    while ($row = mysqli_fetch_array($erab, MYSQLI_ASSOC)){
        echo '<tr><td>'.$row['Galdera'].'</td><tr>';
    }
    echo '</table></div>';
    mysqli_close($connect);
	
?>