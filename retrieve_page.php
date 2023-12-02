<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the HTML content from the database
$sql = "SELECT content FROM pages ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Fetch the content and display it
  $row = $result->fetch_assoc();
  $pageContent = $row['content'];

  echo $pageContent;
} else {
  echo "No pages found.";
}

$conn->close();
