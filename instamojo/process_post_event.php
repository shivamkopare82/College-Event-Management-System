<?php
// Retrieve form data
$title = $_POST['title'];
$price = $_POST['price'];
$date = $_POST['date'];
$time = $_POST['time'];
$location = $_POST['location'];
$mentor = $_POST['mentor'];

// Process file upload
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

// Save event data to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO event (title, price, date, time, location, mentor, image) VALUES ('$title', $price, '$date', '$time', '$location', '$mentor', '$targetFile')";

if ($conn->query($sql) === TRUE) {
    echo "Event created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
