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
	
	$user=$_POST['nick'];
	
	if(isset($user)){
		$_SESSION['nickname']=$user;
		$sql="SELECT * FROM galdetegi_emaitzak WHERE erabIzena='$user'";
		$query= mysqli_query($connect,$sql);
		$num=mysqli_num_rows($query);
		if($num==0){
			$sql2="INSERT INTO galdetegi_emaitzak VALUES('$user',0,0)";
			if(!mysqli_query($connect,$sql2)){
				die('Errorea: ' . mysqli_error($connect));
			}
		}
		header("Location: game.php");
	}else{
		die('Errorea! sartu balioren bat.');
		echo '<a href="nickName.html">Try again</a>';
	}
	
?>