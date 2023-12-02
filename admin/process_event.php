<?php
include '../conn.php';

if (isset($_POST["approve"])) {
  $event_id = $_POST["event_id"];

  $selectQuery = "SELECT * FROM pending_events WHERE event_id = $event_id";
  $result = $conn->query($selectQuery);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $INSERT = "INSERT INTO events(event_id, event_title, event_price, img_link, type_id, Posted_By) VALUES ({$row['event_id']}, '{$row['event_title']}', {$row['event_price']}, '{$row['img_link']}', {$row['type_id']}, '{$row['Posted_By']}')";
    if ($conn->query($INSERT) === true) {
      $INSERT = "INSERT INTO event_info(event_id, Date, time, Location) VALUES ({$row['event_id']}, '{$row['Date']}', '{$row['time']}', '{$row['Location']}')";
      if ($conn->query($INSERT) === true) {
        $INSERT = "INSERT INTO student_coordinator(sid, st_name, phone, event_id) VALUES ({$row['event_id']}, '{$row['sname']}', NULL, {$row['event_id']})";
        if ($conn->query($INSERT) === true) {
          $INSERT = "INSERT INTO staff_coordinator(stid, name, phone, event_id) VALUES ({$row['event_id']}, '{$row['name']}', NULL, {$row['event_id']})";
          if ($conn->query($INSERT) === true) {
            $DELETE = "DELETE FROM pending_events WHERE event_id = $event_id";
            if ($conn->query($DELETE) === true) {
              echo "<script>
                alert('Event Approved Successfully!');
                window.location.href='admin.php';
                </script>";
            } else {
              echo "<script>
                alert('Error deleting event from pending events!');
                window.location.href='admin_page.php';
                </script>";
            }
          } else {
            echo "<script>
              alert('Error moving staff coordinator to main table!');
              window.location.href='admin_page.php';
              </script>";
          }
        } else {
          echo "<script>
            alert('Error moving student coordinator to main table!');
            window.location.href='admin_page.php';
            </script>";
        }
      } else {
        echo "<script>
          alert('Error moving event info to main table!');
          window.location.href='admin_page.php';
          </script>";
      }
    } else {
      echo "<script>
        alert('Error inserting event into main table!');
        window.location.href='admin_page.php';
        </script>";
    }
  } else {
    echo "<script>
      alert('Event not found in pending events!');
      window.location.href='admin_page.php';
      </script>";
  }
} elseif (isset($_POST["reject"])) {
  $event_id = $_POST["event_id"];

  $DELETE = "DELETE FROM pending_events WHERE event_id = $event_id";
  if ($conn->query($DELETE) === true) {
    echo "<script>
      alert('Event Rejected Successfully!');
      window.location.href='admin_page.php';
      </script>";
  } else {
    echo "<script>
      alert('Error deleting event from pending events!');
      window.location.href='admin_page.php';
      </script>";
  }
}

$conn->close();
?>
