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
    $visitor_name = $_POST['visitor_name'];
    $visitor_contact = $_POST['visitor_contact'];
    $inmate_name = $_POST['inmate_name'];
    $relationship = $_POST['relationship'];
    $visit_date = $_POST['visit_date'];
    $visit_time = $_POST['visit_time'];

    // Insert data into database
    $sql = "INSERT INTO visitors (visitor_name, visitor_contact, inmate_name, relationship, visit_date, visit_time)
            VALUES ('$visitor_name', '$visitor_contact', '$inmate_name', '$relationship', '$visit_date', '$visit_time')";

    if ($conn->query($sql) === TRUE) {
        header("Location: visitorlist.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve data from database
$sql_retrieve = "SELECT * FROM visitors";
$result = $conn->query($sql_retrieve);
if ($result->num_rows > 0) {
    echo "<table><tr><th>Visitor Name</th><th>Visitor Contact</th><th>Inmate Name</th><th>Relationship</th><th>Visit Date</th><th>Visit Time</th></tr>";
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["visitor_name"] . "</td><td>" . $row["visitor_contact"] . "</td><td>" . $row["inmate_name"] . "</td><td>" . $row["relationship"] . "</td><td>" . $row["visit_date"] . "</td><td>" . $row["visit_time"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>