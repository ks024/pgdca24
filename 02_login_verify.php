<?php
    session_start();
    require_once '01_db_conn.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header('Location: 03_home.php');
    } else {
        echo "Invalid username or password";
    }

?>