	<?php
	require_once "01_db_conn.php";

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		// Use prepared statements to prevent SQL injection
		$sql = "SELECT * FROM student WHERE ID = $id";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Update Student Information</title>
	</head>
	<body>
		<form name="Contact Form" method="post" action="08_update_db.php">
			<input type="hidden" name="id" value="<?php echo $row['ID'];?>">

			<label for="name">Name</label>
			<input id="name" type="text" name="name" value="<?php echo $row['Name'];?>" placeholder="Enter your name" required> <br><br>

			<label for="program">Program</label>
			<select id="program" name="program">
				<option value="PGDCA" <?php echo ($row['Program'] == 'PGDCA') ? 'selected' : ''; ?>>PGDCA</option>
				<option value="BCA" <?php echo ($row['Program'] == 'BCA') ? 'selected' : ''; ?>>BCA</option>
				<option value="BBA" <?php echo ($row['Program'] == 'BBA') ? 'selected' : ''; ?>>BBA</option>
				<option value="BIM" <?php echo ($row['Program'] == 'BIM') ? 'selected' : ''; ?>>BIM</option>
			</select> <br><br>

			<label for="contact">Number</label>
			<input id="contact" type="tel" name="contact" value="<?php echo $row['Contact']; ?>" placeholder="Enter your number" pattern="^\d{10}$" required> <br><br>

			<input type="submit" value="Update"> <br><br> 
		</form>
	</body>
	</html>
