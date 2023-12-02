<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: login.php");
    exit();
}

require '../conn.php';

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    $delete_query = "DELETE FROM events WHERE event_id = $event_id";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        echo "Event deleted successfully.";
        header("Location: event_detail.php");
    } else {
        echo "Failed to delete the event. Please try again.";
    }
} else {
    header("Location: admin.php");
    exit();
}

?>
