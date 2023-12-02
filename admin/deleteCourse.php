<?php
require '../conn.php';

if (isset($_GET['id'])) {
    $courseId = $_GET['id'];

    $deleteCourseQuery = "DELETE FROM course WHERE course_id = $courseId";
    mysqli_query($conn, $deleteCourseQuery);

    $deleteCourseInfoQuery = "DELETE FROM course_info WHERE course_id = $courseId";
    mysqli_query($conn, $deleteCourseInfoQuery);

    header("Location: course_detail.php");
    exit();
}
?>
