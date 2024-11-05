<?php
// signup.php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL query to insert the new user
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->execute([$username, $hashedPassword, $email]);
        header("Location: login.html");
    } else {
        echo "Error: " . $pdo->errorInfo()[2];
    }
}
?>
