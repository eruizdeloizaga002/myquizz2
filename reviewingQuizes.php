<!DOCTYPE html>
<?PHP session_start(); ?>
<html>
<head> 

	<style type="text/css">
	
	@import url('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	
	body{ 
		font-family: 'Roboto', sans-serif;
		font-size: 525%;
	}
	
	fieldset {
		background-color:  #dfdfdf;
		border:  1px solid #ccc;
		margin:  2em 0;
		padding:  1em;
	}
	
	j1{
		color: black;
		font-family: 'Poiret One';
		font-size: 275%;
	}
	
	j2{
		font-family: 'Roboto', sans-serif;
		font-size: 150%;
	}
	
	j3{
		font-family: 'Roboto', sans-serif;
		font-size: 100%;
	}
	
	
	j4{
		font-family: 'Roboto', sans-serif;
		font-size: 90%;
		padding: 15px 25px;
	}
	
	.button1{
		border-radius: 6px;
		background-color: #008CBA;;
		color: white;
		font-family: 'Roboto', sans-serif;
		font-size: 90%;
		padding: 7px 25px;
	}
	
	.blink {
		animation-duration: 0.5s;
		animation-name: blink;
		animation-iteration-count: infinite;
		animation-direction: alternate;
		animation-timing-function: ease-in-out;
	}
	
	@keyframes blink {
		from {
			opacity: 1;
		}
		to {
			opacity: 0;
		}
	}
	
	.isa_warning {
		color: #9F6000;
	}
	
	</style> 
	
	<title>Edit Questions</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One" rel="stylesheet">

	
	<script>
	
		$(document).ready(function(){
			$("#emaitza").hide();
		});
		
		$( function() {
			$(".button1").on("click", function(){

				document.getElementById('help').style = "text-align: center; font-size: 20px; color: #9F6000;";
				document.getElementById('help').className= "blink";

				$("#emaitza").show();
				
				var row = $(this).closest("tr");
				
				var id = row.find(".classGalderaID").text();
				var user = row.find(".classEgilea").text();
				var question = row.find(".classGaldera").text();
				var answer = row.find(".classErantzuna").text();
				var difficulty = row.find(".classZailtasuna").text();
				var subject = row.find(".classGaia").text();

				$("#gald").val(question);
				$("#er").val(answer);
				$("#gai").val(subject);
				$("#zail").val(difficulty);
				
				$("#user").val(user);
				$("#id").val(id);
				
			});
		});
	</script>
</head>

<body>

<div class="container">
<div class="jumbotron">
  <p align='center'><j1>Edit Questions</j1><br></p>
  <em><div class="isa_warning" id="help" style="text-align: center; font-size: 20px;"><i class="fa fa-warning"></i> Click edit and scroll down to edit!</div></em>
</div>
<br>
 <?php echo "<strong><p align='center'><a href='layout2.php'> Go to layout </a></p></strong>"; ?>
 
<div class="row">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>User</th>
        <th>GalderaID</th>
		<th>Galdera</th>
		<th>Erantzuna</th>
		<th>Gaia</th>
		<th>Zailtasuna</th>
		<th>Editatu</th>
      </tr>
    </thead>
    <tbody>
	
	<?php
	
	$dbhost = "mysql.hostinger.es";
	$dbuser = "u515227455_root";
	$dbpass = "password";
	$dbname = "u515227455_quiz";
	
	/*$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "quiz";*/
	
	if(!isset($_SESSION['login_user'])){
		header("Location: layout.html");
	}else{
	
	$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server'); 
	$sql = "SELECT * FROM galderak";
	$galderak= mysqli_query($connect, $sql);

	while ($row = mysqli_fetch_array($galderak, MYSQLI_ASSOC)){
			
		echo '<tr><td class="classEgilea">'.$row['Egilea'].'<td class="classGalderaID">'.$row['Zenbakia'].'<td class="classGaldera">'.$row['Galdera'].'<td class="classErantzuna">'.$row['Erantzuna'].'<td class="classGaia">'.$row['Gaia'].'<td class="classZailtasuna">'.$row['Zailtasuna'].'<td><button type="submit" class="button1">Edit</button>';	
		
	}
	
    mysqli_close($connect);
	
	$erabiltzaile = $_SESSION['login_user'];

	}
	?>
    </tbody>
  </table>

</div>
<br><br>
	<div class = "row">
		<div class="col-xs-6 col-xs-offset-3">
			<div id="emaitza">
				<form method="post" action="editQuestion.php">

					<div class = "row">
						<div class="col-xs-6 col-xs-offset-3"> 
							<P ALIGN="center"><j1>EDIT</j1></p><hr>
							<j2>Question</j2><br>
							<input type="text" class = "gald" id="gald" name="gald" size="35"/><br><br>
							<j2>Erantzuna</j2><br>
							<input type="text" id="er" name="er" size="35"> <br><br>
							<j2>Gaia</j2><br>
							<input type="text" id="gai" name="gai" size="35"><br><br>
							<j2>Difficulty</j2><br>
							<input type="text" id="zail" name="zail" size="35"><br><br>
							<j2>User</j2><br>
							<input type="text" class = "user" id="user" name="user" size="35"><br><br>
							<j2>Question ID</j2><br>
							<input type="text" class = "id" id="id" name="id" size="35"><br><br><br>
						</div>
					</div>
					<P ALIGN="center"><input type="submit" class="btn btn-primary" value="Save changes"/></p><br>
					<P ALIGN="center"><input type="submit" name="delete" class="btn btn-danger" value="Delete question"/></p>
				</form>
				
			</div>
		</div>
	</div>
</body>
</html> 