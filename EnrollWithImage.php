<!DOCTYPE HTML>
<HTML>
<head> <title> Enroll PHP </title></head>
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
		
	$var = 0;
	
	$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server'); 
	
	session_start();
	$_SESSION['sesioa_email'] = $_POST['Email'];
	$_SESSION['sesioa_pasahitza'] = $_POST['Password'];
	
		//Speciality tratamendua
	if($_POST['Speciality'] == "Others"){
		$sp = $_POST['OthersField'];
	}else{
		$sp = $_POST['Speciality'];
	}

		//Irudien kontrola
	if(isset($_FILES['Image']) && $_FILES['Image']['size'] > 0){
		$image = addslashes(file_get_contents($_FILES['Image']['tmp_name']));
	}else{
		$image = "";
	}
	
		//Izen kontrola
	$name = $_POST['Name'];
	
	if(filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array( "regexp" => "/([A-Z])([a-z])+/")))){
		echo("$name is a valid name <br>");
	} else {
		$var = 1;
		echo("$name is not a valid name, it should start with a capital letter <br>");
	}
	
		//Abizen kontrola
	$sname = $_POST['SName'];
	
	if(filter_var($sname, FILTER_VALIDATE_REGEXP, array("options" => array( "regexp" => "/([A-Z])([a-z])+ ([A-Z])([a-z])+/")))){
		echo("$sname is a valid surname <br>");
	} else {
		$var = 1;
		echo("$sname is not a valid surname, it should contain 2 surnames, both with capital letters <br>");
	}
		
		//Pasahitza kontrola
	$password = $_POST['Password'];
	$encrypt = sha1($password);
	
	if(filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/.{6}/")))){
		echo("$password is a valid password <br>");
	} else {
		$var = 1;
		echo("$password is not a password, it should have 6 digits <br>");
	}
		
		//Email-aren kontrola
	$email = $_POST['Email']; 

	if(filter_var($email, FILTER_VALIDATE_REGEXP, array("options" => array( "regexp" => "/[a-z]+\d{3}@ikasle\.ehu\.e(u?)s/"))) || $email == "web000@ehu.es"){
		echo("$email is a valid email address <br>");
	} else {
		$var = 1;
		echo("$email is not a valid email address <br>");
	}
	
	//Mugikor kontrola
	$telephone = $_POST['Telephone'];
	
	if(!filter_var($telephone, FILTER_VALIDATE_REGEXP, array("options" => array( "regexp" => "/[A-Za-z]+/"))) && !filter_var($telephone, FILTER_VALIDATE_REGEXP, array("options" => array( "regexp" => "/\d{9}/"))) == false){
		echo("$telephone is a valid telephone <br>");
	} else {
		$var = 1;
		echo("$telephone should have numeric values and 9 digits");
	}

	if ($var == 0){
		$sql = "INSERT INTO erabiltzaile VALUES ('$name','$sname','$encrypt','$email','$telephone','$sp','$_POST[Comments]','$image')";
		$sql2 = "INSERT INTO saiakerak VALUES ('$email', 0)";
		$sql3 = "INSERT INTO galdetegi_emaitzak VALUES ('$email', 0, 0)";
	}else{
		echo "<strong><span class='right'><P ALIGN=center><a href='signup3.html'>Back</a></p></span></strong>";
	}

	//Konexioa
	if(!mysqli_query($connect, $sql)){
		die('Errorea: ' . mysqli_error($connect));
	}
	
	if(!mysqli_query($connect, $sql2)){
		die('Errorea: ' . mysqli_error($connect));
	}
	
	if(!mysqli_query($connect, $sql3)){
		die('Errorea: ' . mysqli_error($connect));
	}
		
	mysqli_close($connect);
	
	header("Location: SignIn.php");
	
?> 

</body>
</HTML>