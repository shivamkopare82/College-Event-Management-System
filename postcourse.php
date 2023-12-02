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

    <form action="" method="post">
      <h3>POST AN COURSE</h3>

      <input type="text" name="course_title" required placeholder="Course Name">

      <input type="text" name="course_detail" required placeholder="Course Detail">

      <input type="text" name="img_link" required placeholder="Upload Image">

      <input type="number" name="type_id" required placeholder="Type ID">

      <input type="date" name="Date" required placeholder="Start Date">

      <input type="text" name="time" required placeholder="Start Time">

      <input type="text" name="Location" required placeholder="Platform">

      

      <input type="submit" name="update" value="Post Course" class="form-btn">

    </form>

  </div>
</body>

</html>


<?php

  if (isset($_POST["update"]))
  {
    $course_title = isset($_POST["course_title"]) ? $_POST["course_title"] : '';
    $course_detail = isset($_POST["course_detail"]) ? $_POST["course_detail"] : '';
  $img_link = $_POST["img_link"];
  $type_id = $_POST["type_id"];
  $Date = $_POST["Date"];
  $time = $_POST["time"];
  $Location = $_POST["Location"];

    if(  !empty($course_title) || !empty($course_detail) || !empty($participents) || !empty($img_link) || !empty($type_id) )

    {
      include 'conn.php';
        
        
   
      $INSERT = "INSERT INTO course (course_title, course_detail, img_link, type_id) VALUES ('$course_title', '$course_detail', '$img_link', $type_id);";
      $INSERT .= "INSERT INTO course_info (Date, time, Location) VALUES ('$Date', '$time', '$Location');";
            
            

        if($conn->multi_query($INSERT)===True){
          echo "<script>
          alert('Course Inserted Successfully!');
          window.location.href='course.php';
          </script>";
        }
        else
        {
          echo"<script>
          alert('Course already exists!');
          window.location.href='createEventForm.php';
          </script>";
        }
     
        $conn->close();
      
    }
    else
    {
      echo"<script>
      alert('All fields are required');
      window.location.href='createEventForm1.php';
      </script>";
    }
  }
?>