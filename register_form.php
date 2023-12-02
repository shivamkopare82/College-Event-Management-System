   <?php
   session_start();
   ?>

   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>register form</title>

      <!-- custom css file link  -->
      <link rel="stylesheet" href="css/style3.css">
      <style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

         * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
         }

         .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 60px;
         }

         .container .content {
            text-align: center;
         }

         .container .content h3 {
            font-size: 30px;
            color: #333;
         }

         .container .content h3 span {
            background: hwb(41 5% 0%);
            color: #fff;
            border-radius: 5px;
            padding: 0 15px;
         }

         .container .content h1 {
            font-size: 50px;
            color: #333;
         }

         .container .content h1 span {
            color: #FFB30E;
         }

         .container .content p {
            font-size: 25px;
            margin-bottom: 20px;
         }

         .container .content .btn {
            display: inline-block;
            padding: 10px 30px;
            font-size: 20px;
            background: #333;
            color: #fff;
            margin: 0 5px;
            text-transform: capitalize;
         }

         .container .content .btn:hover {
            background: #FFB30E;
         }

         .form-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 60px;
            background: #ffb30e;
         }

         .form-container form {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            background: #fff;
            text-align: center;
            width: 500px;
         }

         .form-container form h3 {
            font-size: 30px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #333;
         }

         .form-container form input,
         .form-container form select {
            width: 100%;
            padding: 10px 15px;
            font-size: 17px;
            margin: 8px 0;
            background: #eee;
            border-radius: 5px;
         }

         .form-container form select option {
            background: #fff;
         }

         .form-container form .form-btn {
            background: #fbffc2;
            color: black;
            text-transform: capitalize;
            font-size: 20px;
            cursor: pointer;
         }

         .form-container form .form-btn:hover {
            background: #FFB30E;
            color: #fff;
         }

         .form-container form p {
            margin-top: 10px;
            font-size: 20px;
            color: #333;
         }

         .form-container form p a {
            color: #FFB30E;
         }

         .form-container form .error-msg {
            margin: 10px 0;
            display: block;
            background: #FFB30E;
            color: #fff;
            border-radius: 5px;
            font-size: 20px;
            padding: 10px;
         }
      </style>

   </head>

   <body>
      <?php

      include 'conn.php';
      if (isset($_POST['submit'])) {
         $username = mysqli_real_escape_string($conn, $_POST['username']);
         $email = mysqli_real_escape_string($conn, $_POST['email']);

         $password = mysqli_real_escape_string($conn, $_POST['password']);
         $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
         $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

         $pass = password_hash($password, PASSWORD_BCRYPT);
         $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

         // Image upload
         $image = $_FILES['image']['name'];
         $temp_image = $_FILES['image']['tmp_name'];
         $image_folder = "uploads/" . $image;

         // Move uploaded image to the designated folder
         move_uploaded_file($temp_image, $image_folder);

         $emailquery = "SELECT * FROM userform WHERE email='$email'";
         $query = mysqli_query($conn, $emailquery);
         $emailcount = mysqli_num_rows($query);
         if ($emailcount > 0) {
            ?>
                  <script>
                     alert("email exists");
                  </script>   
         <?php
         } else {
            if ($password === $cpassword) {
               $insert = "INSERT INTO userform( username, email, image, password, cpassword, user_type) VALUES ('$username','$email','$image_folder','$pass','$cpass','$user_type')";

               $iquery = mysqli_query($conn, $insert);
               if ($iquery) {
      ?>
                  <script>
                     alert("Inserted Successfully");
                  </script>
               <?php
               } else {
               ?>
                  <script>
                     alert("NO Connection");
                  </script>
      <?php
               }
            } else {

               echo "Password not matched";
            }
         }
      }
      ?>


      <div class="form-container">
         <form id="registrationForm" action="<?php echo htmlentities(($_SERVER['PHP_SELF'])); ?>" method="POST" enctype="multipart/form-data">
            <h3>Register Now</h3>
            <?php
            if (isset($error)) {
               foreach ($error as $error) {
                  echo '<span class="error-msg">' . $error . '</span>';
               };
            };
            ?>
            <input type="text" name="username" required placeholder="Enter Your Name">
            <input type="email" name="email" required placeholder="Enter Your Email">
            <input type="file" name="image" required>
            <input type="password" name="password" required placeholder="Enter Your Password">
            <input type="password" name="cpassword" required placeholder="Confirm Your Password">
            <select name="user_type">
               <option value="user">User</option>
               <option value="admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="Register Now" class="form-btn">
            <p>Already have an account? <a href="login_form.php">Login Now</a></p>
         </form>
      </div>

   </body>



   </html>