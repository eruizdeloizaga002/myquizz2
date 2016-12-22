<?php session_start();

if(isset($_SESSION['login_user'])){
	
	unset($_SESSION['Score']);
	
	header("Location: layout2.php");
	
}else{
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]
		);
	}
	
	session_unset();
	$_SESSION = array();
		
	session_destroy();
		
	header("Location: index.html");
	}
?>