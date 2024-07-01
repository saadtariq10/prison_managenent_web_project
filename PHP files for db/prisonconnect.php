<?php
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
    $prison_name = $_POST['prison-name'];
    $capacity = $_POST['capacity'];
    $security_level = $_POST['security-level'];
    $description = $_POST['description'];

    // Insert data into database
    $sql = "INSERT INTO prisons (prison_name, capacity, security_level, description)
            VALUES ('$prison_name', '$capacity', '$security_level', '$description')";

    if ($conn->query($sql) === TRUE) {
        header("Location: prisonlist.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve data from database
$sql_retrieve = "SELECT * FROM prisons";
$result = $conn->query($sql_retrieve);
if ($result->num_rows > 0) {
    echo "<table><tr><th>Prison Name</th><th>Prison Capacity</th><th>Security Level</th><th>Description</th>";
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["prison_name"] . "</td><td>" . $row["capacity"] . "</td><td>" . $row["security_level"] . "</td><td>" . $row["description"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>