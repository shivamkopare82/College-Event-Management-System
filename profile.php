<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login page or any other appropriate page
    header("Location: login_form.php");
    exit();
}

// Retrieve user details from the database based on the session user ID
$user_id = $_SESSION['id'];

// Your database connection code here

$sql = "SELECT * FROM userform WHERE id = $user_id";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    // User not found
    echo "User not found";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Profile</title>
</head>
<body>
  <h2>User Profile</h2>
  <h3>User Details</h3>
  <p>Email: <?php echo $user['email']; ?></p>
  <p>Name: <?php echo $user['name']; ?></p>
  <!-- Display other user details as needed -->
</body>
</html>
