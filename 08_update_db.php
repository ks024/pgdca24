<?php
require_once "01_db_conn.php";

// Collect form data from the POST request
$id = $_POST['id'];
$name = $_POST['name'];
$program = $_POST['program'];
$contact = $_POST['contact'];

// Create the SQL query (no escaping or security checks)
$sql = "UPDATE student SET Name = '$name', Program = '$program', Contact = '$contact' WHERE ID = $id";

// Execute the query
if ($conn->query($sql)) {
    // Redirect if the update was successful
    header("Location: 05_data_display.php");
    exit();  // Always use exit() after a header redirect
} else {
    // Output an error if the query failed
    echo "Error: " . $conn->error;
}
?>
