<?php
session_start();

// Database connection parameters
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "prison"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check credentials
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.html"); // Redirect to dashboard or another page
        exit();
    } else {
        // Login failed 
        $_SESSION['error'] = "Invalid username or password. Please try again.";
         header("Location: login.html"); // Redirect back to login page
         exit();
    }
}

// Close connection
$conn->close();

// Display error message if set
if (isset($_SESSION['error'])) {
    echo "<p>{$_SESSION['error']}</p>";
    unset($_SESSION['error']); // Remove the error message after displaying it
}
?>