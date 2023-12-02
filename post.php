<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post</title>
  <link rel="stylesheet" href="css/style3.css">
</head>

<body>
  <div class="form-container">

    <form action="" method="post" enctype="multipart/form-data">
      <h3>POST AN EVENT</h3>

      <input type="text" name="event_title" required placeholder="Event Name">
      <input type="number" name="event_price" required placeholder="Event Price">
      <input type="file" name="img_link" required placeholder="Upload Image">
      <input type="number" name="type_id" required placeholder="Type ID">
      <input type="date" name="Date" required placeholder="Event Date">
      <input type="text" name="time" required placeholder="Event Time">
      <input type="text" name="Location" required placeholder="Event Location">
      <input type="text" name="sname" required placeholder="Mentor 1">
      <input type="text" name="st_name" required placeholder="Mentor 2">
      <input type="text" name="Posted_By" required placeholder="Posted By">

      <!-- <div id="sub-events">
        <h4>Sub-Events</h4>
        <div class="sub-event">
          <input type="text" name="sub_event_title[]" placeholder="Sub-Event Name">
          <input type="number" name="sub_event_price[]" placeholder="Sub-Event Price">
        </div>
      </div> -->

      <!-- <input type="button" id="add-sub-event-btn" value="Add Sub-Event" class="form-btn"> -->
      <input type="submit" name="update" value="Post Event" class="form-btn">
    </form>

  </div>

  <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      const addSubEventButton = document.getElementById('add-sub-event-btn');
      const subEventsContainer = document.getElementById('sub-events');

      let subEventCount = 1; 

      addSubEventButton.addEventListener('click', function() {
        const subEvent = document.createElement('div');
        subEvent.classList.add('sub-event');

        subEvent.innerHTML = `
          <input type="text" name="sub_event_title[]" placeholder="Sub-Event Name">
          <input type="number" name="sub_event_price[]" placeholder="Sub-Event Price">
        `;

        subEventsContainer.appendChild(subEvent);
        subEventCount++;
      });
    });
  </script> -->

</body>

</html>

<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
  header("Location: login_form.php");
  exit;
}

if (isset($_POST["update"])) {
  $event_title = $_POST["event_title"];
  $event_price = $_POST["event_price"];
  // $img_link = $_POST["img_link"];
  $type_id = $_POST["type_id"];
  $name = $_POST["sname"];
  $st_name = $_POST["st_name"];
  $Date = $_POST["Date"];
  $time = $_POST["time"];
  $Location = $_POST["Location"];
  $Posted_By = $_POST["Posted_By"];

  //image
  $img_link = $_FILES['img_link']['name'];
  $temp_image = $_FILES['img_link']['tmp_name'];
  $image_folder = "uploads/" . $img_link;

  move_uploaded_file($temp_image, $image_folder);

  if (!empty($event_title) && !empty($event_price) && !empty($type_id)) {
    include 'conn.php';

    // Check if the event already exists
    // $checkQuery = "SELECT event_id FROM events_temp WHERE event_id = $event_id";
    // $checkResult = $conn->query($checkQuery);
    // if ($checkResult->num_rows > 0) {
    //   echo "<script>
    //     alert('Event already exists!');
    //     window.location.href='createEventForm.php';
    //     </script>";
    //   $conn->close();
    //   exit;
    // }

    $usn = $_GET["usn"];
    echo $usn;

    // Insert the main event
    $INSERT = "INSERT INTO pending_events (usn, event_id, event_title, event_price, img_link, type_id, Date, time, Location, sname, st_name,Posted_By)
           VALUES ('$usn', '$event_id', '$event_title', '$event_price', '$image_folder', '$type_id', '$Date', '$time', '$Location', '$name', '$st_name','$Posted_By')";

    if ($conn->query($INSERT) === true) {
      echo "<script>
          alert('Event Submitted Successfully!');
          window.location.href='index.php';
          </script>";
    } else {
      echo "<script>
          alert('Error submitting event!');
          window.location.href='post.php';
          </script>";
    }

    // Check if multiple sub-events option is selected
    // if (isset($_POST["sub_event_title"]) && isset($_POST["sub_event_price"])) {
    //   $subEventTitles = $_POST["sub_event_title"];
    //   $subEventPrices = $_POST["sub_event_price"];

    //   for ($i = 0; $i < count($subEventTitles); $i++) {
    //     $subEventTitle = $subEventTitles[$i];
    //     $subEventPrice = $subEventPrices[$i];
    //     // ... (retrieve other fields for sub-event)

    //     // Insert sub-event into the database
    //     $subEventInsert = "INSERT INTO sub_events (event_id, sub_event_title, sub_event_price)
    //       VALUES ('$event_id', '$subEventTitle', '$subEventPrice')";
    //     $conn->query($subEventInsert);
    //   }
    // }

    $conn->close();
  } else {
    echo "<script>
      alert('All fields are required');
      window.location.href='post.php';
      </script>";
  }
}
?>
