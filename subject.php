<?php session_start();

	if($_POST['Gaia']!= " "){
		
		$_SESSION['Gaia'] = $_POST['Gaia'];
		
		$_SESSION['Score'] = -1;

		header("Location: playGame.php");
	}
?>