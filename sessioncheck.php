<?php 
	// kasutatud koodijupid ja loogika: http://codingcyber.com/simple-login-script-php-and-mysql-64
	if (session_status() == PHP_SESSION_NONE) {
	 	session_start();
		//3.1.4 if the user is logged in Greets the user with message
		if (!empty($_SESSION['username'])){
		$username = $_SESSION['username'];
		// display the rest of the code
		 
		} else {
		// redirect to the login page
		header('Location: ' . $rootfolder . 'index.php');
		}
	}
 ?>