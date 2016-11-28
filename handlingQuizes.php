<!DOCTYPE html>

<html>
	
	<style type="text/css">
	
	.button {
	background-color: white;
    border: none;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	border: 2px solid #555555;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	}
	
	body { 
	font-family: 'Open Sans Condensed', sans-serif;
	font-size: 125%;
	margin-left: 100px;
	margin-right: 100px;
	
	cursor: crosshair;
	}
	
	fieldset {
    background-color:  #dfdfdf;
    border:  1px solid #ccc;
    margin:  2em 0;
    padding:  1em;
	}
	
	h1 {
    color: black;
    font-family: 'Poiret One';
    font-size: 250%;
	}
	.row {
    margin: auto;
	width:100%;
	text-align:center;
	}
	.block {
    margin: 10px;
	display: inline-block;
	}
	
	</style> 
	
	<head>
	
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One" rel="stylesheet">
	
	<title>	handlingQuizes.php </title>

	<h1><P ALIGN=center>Handling Questions</p></h1>
	
	<script type="text/javascript">
	
	  xhttp = new XMLHttpRequest();
      
		xhttp.onreadystatechange = function(){
            if(xhttp.readyState==4){
                var obj = document.getElementById('emaitza');
                obj.innerHTML = xhttp.responseText;
            }
        }
		
		xhttp2= new XMLHttpRequest();
        xhttp2.onreadystatechange= function(){
            if(xhttp2.readyState==4){
                var obj= document.getElementById('kopurua');
                obj.innerHTML= xhttp2.responseText;
            }
        }
        
		function galderakEguneratu(){
            setinterval(galderakZenbatu,5000);
        }

        function galderakZenbatu(){
            xhttp2.open("GET",'galderakZenbatu.php');
			xhttp2.send(null);
        }
        
        function nireGalderakIkusi(){
            xhttp.open("GET",'getQuestions.php');
            xhttp.send(null);
        }
		
		 function insertQuestion(){
            xhttp.open("GET",'InsertQuestion.html');
            xhttp.send(null);
        }
		
		
	</script>
	
	</head>

	<body onload="galderakEguneratu()">
		
		<fieldset>
			<div class="row">
			
			<div class="block">
				<button class="button" onmousedown="changeBack(this,'gray')" onmouseup="changeBack(this,'rgb(19,122,212)')" type="button" onclick="location.href='layout2.php'">Home</button>
			</div>
			
			<div class="block">
			<form action="InsertQuestion.html">
				<button class="button" onmousedown="changeBack(this,'gray')" onmouseup="changeBack(this,'rgb(19,122,212)')" type="button" onClick = "insertQuestion()">Insert Question</button>
			</form>
			</div>
	
			<div class="block">
				<button class="button" onmousedown="changeBack(this,'gray')" onmouseup="changeBack(this,'rgb(19,122,212)')" type="button"  onClick ="nireGalderakIkusi()">Show my questions</button>
			</div>

			</div>
	
		</fieldset>
		
		<div id ="emaitza"></div>
		
		<div id="kopurua"></div>
	
</body>

</html> 

<?php 
//connection
	/*$dbhost = "mysql.hostinger.es";
	$dbuser = "u515227455_root";
	$dbpass = "password";
	$dbname = "u515227455_quiz";*/
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "quiz";
	
	session_start();
	
	if(isset($_SESSION['login_user'])){
		$user = $_SESSION['login_user'];
		if($user == ""){
			header("Location: layout.html");
		}else{
			$erabiltzaile =  $user;
		}
	}else if(isset($_SESSION['user2'])){
		$user2 = $_SESSION['user2'];
		if($user2 == ""){
			header("Location: layout.html");
		}else{
			$erabiltzaile = $user2;
		}
	}
		
		$kontErabiltzaileGalderak=0;
		$kontGalderaGuztiak=0;
		
		$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server');
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
