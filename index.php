<!DOCTYPE html>
<html>
	<head>
		<title>i244 eksam</title>
		<meta charset="UTF-8">
	</head>

	<body>

	<?php session_start(); //Start the Session
		$host = "localhost";
	   $user = "test";
	   $pass = "t3st3r123";
	   $db = "test";
		
		$connect = mysqli_connect($host, $user, $pass, $db);
		mysqli_query($connect, "SET CHARACTER SET UTF8") or
			die("Error, ei saa andmebaasi charsetti seatud.");
		// kasutatud koodijupid ja loogika: http://codingcyber.com/simple-login-script-php-and-mysql-64
		//3. If the form is submitted or not.
		//3.1 If the form is submitted
		if (isset($_POST['username']) and isset($_POST['password'])){
		//3.1.1 Assigning posted values to variables.
			$username = mysqli_real_escape_string($connect, $_POST['username']);
			$password = mysqli_real_escape_string($connect, $_POST['password']);
			//3.1.2 Checking the values are existing in the database or not
			$query = "SELECT * FROM hp_noteusers WHERE username='$username' and password='$password'";
			 
			$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
			$count = mysqli_num_rows($result);
			//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
				if ($count == 1){
				$_SESSION['username'] = $username;
				} else {
				//3.1.3 If the login credentials doesn't match:
				$message = "Vale kasutajanimi või parool.";
				}
		}
		//3.1.4 if the user is logged in...
		if (isset($_SESSION['username'])){
		$username = mysqli_real_escape_string($connect, $_SESSION['username']);
		header("Location: main.php");
		 
		} else { 
	?>
		<div class="center">
			<form action="" method="post">
				<input class="form" type="text" name="username" placeholder="kasutajanimi" /><br />
				<input class="form" type="password" name="password" placeholder="parool" /><br />
				<input type="submit" value="Logi sisse" name="submit"/>
			</form>
		</div>
	<?php
		}
	 
	?>


	</body>
</html>
