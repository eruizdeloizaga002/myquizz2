<!DOCTYPE html>
<html>
	
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
	</style> 

	
	<head>
		<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One" rel="stylesheet">
		
		<title>	simpleSignUp.html </title>

		<h1 ALIGN=center> TESTING </h1>
		
	</head>

	<body>
		
		<form id="erregistro" name="erregistro" method = "post" action = "testing.php">

		<fieldset>
			
			<legend> Personal information: </legend><br>
			
			E-mail:* <br>
			<input type="text" name="Email" id="e"><br><br>
			
			<div id ="h" style="visibility:hidden;"><a href = 'handlingQuizes.php'>Handling Quizes</a></div>
		
			<P ALIGN=center><input type="submit" value="Submit"></input></p>

			</fieldset>
		</form>
			<span class="right"><P ALIGN=center><a href="layout.html">Back</a></p></span>
	</body>

</html>


<?php
	
	if($_POST['Email'] == "Hola"){
		?>
		<script> document.getElementById('h').style.visibility = "visible"; </script>
		<?php
	}
	
?>