<?php
require '../conn.php';
$result = mysqli_query($conn, "SELECT * FROM course c, course_info ci WHERE c.course_id = ci.course_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .table-container {
            padding-top: 20px;
            margin-left: 225px; /* Adjusted to match the width of the sidebar */
            transition: margin-left 0.5s ease; /* Added transition effect */
        }

        /* Added media query to adjust table-container margin when the screen width is smaller */
        @media (max-width: 768px) {
            .table-container {
                margin-left: 0;
            }
        }

        .course-detail {
            max-width: 200px; /* Adjust the width as per your preference */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <?php require 'nav.php' ?>
    <div class="content">
        <div class="container table-container">
            <h1>Course Details</h1>
            <br>

            <?php if (mysqli_num_rows($result) > 0) { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Course Title</th>
                            <th>Course Detail</th>
                            <th>Participants</th>
                            <th>Image Link</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['course_title'] . '</td>';
                            echo '<td class="course-detail">' . $row['course_detail'] . '</td>';
                            echo '<td>' . $row['participants'] . '</td>';
                            echo '<td>' . $row['img_link'] . '</td>';
                            echo '<td>' . $row['Date'] . '</td>';
                            echo '<td>' . $row['time'] . '</td>';
                            echo '<td>' . $row['location'] . '</td>';
                            echo '<td>';
                            echo '<a class="btn btn-success me-2" href="updateCourse.php?id=' . $row['course_id'] . '">Update</a> ';
                            echo '<a class="btn btn-danger" href="deleteCourse.php?id=' . $row['course_id'] . '">Delete</a> ';
                            echo '</td>';
                            echo '</tr>';
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>No courses found.</p>
            <?php } ?>
            <br>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
