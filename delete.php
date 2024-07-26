<?php
require './inc/database.php';
session_start();

if (!isset($_SESSION['Email'])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['Email'];

// Delete user profile image
$deleteImageQuery = "DELETE FROM uploadImages WHERE email = ?";
$deleteImageStatement = $conn->prepare($deleteImageQuery);
$deleteImageStatement->execute([$email]);

// Delete user profile
$deleteUserQuery = "DELETE FROM user WHERE Email = ?";
$deleteUserStatement = $conn->prepare($deleteUserQuery);
$deleteUserStatement->execute([$email]);

// Destroy session and redirect to index page
session_destroy();
header("Location: index.php");
exit();
?>
