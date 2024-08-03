<?php
$server = "sql105.infinityfree.com"; 
$username = "if0_36995341";
$password = "YXaAY2HBAKe6pG";
$dbname = "if0_36995341_williamscode";

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
