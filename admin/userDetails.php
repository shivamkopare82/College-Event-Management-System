<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: ../login_form.php");
    exit();
}
?>
<?php
require '../conn.php';

// Function to delete a user record
function deleteUser($conn, $id) {
    $delete_query = "DELETE FROM userform WHERE id = $id";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        return true;
    } else {
        return false;
    }
}

$result = mysqli_query($conn, "SELECT * FROM userform");
?>

<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .table-container {
            padding-top: 20px;
            margin-left: 225px; /* Adjusted to match the width of the sidebar */
            transition: margin-left 0.5s ease; /* Added transition effect */
        }

        @media (max-width: 768px) {
            .table-container {
                margin-left: 0;
            }
        }
    </style> 
</head>

<body>
    <!-- Include the header and navigation menu for the admin page -->
    <?php require 'nav.php'; ?>
    <div class="content " >
        <div class="container table-container">
            <h2>User Details</h2>
            <br>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Phone</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <!-- <th>User Type</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['username'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . $row['image'] . '</td>';
                            echo '<td>' . $row['phone'] . '</td>';
                            echo '<td>' . $row['mobile'] . '</td>';
                            echo '<td>' . $row['address'] . '</td>';
                            // echo '<td>' . $row['user_type'] . '</td>';
                            echo '<td>';
                            echo '<a class="btn btn-success me-2" href="updateUser.php?id=' . $row['id'] . '">Update</a> ';
                            echo '<a class="btn btn-danger" href="deleteUser.php?id=' . $row['id'] . '">Delete</a> ';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>No user details found.</p>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
