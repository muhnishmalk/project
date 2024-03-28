<?php
session_start();

// Connect to MySQL database
$conn = new mysqli("localhost", "newuser", "root@123", "project");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Retrieve user data from database
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username; // Set session variable
        header("Location: index.html"); // Redirect to main page
    } else {
        echo "Invalid username or password";
    }
} else {
    echo "User not found";
}

$conn->close();
?>
