<!DOCTYPE html>
<?PHP session_start(); ?>
<html>
<head> 
	<style type="text/css">
	
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
	
	div.absolute {
    position: absolute;
    top: 80px;
    right:250px;
    width: 250px;
    height: 100px;
   	}
	
	</style> 
	
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One" rel="stylesheet">
	
	<h1 ALIGN=center> Reviewing Questions </h1>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	
	<script>
	
		$(document).ready(function(){
        $("#emaitza").hide();
		});
		
	$( function() {
		$(".button").on("click", function(){

			$("#emaitza").show();
			
			var row = $(this).closest("tr");
			
			var id = row.find(".classGalderaID").text();
			var user = row.find(".classEgilea").text();
			var question = row.find(".classGaldera").text();
			var answer = row.find(".classErantzuna").text();
			var difficulty = row.find(".classZailtasuna").text();
			var subject = row.find(".classGaia").text();
			
			//$("#gald").val(id);
			//$("#mailIN").html(mail);
			//$("#emailIN").val(mail);
			
			$("#gald").val(question);
			$("#er").val(answer);
			$("#gai").val(subject);
			$("#zail").val(difficulty);
			
			$("#user").val(user);
			$("#id").val(id);
			
			//$( "#dialog" ).dialog( "open" );
		});
	});
	</script>
</head>

<body>

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
	$sql = "SELECT * FROM galderak";
	$galderak= mysqli_query($connect, $sql);
	
	echo '<table border=1><tr><th> Egilea </th><th> GalderaID </th><th> Galdera </th><th> Erantzuna </th><th> Gaia </th><th> Zailtasuna </th><th> Editatu </th></tr>';
	
	while ($row = mysqli_fetch_array($galderak, MYSQLI_ASSOC)){
			
		echo '<tr><td class="classEgilea">'.$row['Egilea'].'<td class="classGalderaID">'.$row['Zenbakia'].'<td class="classGaldera">'.$row['Galdera'].'<td class="classErantzuna">'.$row['Erantzuna'].'<td class="classGaia">'.$row['Gaia'].'<td class="classZailtasuna">'.$row['Zailtasuna'].'<td><input class="button" type="submit"  value="Edit">';	
		
	}
	
	echo '</table>';
    mysqli_close($connect);
	
	echo "<a href='layout2.html'> Back </a>";
	
?>

	<div class = "absolute" id="emaitza">
	
	<form method="post" action="editQuestion.php">
	<br>
	<h1> EDIT</h1>
	
		Question:<br>
		<input type="text" class = "gald" id="gald" name="gald" /> <br>
		Erantzuna:<br>
		<input type="text" id="er" name="er"> <br>
		Gaia:<br>
		<input type="text" id="gai" name="gai"><br>
		Difficulty:<br>
		<input type="text" id="zail" name="zail"><br>
		
		<input type="text" class = "user" id="user" name="user">
		<input type="text" class = "id" id="id" name="id">
		
		<P ALIGN=centre><input type="submit" value="Save changes"></p>
		
		
		
	</form>
	
	</div>
	
</body>
</html> 