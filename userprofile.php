<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="instyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    body {
      margin-top: 50px;
    }

    .btn-custom-primary {
      background-color: #FFB30E;
      border-color: #FFB30E;
      color: #FFFFFF;
    }

    .btn-custom-primary:hover {
      background-color: #FFB30E;
      border-color: #FFB30E;
      color: #FFFFFF;
    }
  </style>
</head>

<body>

  <section style="background-color: #eee;">
    <?php include 'utils/nav.php'; ?>
    <div class="container py-5">
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "project";

      $conn = new mysqli($servername, $username, $password, $database);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $usn = $_SESSION['username'];
      $sql = "SELECT * FROM userform WHERE username = '$usn'";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row["username"];
        $email = $row["email"];
        $phone = $row["phone"];
        $mobile = $row["mobile"];
        $address = $row["address"];
        $image = $row["image"];
        $instagram_link = $row["instagram_link"];
        $linkedin_link = $row["linkedin_link"];
        $github_link = $row["github_link"];
      ?>
        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <img src="<?php echo $image; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3"><?php echo $username; ?></h5>
                <p class="text-muted mb-1"></p>
                <p class="text-muted mb-4"></p>
              </div>
            </div>
            <div class="card mb-4 mb-lg-0">
              <div class="card-body p-0">
                <ul class="list-group list-group-flush rounded-3">
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fa-brands fa-instagram fa-xl" style="color: #df0144;"></i>
                    <p class="mb-0"><?php echo $instagram_link; ?></p>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fa-brands fa-linkedin fa-xl" style="color: #032e77;"></i>
                    <p class="mb-0"><?php echo $linkedin_link; ?></p>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fa-brands fa-github fa-xl" style="color: #000000;"></i>
                    <p class="mb-0"><?php echo $github_link; ?></p>
                  </li>

                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h5 class="mb-4">User Information</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-sm-4">
                        <h6 class="mb-0">Name:</h6></i>

                      </div>
                      <div class="col-sm-8">
                        <p class="mb-0"><?php echo $username; ?></p>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-sm-4">
                        <h6 class="mb-0">Email:</h6>
                      </div>
                      <div class="col-sm-8">
                        <p class="mb-0"><?php echo $email; ?></p>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-sm-4">
                        <h6 class="mb-0">Phone:</h6>
                      </div>
                      <div class="col-sm-8">
                        <p class="mb-0"><?php echo $phone; ?></p>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-sm-4">
                        <h6 class="mb-0">Mobile:</h6>
                      </div>
                      <div class="col-sm-8">
                        <p class="mb-0"><?php echo $mobile; ?></p>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-sm-4">
                        <h6 class="mb-0">Address:</h6>
                      </div>
                      <div class="col-sm-8">
                        <p class="mb-0"><?php echo $address; ?></p>
                      </div>

                    </div>
                  </li>
                  <br>
                  <li>
                    <a id="edit" href="" class="btn btn-custom-primary">
                      <p>Edit Profile</p>
                      <hid id="hid"><?php $_SESSION['username'] ?></hid>
                    </a>
                    <script>
                      document.getElementById("edit").setAttribute("href", "edit_profile.php?usn=" + document.getElementById("hid").innerHTML);
                    </script>
                  </li>
                </ul>
              </div>
            </div>
            <hr>
            <div class="col-lg-13">
              <div class="card">
                <div class="card-body">
                  <div class="mb-3">
                    <button id="btnTable1" class="btn btn-custom-primary mr-2">Posted Events</button>
                    <button id="btnTable2" class="btn btn-custom-primary">Participated Events</button>
                    <button id="btnTable3" class="btn btn-custom-primary">Payment History</button>
                  </div>
                  <table class="table table-bordered" id="table1">
                    <thead>
                      <tr>
                        <!-- <th>Event ID</th> -->
                        <th>Event Title</th>
                        <th>Event Price</th>
                        <th>Event Date</th>
                        <th>Event Location</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $usn = $_GET['usn'];
                      $query = "SELECT events.*, event_info.Location, event_info.Date
                                FROM events 
                                INNER JOIN event_info ON events.event_id = event_info.event_id 
                                WHERE events.Posted_By = '$usn'";
                      $result = $conn->query($query);

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          // $event_id = $row['event_id'];
                          $event_title = $row['event_title'];
                          $event_price = $row['event_price'];
                          $Date = $row['Date'];
                          $Location = $row['Location'];

                          echo "<tr>";
                          //  echo "<td>$event_id</td>";
                          echo "<td>$event_title</td>";
                          echo "<td>$event_price</td>";
                          echo "<td>$Date</td>";
                          echo "<td>$Location</td>";
                          echo "</tr>";
                        }
                      } else {
                        echo "<tr><td colspan='4'>No events found.</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                  <?php
                  $usn = $_GET['usn'];
                  $query = "SELECT events.*, event_info.Location, event_info.Date
                            FROM events 
                            INNER JOIN event_info ON events.event_id = event_info.event_id 
                            INNER JOIN registrations ON registrations.purpose = events.event_title;
";

                  $result = $conn->query($query);

                  if ($result->num_rows > 0) {
                    echo '<table class="table table-bordered" id="table2">
          <thead>
            <tr>
              <th>Event</th>
              <th>Date</th>
              <th>Location</th>
              <th>Payment ID</th>
              <th>Amount</th>
              <th>Phone</th>
            </tr>
          </thead>
          <tbody>';

                    while ($row = $result->fetch_assoc()) {
                      $event_title = $row['event_title'];
                      $event_price = $row['event_price'];
                      $Date = $row['Date'];
                      $Location = $row['Location'];

                      // Fetch payment details for the event
                      $stmt = $conn->prepare("
                      SELECT payment_id, amount, buyer_name, email, phone
      FROM transaction
      WHERE buyer_name = ?
    ");
                      $stmt->bind_param("s", $usn);
                      $stmt->execute();
                      $paymentResult = $stmt->get_result();

                      if ($paymentResult->num_rows > 0) {
                        while ($paymentRow = $paymentResult->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>$event_title</td>";
                          echo "<td>$Date</td>";
                          echo "<td>$Location</td>";
                          echo "<td>" . $paymentRow['payment_id'] . "</td>";
                          echo "<td>" . $paymentRow['amount'] . "</td>";
                          echo "<td>" . $paymentRow['phone'] . "</td>";
                          echo "</tr>";
                        }
                      } else {
                        echo "<tr>";
                        echo "<td>$event_title</td>";
                        echo "<td>$Date</td>";
                        echo "<td>$Location</td>";
                        echo "<td colspan='3'>No payment details found.</td>";
                        echo "</tr>";
                      }
                    }

                    echo "</tbody></table>";
                  } else {
                    echo "<p>No events found.</p>";
                  }

                  ?>
                  <?php
                  $usn = $_GET['usn'];
                  $query = "SELECT * FROM transaction WHERE buyer_name = '$usn'";
                  $results = $conn->query($query);

                  if ($results->num_rows > 0) {
                    echo '<table class="table table-bordered" id="table3">
                      <thead>
                        <tr>
                            <th>Name</th>
                            <th>Payment ID</th>
                            <th>Amount</th>
                            <th>Event Name</th>
                            <th>DateTime</th>
                        </tr>
                      </thead>
                    <tbody>';

                    while ($row = $results->fetch_assoc()) {
                      $paymentId = $row['payment_id'];
                      $amount = $row['amount'];
                      $purpose = $row['purpose'];
                      $DateTime = $row['DateTime'];
                      // Fetch the user's name from the userform table
                      $userQuery = "SELECT username FROM userform WHERE username = '$usn'";
                      $userResult = $conn->query($userQuery);
                      if ($userResult->num_rows > 0) {
                        $userRow = $userResult->fetch_assoc();
                        $username = $userRow['username'];

                        echo "<tr>";
                        echo "<td>$username</td>";
                        echo "<td>$paymentId</td>";
                        echo "<td>$amount</td>";
                        echo "<td>$purpose</td>";
                        echo "<td>$DateTime</td>";
                        echo "</tr>";
                      }
                    }

                    echo '</tbody></table>';
                  } else {
                    echo "<p>No transactions found.</p>";
                  }
                  ?>
                  </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>


        </div>

        <hr>
      <?php
      } else {
        echo "No user found.";
      }

      ?>
    </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js" integrity="sha512-x9bLefzNBaMzprfj6Pq9Y50sTgTFc3GsQKoTcaEylW6ajXmSPTuUu6zS/WbwwJyWU24hMCqzg7wb6gYo2f1FKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-x0iTV/xtGuEeNoC1RQDhzzxPFnFNNg0vFVtFCchdVvb17IgYFeX7Jtm6bLJ8bq89" crossorigin="anonymous"></script>
</body>
<script>
  // Hide Table 2 & 3 initially
  document.getElementById("table2").style.display = "none";
  document.getElementById("table3").style.display = "none";

  // Add event listeners to the buttons
  document.getElementById("btnTable1").addEventListener("click", function() {
    document.getElementById("table1").style.display = "table";
    document.getElementById("table2").style.display = "none";
    document.getElementById("table3").style.display = "none";

  });

  document.getElementById("btnTable2").addEventListener("click", function() {
    document.getElementById("table1").style.display = "none";
    document.getElementById("table2").style.display = "table";
    document.getElementById("table3").style.display = "none";
  });

  document.getElementById("btnTable3").addEventListener("click", function() {
    document.getElementById("table1").style.display = "none";
    document.getElementById("table2").style.display = "none";
    document.getElementById("table3").style.display = "table";
  });
</script>

</html>