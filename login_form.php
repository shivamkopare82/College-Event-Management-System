<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style3.css">
   <style>
      img {
         width: 150px;
         height: 150px;
         margin: 20px 30px 50px 30px
      }
   </style>

</head>

<body>

<?php
   include 'conn.php';

   // Check if any user is already logged in, redirect to index.php if true
   if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
      header("Location: index.php");
      exit();
   }

   if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $email_search = "SELECT * FROM userform WHERE email = '$email'";
      $query = mysqli_query($conn, $email_search);

      $email_count = mysqli_num_rows($query);
      if ($email_count) {
         $email_pass = mysqli_fetch_assoc($query);
         $dbpass = $email_pass['password'];
         $_SESSION['username'] = $email_pass['username'];
         $pass_decode = password_verify($password, $dbpass);
         if ($pass_decode) {
            // Check if the user is an admin
            if ($_SESSION['username'] === 'admin') {
               $_SESSION['admin_logged_in'] = true;
            } else {
               $_SESSION['logged_in'] = true;
            }
            //  echo "<script>window.location.href = 'userprofile.php?usn=".$_SESSION['username']."';</script>";
             echo "<script>window.location.href = 'index.php?usn=".$_SESSION['username']."';</script>";
            exit();
         } else {
            echo "Invalid Password";
         }
      } else {
         echo "Invalid Email";
      }
   }
   ?>

   <div class="form-container">

      <form id="loginForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
         <h3>Login Now</h3>
         <img src="images/male_pic.png" alt="person picture">
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
         <input type="email" name="email" required placeholder="Enter Your Email">
         <input type="password" name="password" required placeholder="Enter Your Password">
         <input type="submit" name="submit" value="Login Now" class="form-btn">
         <p>don't have an account? <a href="register_form.php">register now</a></p>
      </form>

   </div>

</body>


</html>