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
	
	<style>
	
	j1{
		color: black;
		font-family: 'Poiret One';
		font-size: 250%;
	}
	
	</style>
	
</head>


<body> 

<div class="container">
<div class="jumbotron">
  <p align='center'><j1>Questions XML</j1></p>
</div>
<br><br>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Galdera</th>
        <th>Zailtasuna</th>
		<th>Gaia</th>
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

	//echo '<tr><td>'.$row['Galdera'].'</td><td>'.$row['Zailtasuna'].'</td><tr>';
	
	$xml = simplexml_load_file('galderak.xml');
	
	foreach ($xml->xpath('//assessmentItem') as $assessmentItem){
		
		foreach($assessmentItem->children() as $itemBody ){
			foreach($itemBody->children() as $p){
				echo '<tr><td>'.utf8_decode("$p").'</td>';
			}
		}

	echo '<td>'.utf8_decode("$assessmentItem[complexity]").'</td>';
	
	echo '<td>'.utf8_decode("$assessmentItem[subject]").'</td></tr>';
	
	}

	?>

	</tbody>
  </table>
</div>
	
	<?php echo "<p align = 'center'> <a href = 'layout.html'> Back </a> </p>"; ?>
  
</body> 
</html> 