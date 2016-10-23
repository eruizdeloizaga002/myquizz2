<!DOCTYPE html>
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
	
	$error=''; 

		if (isset($_POST['loginB'])) {
			if (empty($_POST['erabiltzailea']) || empty($_POST['pasahitza'])) {
				echo ("Username or Password empty");
			}
			else
			{
				$username=$_POST['erabiltzailea'];
				$password=$_POST['pasahitza'];
				$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server'); 
				$sql = "SELECT Email FROM erabiltzaile where Password='$password' AND Email='$username'";
				$query = mysqli_query($connect, $sql);
				$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
				$num = mysqli_num_rows($query);
				
				if ($num == 1) {
					session_start();
					$_SESSION['login_user']=$username;
					
					$zenb = "SELECT Zenbakia FROM konexioa";
					$unekoZenb = 0;
	
					$result = $connect->query($zenb);

					if ($result->num_rows > 0) {
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
					$_SESSION['kid']=$unekoZenb;
					
					$ordua = date("Y-m-d H:i:sa");
					$sql = "INSERT INTO konexioa VALUES ('$unekoZenb','$username','$ordua')";
					
					if(!mysqli_query($connect, $sql)){
						die('Errorea: ' . mysqli_error($connect));
					}
					echo " 1 record added <br>";
					
					header("Location: InsertQuestion.html");
				
				} else {
					echo ("Username or Password is invalid");
				}
				mysqli_close($connect); 
				
			}
		}
	?>
</body>
</html> 