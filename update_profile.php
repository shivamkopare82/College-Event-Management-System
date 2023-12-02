<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "project";

  $conn = new mysqli($servername, $username, $password, $database);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $username = $_POST["username"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $mobile = $_POST["mobile"];
  $address = $_POST["address"];
  $instagram_link = $row["instagram_link"];
  $linkedin_link = $row["linkedin_link"];
  $github_link = $row["github_link"];
  $usn = $_SESSION['username'];

  $sql = "UPDATE userform SET username='$username', email='$email', phone='$phone', mobile='$mobile', address='$address', instagram_link='$instagram_link', linkedin_link='$linkedin_link', github_link='$github_link'  WHERE username='$usn'";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['username'] = $username;
    header("Location: index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
