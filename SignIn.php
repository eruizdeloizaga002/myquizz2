<!DOCTYPE html>
<html>
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
	
	$error=''; 
	
			if (!isset($_SESSION['sesioa_email']) || !isset($_SESSION['sesioa_pasahitza'])){
				$username = $_POST['Email'];
				$password = $_POST['Password'];
			}else{
				$username = $_SESSION['sesioa_email'];
				$password = $_SESSION['sesioa_pasahitza'];
			}
			
			$encrypt=sha1($password);
			
			$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server'); 
			$sql = "SELECT * FROM erabiltzaile where Password='$encrypt' AND Email='$username'";
			$query = mysqli_query($connect, $sql);
			$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
			$num = mysqli_num_rows($query);
				
				if ($num == 1) {
				//Konexioaren zenbakia eguneratu

				$_SESSION['login_user']=$username;
				
				$_SESSION['Name'] = $row['Name'];
				
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
					
					//session_start();
					$_SESSION['kid']=$unekoZenb;
					
					$ordua = date("Y-m-d H:i:sa");
					$sql = "INSERT INTO konexioa VALUES ('$unekoZenb','$username','$ordua')";
					
					if(!mysqli_query($connect, $sql)){
						die('Errorea: ' . mysqli_error($connect));
					}
					
					//Irakaslea edo ikaslea den begiratu
					
					if($username == "web000@ehu.es"){
						header("Location: reviewingQuizes.php");
					}else{
						header("Location: handlingQuizes.php");
					}
					
				}else{
					
					if(isset($_SESSION['sesioa_email'])) {
						
						$user = $_SESSION['sesioa_email'];
							
						if($user == "web000@ehu.es"){
							$_SESSION['user2'] = $user;
							header("Location: reviewingQuizes.php");
						}else{
							$_SESSION['user2'] = $user;
							header("Location: handlingQuizes.php");
						}
						
					}else{
						
						$sql = "SELECT Kopurua FROM saiakerak WHERE Email= '$username'";
						$result = $connect->query($sql);
						$val = $result->fetch_assoc();	
						$num = mysqli_num_rows($result);
							
							if($num != 0){
								$k = $val['Kopurua'];
								
								$k = $k + 1;
								
								$sql = "UPDATE saiakerak SET Kopurua = '$k' WHERE Email = '$username'";
									if(!mysqli_query($connect, $sql)){
										die('Errorea: ' . mysqli_error($connect));
									}							
								$_SESSION['saiakerak'] = $k;
								header("Location: SignIn_html.php");
							}else{
								$_SESSION['saiakerak'] = -1;
								header("Location: SignIn_html.php");
							}
					}
				}
				
				
				
			mysqli_close($connect); 		
	?>
</body>
</html> 