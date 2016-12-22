<!DOCTYPE html>
<html>
<?php session_start(); ?>
  <head> 

	<style>

	j1{
		color: black;
		font-family: 'Poiret One';
		font-size: 225%;
	}
	
	j3{
		font-family: 'Roboto', sans-serif;
		font-size: 250%;
	}

	</style>  
	
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One" rel="stylesheet">
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Quizzes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </head>

   <script type="text/javascript">
	
	  xhttp = new XMLHttpRequest();
      
		xhttp.onreadystatechange = function(){
            if(xhttp.readyState==4){
                var obj = document.getElementById('emaitza');
                obj.innerHTML = xhttp.responseText;
            }
        }
	
		function getQuestions(){
			document.getElementById("play").style = "visibility:hidden; display: none;";
			document.getElementById("welcome").style = "visibility:hidden; display: none;";

            xhttp.open("GET",'Quizz2.php');
            xhttp.send(null);
        }
		
		function getUsers(){
			document.getElementById("play").style = "visibility:hidden; display: none;";
			document.getElementById("welcome").style = "visibility:hidden; display: none;";

            xhttp.open("GET",'ShowUsersWithImage2.php');
            xhttp.send(null);
        }
		
		function getInsert(){
			document.getElementById("play").style = "visibility:hidden; display: none;";
			document.getElementById("welcome").style = "visibility:hidden; display: none;";

            xhttp.open("GET",'InsertQuestion.html');
            xhttp.send(null);
        }
		
		/*function getRemoveUser(){
			document.getElementById("play").style = "visibility:hidden; display: none;";
			document.getElementById("welcome").style = "visibility:hidden; display: none;";
			
			xhttp.open("GET",'removeUser.php');
            xhttp.send(null);
			
		}*/
		
	</script>
   
  <body>

  <nav class="navbar navbar-default">
	
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
        <a class="navbar-brand" href="#">CRAZY QUESTIONS</a>
    </div>
	
	<div class="collapse navbar-collapse" id="myNavbar">
	
		<ul class="nav navbar-nav">
			<li class="active"><a href='layout2.php'><span class="glyphicon glyphicon-home"></span> Home</a></li>
		
			<li onClick = "getQuestions()"><a href='#'><span class="glyphicon glyphicon-question-sign"></span> Questions</a></li>
			
			<li id = "a"  style="visibility:hidden; display:none;" onClick = "getUsers()"><a href='#'><span class="glyphicon glyphicon-list"></span> All Users</a></li>
			
			<li id = "re"  style="visibility:hidden; display:none;"><a href ='removeUser.php'><span class="glyphicon glyphicon-remove"></span> Remove User</a></li>
			
			<li id = "i"  style="visibility:hidden; display:none;" onClick = "getInsert()"><a href='#'><span class="glyphicon glyphicon-plus"></span> Insert Question</a></li>
			
			<li id = "h"  style="visibility:hidden; display:none;"><a href ='handlingQuizes.php'><span class="glyphicon glyphicon-edit"></span> My Quizes</a></li>
			
			<li id = "r"  style="visibility:hidden; display:none;"><a href ='reviewingQuizes.php'><span class="glyphicon glyphicon-edit"></span> Edit Quizes</a></li>
			
		</ul>
			
		<ul class="nav navbar-nav navbar-right">
			
			<li><a href=''><span class="glyphicon glyphicon-user"></span>
		
				<?php 

					if(isset($_SESSION['login_user'])){
						$user = $_SESSION['login_user'];
					}else{
						$user = $_SESSION['sesioa_email'];
					}
					echo "$user" ;
				?>
			</a>
			</li>
		
			<li><a href='logout.php'><span class="glyphicon glyphicon-log-out"></span> LogOut </a></li>
		
		</ul>
	  
    </div>
  </div>
 
 </nav>

  
<div class="container">

<div id="emaitza"></div>
<br><br><br><br><br>
	<div id = "welcome" class="jumbotron">
		<p align = "center"><j1>Welcome to our page <?php 	$izena = $_SESSION['Name'];
															echo "$izena !" ;
														?> </j1></p>
	</div>
	<br>
	<form action= "game.php"><P ALIGN="center"><button id = "play" type="submit" class="btn btn-primary"><j3>START PLAYING!</j3></button></p></form>
	
</div>

<nav class="navbar navbar-default navbar-fixed-bottom">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
	  <li><a href='credits.html'><span class="glyphicon glyphicon-sunglasses"></span> About Us</a></li>
      <li><a href="http://en.wikipedia.org/wiki/Quiz"><span class="glyphicon glyphicon-info-sign"></span> What is a Quiz?</a></li>
      <li><a href='https://github.com'><span class="glyphicon glyphicon-level-up"></span> Link GITHUB</a></li>
    </ul>
  </div>
</nav>

</body>
</html>

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
	
	if($user == "web000@ehu.es"){
		?>
		<script> document.getElementById('a').style = "visibility:visible; display: block;"; </script>
		<script> document.getElementById('r').style = "visibility:visible; display: block;"; </script>
		<script> document.getElementById('re').style = "visibility:visible; display: block;"; </script>
		<?php
	}else{
		?>
		<script> 
		
		document.getElementById('i').style = "visibility:visible; display: block;";
		document.getElementById('h').style = "visibility:visible; display: block;";

		</script>
		<?php
	}


?>
