<?php
// Retrieve form data
$event_id = $_POST['event_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$branch = $_POST['branch'];
$college = $_POST['college'];
$amount = $_POST['amount'];

// Save registration data to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO registrations (event_id, name, email, branch, college, amount) VALUES ($event_id, '$name', '$email', '$branch', '$college', $amount)";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
