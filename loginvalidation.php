<?php
session_start();
require './inc/header.php';
require './inc/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $password = hash('sha512', $_POST['password']);
    
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->rowCount() == 1) {
        $user = $result->fetch(PDO::FETCH_ASSOC);
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['Email'] = $user['Email'];
        $_SESSION['gender'] = $user['gender'];

        header("Location: profile.php");
    } else {
        echo "  Invalid email or password";
    }
}
?>
