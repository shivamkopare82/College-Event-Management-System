<?php
require_once 'conn.php';
$sql = "SELECT * FROM course INNER JOIN course_info ON course.course_id = course_info.course_id";
$all_course = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Urbanist:wght@100;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0d1d40c7c3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/instyle.css"> 
    <style>

     *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {


            place-content: center;
            min-height: 100vh;

            margin: 0;
        }

        main {
            display: grid;
            gap: 3rem;

            padding: 5rem 2rem;
            width: min(95%, 75rem);
            margin-inline: auto;
        }


        /* .info-box {
            display: grid;
            grid-template-columns: 1fr;
            gap: 3rem;
            padding: 2rem;
            background-color: var(--bg-card);
            border-radius: 0.5rem;
            box-shadow: 2rem 3rem 2rem -2rem hsla(221, 7%, 45%, 0.492);
        } */

        /* @media (min-width: 53em) {
            .info-box {
                grid-template-columns: repeat(2, 1fr);
            }
        } */
        /* .info-box img {
            width: 100%;
            object-fit: cover;
            aspect-ratio: 3/2;
            border-radius: 0.5rem 0.5rem 0 0;
            transition: all 0.5s ease-in-out;
        }

        .image-top img {
            object-position: 50% 40%;
        } */

        .image-bottom img {
            object-position: 50% 100%;
        }

        .info-box img:hover {
            border-radius: 0.5rem 0.5rem 0 0;
            border: 1rem solid transparent;
            background: linear-gradient(black, black) padding-box,
                linear-gradient(45deg, #3bccc0, #c86feb) border-box;
        }

        /* .flow {
            padding: 2rem 3rem;
        } */

        h1 {
            font-weight: var(--fw-500);
            font-size: var(--fs-700);
        }

        /* span {
            font-size: var(--fs-600);
            font-weight: var(--fw-600);
            text-transform: uppercase;
            margin: 0.5rem 0.5rem 0 0;
        } */

        .paragraph {
            font-size: large;

            margin: 1.5rem 0;
        }


        @media (min-width: 53em) {
            main {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* .info-box {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 1rem;
        } */

        /* .image-top {
            position: relative;
            grid-column: 1;
        }

        .image-top img {
            width: 100%;
            height: auto;
            border-radius: 0.5rem;
            transition: all 0.5s ease-in-out;
        } */

        /* .flow {
            grid-column: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
        } */










        .info-box {
            display: grid;
            grid-template-columns: 1fr;
            gap: 3rem;
            padding: 2rem;
            background-color: var(--bg-card);
            border-radius: 0.5rem;
            box-shadow: 2rem 3rem 2rem -2rem hsla(221, 7%, 45%, 0.492);
        }

        @media (min-width: 53em) {
            .info-box {
                grid-template-columns: 1fr;
            }
        }

        .info-box .flow {
            display: grid;
            grid-template-rows: auto 1fr auto;
            /* Added grid-template-rows */
            gap: 1rem;
        }

        .image-top {
            display: flex;
            /* Changed position from relative to flex */
            justify-content: center;
        }

        .image-top img {
            max-width: 100%;
            /* Changed width to max-width */
            height: auto;
            border-radius: 0.5rem;
            transition: all 0.5s ease-in-out;
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        .popup-content {
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            max-width: 80%;
            max-height: 80%;
            overflow: auto;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            font-size: 1.5rem;
            color: #999;
            cursor: pointer;
        }
         /* Popup overlay */
    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.3s;
    }

    /* Popup content */
    .popup-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        width: 400px;
        max-width: 90%;
    }

    /* Close button */
    .close-btn {
        color: #FFB30E;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    /* Form container */
    .form-container {
        text-align: center;
    }

    form{
        margin-top: 50px;
    }

    /* Form fields */
    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="password"],
    .form-container select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    /* Submit button */
    .form-container button[type="submit"] {
        background-color: #FFB30E;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Submit button:hover */
    .form-container button[type="submit"]:hover {
        background-color: #FFB30E;
    }

    /* Paragraph */
    .form-container p {
        margin-top: 15px;
    }

    /* Link */
    .form-container p a {
        color: #4CAF50;
    }

    /* Link:hover */
    .form-container p a:hover {
        text-decoration: underline;
    }

    .filter-container {
    margin-top: 100px;
    margin-bottom: 0;
    
    margin-left: 220px;
  }

  .filter-container select {
    padding: 10px;
    font-size: 16px;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    color: #333;
    outline: none;
    transition: border-color 0.3s ease;
    appearance: none;
    background-image: url('filter-icon.png');
    background-repeat: no-repeat;
    background-position: right center;
    background-size: 16px 16px;
    padding-right: 30px;
  }

  .filter-container select:hover,
  .filter-container select:focus {
    border-color: #999;
  }

  .filter-container option {
    background-color: #fff;
    color: #333;
  }
    </style>

</head>

<body>
    <?php

    include_once 'utils/nav.php';
    ?>

<div class="filter-container">
  <form method="GET" action="">
    <select name="type_id" onchange="this.form.submit()">
      <option value="">Filter</option>
      <option value="1">Type 1</option>
      <option value="2">Type 2</option>
      <option value="3">Type 3</option>
      <option value="4">Type 4</option>
    </select>
  </form>
</div>
    <?php
    // Retrieve the selected event type
    $selectedType = isset($_GET['type_id']) ? $_GET['type_id'] : '';

    // Generate the SQL query with the selected type
    $sql = "SELECT DISTINCT course.course_id, course.course_title, course.course_detail,  course.img_link, course.type_id, course_info.Date, course_info.time, course_info.location FROM course JOIN course_info ON course.course_id = course_info.course_id";
    if (!empty($selectedType)) {
        $sql .= " WHERE course.type_id = '$selectedType'";
    }

    $all_course = $conn->query($sql);
    ?>
    <main style="margin-top: 20px;">
        <?php
        while ($row = mysqli_fetch_assoc($all_course)) {
        ?>
        
            <article class="info-box">

                <div class="image-top">
                    <img src="<?php echo $row["img_link"]; ?>">
                </div>
                <div class="flow">
                    <h1><b><?php echo $row["course_title"]; ?></b></h1>
                    <div>
                        <!-- <span style="color:#6abecd;"><b>TECHNICAL</b></span> -->
                    </div>
                    <div>
                        <p class="paragraph">
                            Lorem ipsum dolor sit amet consectetur,
                        </p>
                        <p class="paragraph"> <b>Detail:</b>
                            <?php echo $row["course_detail"]; ?>
                        </p>
                        <p class="paragraph"> <b>Start Date:</b>
                            <?php echo $row["Date"]; ?>
                        </p>
                        <p class="paragraph"> <b>Time:</b>
                            <?php echo $row["time"]; ?>
                        </p>
                        <p class="paragraph"> <b>Platform:</b>
                            <?php echo $row["location"]; ?>
                        </p>
                    </div>
                    <?php
                    echo '<a class="btn" href="#" onclick="showPopup(\'' . $row["course_title"] . '\', \'' . $row["course_id"] . '\')">ENROLL   </a>';
                    ?>
                </div>
            </article>
        <?php
        }
        ?>
    </main>
    <a class="btn" href="postcourse.php" style="margin-left: 220px;">Post Course</a>
<br>
    <!-- Popup form -->
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content form-container">
            <span class="close-btn" onclick="hidePopup()">&times;</span>
            <h2 id="popupEventTitle"></h2>
            <!-- Add your registration form elements here -->
            <form method="POST">
                <!-- Form fields and submit button -->

                <input type="text" name="id" class="form-control" required placeholder="Student ID"><br><br>

                <input type="text" name="name"  required placeholder="Student Name"><br><br>


                <input type="text" name="branch"  required placeholder="Branch"><br><br>


                <input type="text" name="sem"  required placeholder="Semester"><br><br>


                <input type="text" name="email"  required placeholder="Email"><br><br>


                <input type="text" name="phone"  required placeholder="Phone"><br><br>


                <input type="text" name="college"  required placeholder="College"><br><br>

                <button type="submit" name="update" required class="form-btn">Submit</button><br><br>
                <a href="usn.php"><u>Already registered ?</u></a>
            </form>
        </div>
    </div>



    <?php include_once 'utils/footer.php' ?>
    <!-- <a href="post.php">Post Event</a> -->
    <?php

    if (isset($_POST["update"]))
    {
        $id=$_POST["id"];
        $name=$_POST["name"];
        $branch=$_POST["branch"];
        $sem=$_POST["sem"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $college=$_POST["college"];


        if( !empty($id) || !empty($name) || !empty($branch) || !empty($sem) || !empty($email) || !empty($phone) || !empty($college) )
        {
        
            include 'conn.php';     
                $INSERT="INSERT INTO participent (id,name,branch,sem,email,phone,college) VALUES('$id','$name','$branch',$sem,'$email','$phone','$college')";

          
                if($conn->query($INSERT)===True){
                    echo "<script>
                    alert('Registered Successfully!');
                    window.location.href='usn.php';
                    </script>";
                }
                else
                {
                    echo"<script>
                    alert(' Already registered this ID');
                    window.location.href='usn.php';
                    </script>";
                }
               
                $conn->close();
            
        }
        else
        {
            echo"<script>
            alert('All fields are required');
            window.location.href='register.php';
                    </script>";
        }
    }
    
?>
</body>
<script>
    
    function showPopup() {
        document.getElementById("popupOverlay").style.visibility = "visible";
        document.getElementById("popupOverlay").style.opacity = "1";
    }

    function hidePopup() {
        document.getElementById("popupOverlay").style.visibility = "hidden";
        document.getElementById("popupOverlay").style.opacity = "0";
    }
</script>

</html>