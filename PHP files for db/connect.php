<?php
// Step 1: Establish database connection
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "prison"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if data is being sent via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 2: Retrieve form data
    $name = $_POST['name'];
    $cell = $_POST['cell'];
    $crime = $_POST['crime'];
    $sentence = $_POST['sentence'];
    $address = $_POST['address'];
    $marital_status = $_POST['marital-status'];
    $sex = $_POST['sex'];
    $complexion = $_POST['complexion'];
    $eye_color = $_POST['eye-color'];
    $start_date = $_POST['start-date'];
    $end_date = $_POST['end-date'];
    $emergency_contact = $_POST['emergency-contact'];

    // Step 3: Sanitize and validate input data (you may use additional validation as needed)

    // Step 4: Construct SQL INSERT statement
    $sql = "INSERT INTO Inmates (name, cell_number, crime, sentence_years, address, marital_status, sex, complexion, eye_color, start_date, end_date, emergency_contact)
            VALUES ('$name', '$cell', '$crime', '$sentence', '$address', '$marital_status', '$sex', '$complexion', '$eye_color', '$start_date', '$end_date', '$emergency_contact')";

    // Step 5: Execute SQL INSERT statement
    if ($conn->query($sql) === TRUE) {
        header("Location: inmatelist.php");
    exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search = $_GET['search'];
    // Construct SQL query to search for inmates by name
    $sql = "SELECT * FROM Inmates WHERE name LIKE '%$search%'";
} else {
    // Retrieve all inmates if no search query is provided
    $sql = "SELECT * FROM Inmates";
}

// Execute SQL query
$result = $conn->query($sql);

// Display data in HTML table
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Cell Number</th><th>Crime</th><th>Sentence (Years)</th><th>Address</th><th>Marital Status</th><th>Sex</th><th>Complexion</th><th>Eye Color</th><th>Start Date</th><th>End Date</th><th>Emergency Contact</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["cell_number"]."</td><td>".$row["crime"]."</td><td>".$row["sentence_years"]."</td><td>".$row["address"]."</td><td>".$row["marital_status"]."</td><td>".$row["sex"]."</td><td>".$row["complexion"]."</td><td>".$row["eye_color"]."</td><td>".$row["start_date"]."</td><td>".$row["end_date"]."</td><td>".$row["emergency_contact"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Step 8: Close connection
$conn->close();
?>
