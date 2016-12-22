<!DOCTYPE HTML>
<html> 

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One" rel="stylesheet">
	
	
	<script>
	
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});

	function fieldsEmpty(){			       
				
		var frm = document.getElementById("galderak");
				
		for(i=0;i<frm.elements.length-1;i++){
              if(frm.elements[i].value.length==0){
				frm.elements[i].style.border="2px solid red";
				document.getElementById("alert").style = "visibility: visible;";
				return false;
              }
        }	 
	}

	</script>
	
	
	
	<style>
	
	j1{
		color: black;
		font-family: 'Poiret One';
		font-size: 250%;
	}
	
	j2{
		font-family: 'Roboto', sans-serif;
		font-size: 125%;
	}
	
	j3{
		font-family: 'Roboto', sans-serif;
		font-size: 250%;
		color: green;
	}
	
	</style>

</head>

<body> 
<div class="container">
<div class="jumbotron">
  <p align='center'><j1><?php session_start(); echo $_SESSION['Gaia']; ?></j1></p>
  <strong><h4 align="center"><?php if(isset ($_SESSION['login_user'])){ echo "Playing as ".$_SESSION['login_user'];}else{echo " ";}?><h4><strong>
</div>
<strong><p align="center"><j3><?php if($_SESSION['Score'] == -1 || !isset($_SESSION['Score'])){echo "";}else if(isset($_SESSION['Score'])){ echo "Your Score :".$_SESSION['Score']."/".$_SESSION['Questions']?><br><?php ; echo '<p align="center"><a href = "showAnswers.php"><button style = "font-size: 25px;" class="btn btn-primary" id="answers">Show Answers</button></a></p>';}?></j3></p></strong>
<br>
<p align="center"><a href = "showTotalScore.php"><button style = "font-size: 15px;" class="btn btn-primary" id="totalscore">Your scores</button></a></p>
<br>
<strong><span class="right"><P ALIGN=center><a href="game.php">Back</a></p></span></strong>
<br>
<strong><span class="right"><P ALIGN=center><a href="destroysession.php">Home</a></p></span></strong>
<br>
<div class="row">
<div class="col-xs-6 col-xs-offset-3">
  <div class="list-group">
    
	<?php 
	
	$dbhost = "mysql.hostinger.es";
	$dbuser = "u515227455_root";
	$dbpass = "password";
	$dbname = "u515227455_quiz";
	
	/*$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "quiz";*/
	
	$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server'); 
	
	$subject =  $_SESSION['Gaia']; 
	
	$sql = "SELECT Galdera FROM galderak WHERE Gaia = '$subject'";
	
	$erab = mysqli_query($connect, $sql);
	
	$var = 0;
	
	?> <form id="galderak" method="post" action="galderakEgiaztatu.php" onSubmit="return fieldsEmpty()" enctype="multipart/form-data"><?php
	
	while ($row = mysqli_fetch_array($erab, MYSQLI_ASSOC)){
		echo '<a class="list-group-item"><j2>'.$row['Galdera'].'<j2><br><br><input id = '.$var.' name = '.$var.' type = "text"></input><br><br></a>';
		$var = $var + 1;
	}
	
	?>
    </div>
	<div id = "alert" class="alert alert-danger" style="visibility:hidden;">
		<strong>You should fill all the gaps!</strong> 
	</div>
	<p align= "center"><a href="#" data-toggle="tooltip" title="Click to see your score!"><input type= "submit" style = "font-size: 25px;" class="btn btn-primary" id= "submit" value="Submit"></input></a></p>
	<br>
	</form>
	
 </div>
</div>
</div>
  
</body> 
</html> 