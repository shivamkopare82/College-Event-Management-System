<?php
require '../conn.php';

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $eventTitle = $_POST['event_title'];
        $eventPrice = $_POST['event_price'];
        $participants = $_POST['participants'];
        $imgLink = $_POST['img_link'];
        $Date = $_POST['Date'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $st_name = $_POST['st_name'];
        $name = $_POST['name'];

        $updateEventQuery = "UPDATE events SET event_title = '$eventTitle', event_price = $eventPrice, participents = $participants, img_link = '$imgLink' WHERE event_id = $eventId";
        mysqli_query($conn, $updateEventQuery);

        $updateEventInfoQuery = "UPDATE event_info SET Date = '$Date', time = '$time', location = '$location' WHERE event_id = $eventId";
        mysqli_query($conn, $updateEventInfoQuery);

        $updateEventInfoQuery = "UPDATE staff_coordinator SET name = '$name' WHERE event_id = $eventId";
        $updateEventInfoQuery = "UPDATE student_coordinator SET st_name = '$st_name' WHERE event_id = $eventId";


        header("Location: event_detail.php");
        exit();
    }

    $getEventQuery = "SELECT * FROM events, event_info, staff_coordinator, student_coordinator WHERE events.event_id = $eventId AND event_info.event_id = $eventId AND staff_coordinator.event_id = $eventId AND  student_coordinator.event_id";
    $eventResult = mysqli_query($conn, $getEventQuery);
    $event = mysqli_fetch_assoc($eventResult);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        .form-container {
            margin-top: 100px; /* Adjust the top margin as needed */
            margin-left: 225px; /* Adjusted to match the width of the sidebar */
            transition: margin-left 0.5s ease; /* Added transition effect */
        }

        @media (max-width: 768px) {
            .form-container {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <?php require 'nav.php'; ?>
    <div class="container mt-5 form-container">
        <h1>Update Event</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="event_title" class="form-label">Event Title</label>
                <input type="text" class="form-control" id="event_title" name="event_title" value="<?php echo $event['event_title']; ?>">
            </div>
            <div class="mb-3">
                <label for="event_price" class="form-label">Event Price</label>
                <input type="number" class="form-control" id="event_price" name="event_price" value="<?php echo $event['event_price']; ?>">
            </div>
            <div class="mb-3">
                <label for="participants" class="form-label">Participants</label>
                <input type="number" class="form-control" id="participants" name="participants" value="<?php echo $event['participents']; ?>">
            </div>
            <div class="mb-3">
                <label for="img_link" class="form-label">Image Link</label>
                <input type="text" class="form-control" id="img_link" name="img_link" value="<?php echo $event['img_link']; ?>">
            </div>
            <div class="mb-3">
                <label for="Date" class="form-label">Date</label>
                <input type="text" class="form-control" id="Date" name="Date" value="<?php echo $event['Date']; ?>">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="text" class="form-control" id="time" name="time" value="<?php echo $event['time']; ?>">
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo $event['location']; ?>">
            </div>
            <div class="mb-3">
                <label for="st_name" class="form-label">Mentor 1</label>
                <input type="text" class="form-control" id="st_name" name="st_name" value="<?php echo $event['st_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Mentor 2 </label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $event['name']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
