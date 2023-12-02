<?php
require '../conn.php';
$result = mysqli_query($conn, "SELECT * FROM staff_coordinator s ,event_info ef ,student_coordinator st,events e where e.event_id= ef.event_id and e.event_id= s.event_id and e.event_id= st.event_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
      .table-container {
            padding-top: 20px;
            margin-left: 225px; /* Adjusted to match the width of the sidebar */
            transition: margin-left 0.5s ease; /* Added transition effect */
        }

        /* Added media query to adjust table-container margin when the screen width is smaller */
        @media (max-width: 768px) {
            .table-container {
                margin-left: 0;
            }
        }
        
</style>
</head>
<body>
    <?php require'nav.php'?>
<div class="content">
        <div class="container table-container">
            <h1>Event Details</h1>
            <br>

            <?php if (mysqli_num_rows($result) > 0) { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>No. of Participants</th>
                            <th>Participants Name</th>
                            <th>Price</th>
                            <th>Mentor 1</th>
                            <th>Mentor 2</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['event_title'] . '</td>';
                            echo '<td>' . $row['participents'] . '</td>';
                            echo '<td>' . $row['partcipent_name'] . '</td>';
                            echo '<td>' . $row['event_price'] . '</td>';
                            echo '<td>' . $row['st_name'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['Date'] . '</td>';
                            echo '<td>' . $row['time'] . '</td>';
                            echo '<td>' . $row['location'] . '</td>';
                            echo '<td>';
                            echo '<a class="btn btn-success me-2" href="updateEvent.php?id=' . $row['event_id'] . '">Update</a> ';
                            echo '<a class="btn btn-danger" href="deleteEvent.php?id=' . $row['event_id'] . '">Delete</a> ';
                            echo '</td>';
                            echo '</tr>';
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>No events found.</p>
            <?php } ?>
            <br>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>


