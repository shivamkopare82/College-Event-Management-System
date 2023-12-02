<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login_form.php");
    exit;
}

include 'conn.php'; // Include the database connection file

if (isset($_GET["usn"])) {
    $usn = $_GET["usn"];

    // Query to fetch events posted by the user
    $query = "SELECT * FROM pending_events WHERE usn = '$usn'";

    $result = $conn->query($query);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile</title>
        <!-- <link rel="stylesheet" href="css/style.css"> -->
    </head>

    <body>
        <h1>Welcome to Your Profile</h1>
        <h2>Your Posted Events:</h2>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $event_id = $row['event_id'];
                $event_title = $row['event_title'];
                $event_price = $row['event_price'];

                echo "<div class='event'>";
                echo "<h3>Event ID: $event_id</h3>";
                echo "<p>Event Title: $event_title</p>";
                echo "<p>Event Price: $event_price</p>";
                // ...
                echo "</div>";
            }
        } else {
            echo "<p>No events found.</p>";
        }

        $conn->close();
        ?>

    </body>

    </html>

<?php
} else {
    echo "<p>User identifier not found.</p>";
}
?>