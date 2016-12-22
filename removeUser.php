<!DOCTYPE html>
<?PHP session_start(); ?>
<html>

<head> 

	<style type="text/css">
	
	
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
		background-color: #FF6347;
		color: white;
		font-family: 'Roboto', sans-serif;
		font-size: 90%;
		padding: 7px 25px;
	}
	
	.divcenter{
		position: fixed;
		left: 50%;
		top: 20%;
		transform: translate(-50%, -20%);
	}
	
	</style> 
	
	<title>Remove User</title>
	
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

				$("#emaitza").show();
				
				var row = $(this).closest("tr");
				
				var iz = row.find(".classIzena").text();
				var ab = row.find(".classAbizena").text();
				var er = row.find(".classErabiltzaile").text();

				$("#iz").val(iz);
				$("#ab").val(ab);
				$("#er").val(er);
				
			});
		});
		
	</script>

	
	
</head>

<body>

	<div class="container">
	
		<div class="jumbotron">
		  <p align='center'><j1>Remove User</j1><br></p>
		</div>
		<br>
		 
		<?php echo "<strong><p align='center'><a href='layout2.php'> Back </a></p></strong>"; ?>
		 
		<div class="row">
		  <table class="table table-hover">
			<thead>
			  <tr>
				<th>Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Speciality</th>
				<th> </th>
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
				header("Location: index.html");
			}else{
			
				$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server'); 
				$sql = "SELECT * FROM erabiltzaile";
				$galderak= mysqli_query($connect, $sql);

				while ($row = mysqli_fetch_array($galderak, MYSQLI_ASSOC)){
						
					echo '<tr><td class="classIzena">'.$row['Name'].'<td class="classAbizena">'.$row['Last Name'].'<td class="classErabiltzaile">'.$row['Email'].'<td>'.$row['Phone Number'].'<td>'.$row['Speciality'].'<td><button type="submit" class="button1">Delete</button>';
					
				}
				
				mysqli_close($connect);
				
				$erabiltzaile = $_SESSION['login_user'];

			}
			?>
			</tbody>
		  </table>
		</div>
	
			<div class = "row">
				<div class="col-xs-6 col-xs-offset-3">
					<div id="emaitza" class="divcenter">
					  <div class="alert alert-danger alert-dismissable">
						<a href="removeUser.php" class="close">×</a>
						<form method="post" action="deleteUser.php">
							  <div class="row">
								<div class="col-xs-8 col-xs-offset-2"> 
									<P ALIGN="center"><j2>Are you sure you want to delete this user?</j2></p><hr>
										<j3>Email:</j3><br><br>
										<input type="text" id="iz" name="iz" size="35"> <br><br>
										<input type="text" id="ab" name="ab" size="35"> <br><br>
										<input type="text" id="er" name="er" size="35"> <br><br>
								</div>
							  </div>
							<P ALIGN="center"><input type="submit" name="delete" class="btn btn-danger" value="Delete user"/></p>
						</form>
					  </div>
					</div>
				</div>
			</div>
	</div>
</body>
</html> 