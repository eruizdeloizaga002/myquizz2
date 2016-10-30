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

	<body>
		
		<fieldset>
			<div class="row">
			
			<div class="block">
				<button class="button" onmousedown="changeBack(this,'gray')" onmouseup="changeBack(this,'rgb(19,122,212)')" type="button" onclick="location.href='layout2.html'">Home</button>
			</div>
			
			<div class="block">
			<form action="InsertQuestion.html">
				<button class="button" onmousedown="changeBack(this,'gray')" onmouseup="changeBack(this,'rgb(19,122,212)')" type="button" onClick = "insertQuestion()">Insert Question</button>
			</form>
			</div>
	
			<div class="block">
				<button class="button" onmousedown="changeBack(this,'gray')" onmouseup="changeBack(this,'rgb(19,122,212)')" type="button"  onClick ="nireGalderakIkusi()">Show my questions</button>
			</div>
			
			<div class="block">
				<button class="button" onmousedown="changeBack(this,'gray')" onmouseup="changeBack(this,'rgb(19,122,212)')" type="button" onclick="location.href='layout2.html'">All questions</button>
			</div>
			</div>
	
		</fieldset>
		
		<div id = "emaitza">
		
		</div>
		
	</body>

</html>