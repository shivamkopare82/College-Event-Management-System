<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the HTML content from the form submission
$pageContent = $_POST['page_content'];

// Prepare and execute the SQL statement to store the HTML content in the database
$stmt = $conn->prepare("INSERT INTO pages (content) VALUES (?)");
$stmt->bind_param("s", $pageContent);
$stmt->execute();

$stmt->close();
$conn->close();

echo "Page saved successfully!";
?>
