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

if (!empty($_FILES["image"]["name"])) {
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a valid image
    $validExtensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $validExtensions)) {
        echo "Error: Invalid file format. Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit;
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error: Failed to upload the file.";
        exit;
    }
} else {
    // Handle the case where no file was uploaded
    $targetFile = ""; // Set an empty value for the image file
}

// Save event data to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to prevent SQL injection
$sql = "INSERT INTO pending_events (title, price, date, time, location, mentor, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $title, $price, $date, $time, $location, $mentor, $targetFile);

if ($stmt->execute()) {
    echo "Event created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
