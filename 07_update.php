<?php
	require_once "connectioninquiry.php";

	// Check if an ID is provided in the URL
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		// Fetch the existing student data to pre-fill the form
		$sql = "SELECT * FROM student WHERE ID = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();

		// If the student record is found, fetch the data
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
		} else {
			echo "Record not found.";
			exit;
		}

		$stmt->close();
	} else {
		echo "Invalid request. No ID provided.";
		exit;
	}

	// Check if the form is submitted
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$name = $_POST['name'];
		$program = $_POST['program'];
		$contact = $_POST['contact'];

		// Prepare and execute the update query
		$sql = "UPDATE student SET Name = ?, Program = ?, Contact = ? WHERE ID = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sssi", $name, $program, $contact, $id);
		$result = $stmt->execute();

		// Check if the update was successful
		if ($result) {
			// Redirect to the main page after updating
			header("Location: index.php"); // Redirect to the main page (adjust as needed)
			exit;
		} else {
			// If the query failed, show an error message
			echo "Error updating record: " . $stmt->error;
		}

		$stmt->close();
	}

	$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Student Information</title>
</head>
<body>

	<h1 style="text-align:center;">Update Student Information</h1>

	<form method="POST" action="updateinquiry.php?id=<?php echo $id; ?>">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" value="<?php echo htmlspecialchars($row['Name']); ?>" required><br><br>

		<label for="program">Program:</label>
		<select name="program" id="program" required>
			<option value="PGDCA" <?php echo ($row['Program'] == 'PGDCA') ? 'selected' : ''; ?>>PGDCA</option>
			<option value="BCA" <?php echo ($row['Program'] == 'BCA') ? 'selected' : ''; ?>>BCA</option>
			<option value="BBA" <?php echo ($row['Program'] == 'BBA') ? 'selected' : ''; ?>>BBA</option>
			<option value="BIM" <?php echo ($row['Program'] == 'BIM') ? 'selected' : ''; ?>>BIM</option>
		</select><br><br>

		<label for="contact">Contact:</label>
		<input type="text" name="contact" id="contact" value="<?php echo htmlspecialchars($row['Contact']); ?>" required><br><br>

		<input type="submit" value="Update">
	</form>

</body>
</html>
