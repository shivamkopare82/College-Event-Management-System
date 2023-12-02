<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
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
        $instagram_link = $row["instagram_link"];
        $linkedin_link = $row["linkedin_link"];
        $github_link = $row["github_link"];

      }
      ?>

      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Profile</h5>
              <hr>
              <form action="update_profile.php" method="POST">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>">
                  <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
                  <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $phone; ?>">
                  <label for="phone">Phone</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>">
                  <label for="mobile">Mobile</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" id="address" name="address" placeholder="Address"><?php echo $address; ?></textarea>
                  <label for="address">Address</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" id="instagram" name="instagram_link" placeholder="Instagram"><?php echo $instagram_link; ?></textarea>
                  <label for="address">Instagram</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" id="linkedin" name="linkedin_link" placeholder="Linkedin"><?php echo $linkedin_link; ?></textarea>
                  <label for="address">Linkedin</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" id="github" name="github_link" placeholder="Github"><?php echo $github_link; ?></textarea>
                  <label for="address">Github</label>
                </div>
                <button type="submit" class="btn btn-custom-primary">Save Changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php
      $conn->close();
      ?>
    </div>
  </section>

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>
