<!DOCTYPE HTML>
<html>
<?php session_start(); ?>
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

	j1{
		color: black;
		font-family: 'Poiret One';
		font-size: 250%;
	}

	.button {
		align: center;
		border: 1px solid black;
		color: white;
		padding: 10px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
		background-color: #e7e7e7;
		color: black;
	}
	
	j3{
		font-family: 'Roboto', sans-serif;
		font-size: 100%;
	}
	
	</style> 
	
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<title> Sign In </title>
	
	<div class="container">
		<div class="jumbotron">
			<p align= 'center'><j1>SignIn</j1></p>
		</div>
		
	<span class="right"><strong><P ALIGN=center><a href="destroysession.php">Back</a></p></strong></span>
	<br>
	</div>
	
	<script>
	
		function baliozkoa(){
			
				var i = fieldsEmpty(i);
				
				if (i == 1){
					v = 1;
					alert("Fill the required gaps!");
					return false;
				}
		}
		
		function fieldsEmpty(v){			       
				var frm = document.getElementById("erregistro");
				
				for(i=1;i<frm.elements.length-1;i++){
                    if(frm.elements[i].value.length==0){
						return 1;
                    }
                 }	 
			return 0;
		}
			
	</script>
	
</head>

<body>

	<div class="container">
		
		<div class="row">
			
			<div class = "col-sm-6 col-sm-offset-3">
			
				
			
				<form id="login" name="login" method="post"  onSubmit="return baliozkoa()" action="SignIn.php" enctype="multipart/form-data">

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="e" type="text" class="form-control" name="Email" placeholder="Email">
					</div>

					<div class="input-group">
 
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="p" type="password" class="form-control" name="Password" placeholder="Password">
					
					</div>
					
					<br>
					
					<div align = "center" style = "color:red" id = "saiakerak"></div><br>
					
					<br>

					<strong><span class="right"><p align="center"><a href="setNewPassword.html">Do you forget your password?</a></p></span></strong><br>
					
					<p align="center"><button type="submit" id="loginb" class="btn btn-primary"><j3>Login<j3></button></p><br>	

				</form>
				
			</div>
		</div>
	</div>

</body>

</html>

<?php

	if(isset($_SESSION['saiakerak'])){
		
		if($_SESSION['saiakerak'] == -1){
			?><script> document.getElementById('saiakerak').innerHTML = "Something went wrong in your login";
			</script><?php
		}else{
			$k = $_SESSION['saiakerak'];
				
			if($k < 3){
				?><script> 
					document.getElementById('saiakerak').innerHTML =  "Gelditzen zaizun saiakera kopurua: <?php echo $k = 3 - $k; ?>"; 
					document.getElementById('p').style.border = "2px solid red";
				  </script>
				<?php
			}else{
				?>
					<script> 
						document.getElementById('e').style = "opacity: 0.5; cursor: not-allowed;  pointer-events: none;";
						document.getElementById('p').style = "opacity: 0.5; cursor: not-allowed;  pointer-events: none;";
						document.getElementById('loginb').textContent = "Beste erabiltzaile batekin sartu";
						document.getElementById('saiakerak').innerHTML = "Zure erabiltzailea blokeatuta dago administratzaileak esan arte";
					</script>
				<?php			
			}
		}
	}
	
?>