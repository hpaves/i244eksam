<!DOCTYPE html>
<html>
	<head>
		<title>i244 eksam</title>
		<meta charset="UTF-8">
	</head>

	<body>

	<form action="mysql_input.php" method="POST">
		<input type="text" name="User" placeholder="kasutajanimi" required><br>		
		<input type="text" name="Note" placeholder="note" required><br>
		<button type="submit">Lisa märge!</button> <a href="logout.php">logi välja</a><br>
	</form>
	<?php require 'sessioncheck.php'; ?>
	<?php 
		$host = "localhost";
	   $user = "test";
	   $pass = "t3st3r123";
	   $db = "test";

		$connect = mysqli_connect($host, $user, $pass, $db);
		mysqli_query($connect, "SET CHARACTER SET UTF8") or
			die("Error, ei saa andmebaasi charsetti seatud");

      $sql = "SELECT * FROM hp_notes WHERE `user`='$username'";
		$result = $connect->query($sql);
			
	   if ($result->num_rows > 0) {
	       while($row = $result->fetch_assoc()) {
	           echo "<strong>" . htmlspecialchars($row["user"]). ":</strong> " . htmlspecialchars($row["note"]). "<br />";
	       }
	   } else {
	   	echo "0 results";
	   }
		
	   mysqli_close($connect);
	?>

	</body>
</html>
