<?php
// login.php
require 'db.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL query to fetch the user
    $sql = "SELECT * FROM users WHERE username = ?";
    
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify the password
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username; // Store username in session
            header("Location: index2.html"); // Redirect to user dashboard
            exit();
        } else {
            echo "Invalid username or password!";
        }
    } else {
        echo "Error: " . $pdo->errorInfo()[2];
    }
}
?>
