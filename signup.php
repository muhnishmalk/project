<?php
// Connect to MySQL database
$conn = new mysqli("localhost", "newuser", "root@123", "project");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user data into database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    // User registered successfully
    // Redirect to index page
    header("Location: index.html");
    exit(); // Make sure to exit after redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
