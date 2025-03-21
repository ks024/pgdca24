<?php
	session_start();
	
	// Check if the user is logged in
	if(!isset($_SESSION['username']))
	{
		header("Location:login.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form with PHP</title>
</head>
<body>

<h1>Contact Form</h1>

<!-- Form for user input -->
<form name="Contact Form" method="post" action="04_data_insert_db.php">

	<label for="name">Name:</label>
	<input type="text" id="name" name="name" placeholder="Enter your name" required><br><br>
	
	<label for="program">Program:</label>
	<select name="program" id="program" required>
		<option value="PGDCA">PGDCA</option>
		<option value="BCA">BCA</option>
		<option value="BBA">BBA</option>
		<option value="BIM">BIM</option>
	</select><br><br>
	
	<label for="contact">Number:</label>
	<input type="tel" id="contact" name="contact" placeholder="Enter your number" required pattern="[0-9]{10}"><br><br>
	
	<input type="submit" value="Insert"><br><br>
	
</form>

<!-- Logout link -->
<a href="logout.php">Logout</a>

</body>
</html>
