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
    $block_name = $_POST['block-name'];
    $capacity = $_POST['capacity'];
    $security_level = $_POST['security-level'];
    $floor = $_POST['floor'];
    $building = $_POST['building'];
    $description = $_POST['description'];

    // Insert data into database
    $sql = "INSERT INTO cellblocks (block_name, capacity, security_level, floor, building, description)
            VALUES ('$block_name', '$capacity', '$security_level', '$floor', '$building', '$description')";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully
        header("Location: cellblocklist.php");
        exit();
    } else {
        // Error occurred during insertion
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve data from database
$sql_retrieve = "SELECT * FROM cellblocks";
$result = $conn->query($sql_retrieve);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Block Name</th>
                <th>Capacity</th>
                <th>Security Level</th>
                <th>Floor</th>
                <th>Building</th>
                <th>Description</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["block_name"]."</td>
                <td>".$row["capacity"]."</td>
                <td>".$row["security_level"]."</td>
                <td>".$row["floor"]."</td>
                <td>".$row["building"]."</td>
                <td>".$row["description"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No cell blocks found.</p>";
}

// Close connection
$conn->close();
?>

