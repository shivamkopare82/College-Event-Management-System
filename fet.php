<?php
// Retrieve user data from the database
$userID = $_SESSION['userID']; // Assuming you have stored the user ID in the session variable
$sql = "SELECT e.event_name, e.event_date, e.event_location
        FROM userform AS u
        INNER JOIN registrations AS r ON u.id = r.user_id
        INNER JOIN events AS e ON r.event_id = e.id
        WHERE u.id = $userID";
$result = $conn->query($sql);



// Display user information
// ...

// Display registered events
if ($result->num_rows > 0) {
    echo '<h5 class="mb-4">Registered Events</h5>';
    echo '<ul class="list-group list-group-flush">';
  
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
