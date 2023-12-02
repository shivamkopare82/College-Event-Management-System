<!DOCTYPE html>
<html>
<head>
  <title>User Profile</title>
</head>
<body>
  <h2>User Profile</h2>
  <h3>Registered Events</h3>
  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Date</th>
        <th>Time</th>
        <th>Location</th>
        <th>Mentor</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Retrieve registered event details from the database based on user identifier
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Assuming you have a user identifier available, replace 'user_identifier' with the appropriate variable or value
        $userIdentifier = 'user_identifier';
        
        // Retrieve registered event details for the user
        $sql = "SELECT events.title, events.date, events.time, events.location, events.mentor
                FROM events
                INNER JOIN registrations ON events.id = registrations.event_id
                WHERE registrations.email = '$userIdentifier'";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["time"] . "</td>";
                echo "<td>" . $row["location"] . "</td>";
                echo "<td>" . $row["mentor"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No registered events found.</td></tr>";
        }
        
        $conn->close();
      ?>
    </tbody>
  </table>
</body>
</html>
