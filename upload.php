<?php

// require_once "db_conn.php";


if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK){
	// File details
	$fileName = $_FILES['file']['name']; // File name
	$fileTmp = $_FILES['file']['tmp_name']; // Temporary file path
	$fileSize = $_FILES['file']['size']; // File Size
	$fileType = $_FILES['file']['type']; // File type
	
	// echo "$fileName" .$fileTmp .$fileSize .$fileType;
	
	// Define the upload directory
	$uploadDir = "uploads/";
	
	// Create the directory if it doesn't exist
	if(!is_dir($uploadDir)){
		mkdir($uploadDir, 0755, true);
	}
	
	// Define thefull path to save the File
	$uploadPath = $uploadDir . basename($fileName);
	
	echo "$uploadPath";
	
	// Move the uploaded file to the desired location
	if(move_uploaded_file($fileTmp, $uploadPath)){
		echo "File uploaded successfully!";
		echo "File Name: " .basename($fileName);
		echo "File Size: " .$fileSize;
	}
}

?>
