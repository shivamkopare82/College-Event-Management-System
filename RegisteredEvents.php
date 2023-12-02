<?php
$usn = $_POST['id'];
include_once 'conn.php';

$registeredResult = mysqli_query($conn, "SELECT * FROM registered r, staff_coordinator s, event_info ef, student_coordinator st, events e WHERE e.event_id = ef.event_id AND e.event_id = s.event_id AND e.event_id = st.event_id AND r.id = '$usn' AND r.event_id = e.event_id");

?>

<div class="content">
    <div class="container">
        <h1>Registered Events</h1>
        <?php
        if (mysqli_num_rows($registeredResult) > 0) {
        ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Event_name</th>
                        <th>Mentor 1</th>
                        <th>Mentor 2</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    $eventName = $row["event_name"];
                    $eventDate = $row["event_date"];
                    $eventLocation = $row["event_location"];

                    echo '<li class="list-group-item">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-4">';
                    echo '<h6 class="mb-0">Event Name:</h6>';
                    echo '</div>';
                    echo '<div class="col-sm-8">';
                    echo '<p class="mb-0">' . $eventName . '</p>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col-sm-4">';
                    echo '<h6 class="mb-0">Event Date:</h6>';
                    echo '</div>';
                    echo '<div class="col-sm-8">';
                    echo '<p class="mb-0">' . $eventDate . '</p>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col-sm-4">';
                    echo '<h6 class="mb-0">Event Location:</h6>';
                    echo '</div>';
                    echo '<div class="col-sm-8">';
                    echo '<p class="mb-0">' . $eventLocation . '</p>';
                    echo '</div>';
                    echo '</div>';

                    echo '</li>';
                }

                echo '</ul>';
            } else {
                echo '<p>No registered events found.</p>';
            }
                ?>
                </tbody>
            </table>

    </div>
</div>