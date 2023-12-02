<?php
session_start(); // Start the session

include 'conn.php';

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $query = "SELECT COUNT(*) AS event_count FROM events WHERE event_id IN (
                 SELECT event_id FROM pending_events WHERE id = $user_id
              )";

    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    $eventCount = $row['event_count'];

    echo "User {$_SESSION['username']} has created $eventCount events.";
} else {
    echo "User not logged in.";
}

$conn->close();
?>
