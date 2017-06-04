<?php 
	include 'mysql_connect.php';

	$connect = mysqli_connect($host, $user, $pass, $db);
	mysqli_query($connect, "SET CHARACTER SET UTF8") or
		die("Error, ei saa andmebaasi charsetti seatud.");

	$User = mysqli_real_escape_string($connect, $_REQUEST['User']);
	$Note = mysqli_real_escape_string($connect, $_REQUEST['Note']);

	$sql = "INSERT INTO hp_notes (user, note) VALUES ('$User', '$Note')";

    if (mysqli_query($connect, $sql)) {
		echo "<p>Kirje andmebaasi edukalt lisatud.</p>";
	}
	mysqli_close($connect);

?>

<script type="text/javascript">
    window.setTimeout(function() {
        window.location.href='index.php';
    }, 1000);
</script>