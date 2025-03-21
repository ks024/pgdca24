<?php
    require_once '01_db_conn.php';

    $name = $_POST['name'];
    $program = $_POST['program'];
    $contact = $_POST['contact'];
    
    $sql = "INSERT INTO students (name, program, contact) VALUES ('$name', '$program', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>