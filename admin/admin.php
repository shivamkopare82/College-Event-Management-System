<?php
session_start();

// Check if the admin is logged in, redirect to login.php if not
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: ../login_form.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
    .table-container {
        padding-top: 20px;
        margin-left: 225px;
        transition: margin-left 0.5s ease;
    }

    @media (max-width: 768px) {
        .table-container {
            margin-left: 0;
        }
    }

    .course-detail {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
</head>





<?php require 'nav.php'; ?>


<div class="content">
    <div class="container table-container">
        <?php
        include '../conn.php';

        // Retrieve pending events from the database
        $selectQuery = "SELECT * FROM pending_events";
        $result = $conn->query($selectQuery);

        if ($result->num_rows > 0) { ?>
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Event ID</th>
                        <th>Event Title</th>
                        <th>Event Price</th>
                        <th>Image Link</th>
                        <th>Type ID</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Mentor 1</th>
                        <th>Mentor 2</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["event_id"] . "</td>";
                        echo "<td>" . $row["event_title"] . "</td>";
                        echo "<td>" . $row["event_price"] . "</td>";
                        echo '<td class="course-detail">' . $row['img_link'] . '</td>';
                        echo "<td>" . $row["type_id"] . "</td>";
                        echo "<td>" . $row["Date"] . "</td>";
                        echo "<td>" . $row["time"] . "</td>";
                        echo "<td>" . $row["Location"] . "</td>";
                        echo "<td>" . $row["sname"] . "</td>";
                        echo "<td>" . $row["st_name"] . "</td>";

                        // Add approve and reject buttons for each event
                        echo "<td>";
                        echo "<form action='process_event.php' method='post'>";
                        echo "<input type='hidden' name='event_id' value='" . $row["event_id"] . "'>";
                        echo "<input type='submit' name='approve' value='Approve' class='btn btn-success me-2'>";
                        echo "<input type='submit' name='reject' value='Reject' class='btn btn-danger'>";
                        echo "</form>";
                        echo "</td>";

                        echo "</tr>";
                    }
                    ?>
                </tbody>

            </table>
        <?php
        } else {
            echo "No pending events.";
        }

        $conn->close();
        ?>
    </div>
</div>




</body>

</html>