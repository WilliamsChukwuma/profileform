<?php
session_start();
require './inc/header.php';
require './inc/database.php';

$full_name = $_POST['fullname'];
$email = $_POST['Email'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$ok = true;

if ($password != $confirmPassword) {
    echo '<strong>Passwords do not match. Please try again.</strong>';
    $ok = false;
}

if ($ok) {
    $password = hash('sha512', $password);
    
    // Prepare statement to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO user (fullname, Email, Gender, password) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$full_name, $email, $gender, $password])) {
        $_SESSION['fullname'] = $full_name;
        $_SESSION['email'] = $email;
        $_SESSION['gender'] = $gender;

        header("Location: profile.php");
        exit();
    } else {
        echo '<p class="invalidP">Error occurred during sign-up. Please try again.</p>';
    }
}

require './inc/footer.php';
?>
