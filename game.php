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
		
		xhttp = new XMLHttpRequest();
      
			xhttp.onreadystatechange = function(){
				if(xhttp.readyState==4){
					var obj = document.getElementById('emaitza');
					obj.innerHTML = xhttp.responseText;
				}
			}
		
		function sartuGaiak(){
			xhttp.open("GET",'importatuGaiak.php');
			xhttp.send(null);
		}
			
		function getItem(v){
				
				var element =  document.getElementById(v).textContent;
				
				document.getElementById('subject').value = element;
				
				document.getElementById("gaia").submit();

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
		font-size: 150%;
	}
	
	</style>

</head>

<body onLoad = "sartuGaiak()"> 
  
<div class="container">
<div class="jumbotron">
  <p align='center'><j1>Select a subject</j1></p>
</div>
<strong><span class="right"><P ALIGN=center><a href="destroysession.php">Home</a></p></span></strong>
<br>
<div class="row">
<div class="col-xs-6 col-xs-offset-3">
  <div class="list-group">
    
		<div id = "emaitza"></div>
	
   </div>
 </div>
</div>
</div>  
  
	<form id="gaia" method="post" action="subject.php" enctype="multipart/form-data">
  
		<input type="text" id="subject" name="Gaia" style="visibility: hidden"></input>
   
	</form>

</body> 
</html> 