<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username_or_email = $_POST['username_or_email'];
$password = $_POST['password'];

// Query the database
$sql = "SELECT * FROM users WHERE (username = '$username_or_email' OR email = '$username_or_email') AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login successful
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username_or_email;
    header("Location: dashboard.php"); // Redirect to dashboard or home page
} else {
    // Login failed
    $_SESSION['login_error'] = "Invalid username/email or password";
    header("Location: login.html"); // Redirect back to login page
}

// Close connection
$conn->close();
?>