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
	
	j1 {
    color: black;
    font-family: 'Poiret One';
    font-size: 250%;
	}
	
	.row {
    margin: auto;
	width:100%;
	}
	.block {
    margin: 10px;
	display: inline-block;
	}
	
	</style> 
	
	<head>
	
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One" rel="stylesheet">
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/jquery-3.1.1.min.js"></script>
	
	<title>	handlingQuizes.php </title>
	<div class="container">
		<div class="jumbotron">
			<P ALIGN=center><j1>HANDLING QUESTIONS</j1></p>
		</div>
	</div>
	
	<script type="text/javascript">
	
	function fieldsEmpty(){			       
	var frm = document.getElementById("erregistro");	
		for(i=1;i<frm.elements.length-3;i++){
			if(frm.elements[i].value.length==0){
				return 1;
			}
		}	 
		return 0;
	}
	
	function baliozkoa(){
		var i = fieldsEmpty();	
		if(i != 0){
			document.getElementById('empty').style.visibility="visible";
			return false;	
		}
	}
	
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
		
		<div class="container">
			
			<div class="row">
				<div class="col-xs-8 col-xs-offset-3">
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
			
						
					<div class="col-xs-8 col-xs-offset-3" id="kopurua"></div>

				</div>
			</div>			

				<div id="insertquestions"></div>
				
				<div align="center" id ="emaitza"></div>

		</div>
</body>

</html> 

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
	
	session_start();
	
	if(isset($_SESSION['login_user'])){

		$user = $_SESSION['login_user'];
		
		if($user == ""){
			header("Location: index.html");
		}else{
				
				$erabiltzaile =  $user;
				
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
		}
	}else if(isset($_SESSION['user2'])){

		$user2 = $_SESSION['user2'];
		
		if($user2 == ""){
			header("Location: index.html");
		}else{
			
			$erabiltzaile = $user2;
			
			$erabiltzaile =  $user;
				
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
		}
	}else{
		header("Location: index.html");
	}

?>
