<?php
require '../conn.php';

if (isset($_GET['id'])) {
    $courseId = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve updated course data from the form submission
        $courseTitle = $_POST['course_title'];
        $courseDetail = $_POST['course_detail'];
        $participants = $_POST['participants'];
        $imgLink = $_POST['img_link'];

        $updateCourseQuery = "UPDATE course SET course_title = '$courseTitle', course_detail = '$courseDetail', participants = $participants, img_link = '$imgLink' WHERE course_id = $courseId";
        mysqli_query($conn, $updateCourseQuery);

        header("Location: course_detail.php");
        exit();
    }

    $getCourseQuery = "SELECT * FROM course WHERE course_id = $courseId";
    $courseResult = mysqli_query($conn, $getCourseQuery);
    $course = mysqli_fetch_assoc($courseResult);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
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
        
        .form-container {
            margin-top: 100px; /* Adjust the top margin as needed */
            margin-left: 225px; /* Adjusted to match the width of the sidebar */
            transition: margin-left 0.5s ease; /* Added transition effect */
        }

        @media (max-width: 768px) {
            .form-container {
                margin-left: 0;
            }
        }
    </style>
    </style>
</head>
<body>
    <?php require 'nav.php' ?>
    <div class="container mt-5 form-container">
        <h1>Update Course</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="course_title" class="form-label">Course Title</label>
                <input type="text" class="form-control" id="course_title" name="course_title" value="<?php echo $course['course_title']; ?>">
            </div>
            <div class="mb-3">
                <label for="course_detail" class="form-label">Course Detail</label>
                <textarea class="form-control" id="course_detail" name="course_detail"><?php echo $course['course_detail']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="participants" class="form-label">Participants</label>
                <input type="number" class="form-control" id="participants" name="participants" value="<?php echo $course['participants']; ?>">
            </div>
            <div class="mb-3">
                <label for="img_link" class="form-label">Image Link</label>
                <input type="text" class="form-control" id="img_link" name="img_link" value="<?php echo $course['img_link']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
