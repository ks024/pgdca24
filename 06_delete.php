<?php
	require_once "01_db_conn.php";

	// Check if an ID is provided in the URL
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		// Prepare and execute the delete query
		$sql = "DELETE FROM student WHERE ID = $id";
		
		$result = $conn->query($sql);
		
		if ($result) {
			header("Location: 05_data_display.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		// If no ID is passed, show an error
		echo "Invalid request. No ID provided.";
	}
?>
