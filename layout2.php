<!DOCTYPE html>
<html>

<style>

</style>
  <head>  
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Quizzes</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<span class="right"><a href='logout.php'> LogOut </a> </span>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout2.html'>Home</a></span>
		<span><a href='Quizz2.php'>Quizzes</a></span>
		<span><a href='QuestionsXML2.php'>Questions XML</a></span>
		<span><a href = 'ShowUsersWithImage2.php'>Users</a></span>
		<div id = "h" style="visibility:hidden;"><a href ='handlingQuizes.php'>Handling Quizes</a></div>
		<span><a href ='reviewingQuizes.php'>Reviewing Quizes</a></span>
		
		<span class="right"><a href='credits2.html'> Credits </a></span>
	</nav>
    <section class="main" id="s1">
    </section>
	<div>
	Quizzes and credits will be displayed in this spot in future laboratories ...
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>

<?php 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "quiz";
	
	$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server');
	
	session_start();
	$user = $_SESSION['login_user'];
	echo "$user";
	
	if($user == "web000@ehu.es"){
		?>
		<script> document.getElementById('r').style.visibility ="visible"; </script>
		<?php
	}else{
		?>
		<script> document.getElementById('h').style.visibility ="visible"; </script>
		<?php
	}


?>
