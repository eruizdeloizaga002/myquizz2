<?php session_start();
		if(isset($_SESSION['login_user'])){
			header("Location: game.php");
		}else{
			header("Location: nickName.html");
		}		
?>