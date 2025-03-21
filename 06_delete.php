<?php
	require_once "01_db_conn.php";

	// Check if an ID is provided in the URL
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		// Prepare and execute the delete query
		$sql = "DELETE FROM student WHERE ID = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i", $id);  // "i" stands for integer
		$result = $stmt->execute();

		// Check if the deletion was successful
		if ($result) {
			// Redirect back to the student information page or another page after deletion
			header("Location: index.php"); // Redirect to the main page (adjust as needed)
			exit;
		} else {
			// If the query failed, show an error message
			echo "Error deleting record: " . $stmt->error;
		}

		$stmt->close();
	} else {
		// If no ID is passed, show an error
		echo "Invalid request. No ID provided.";
	}

	$conn->close();
?>
