<?php
session_start();

// Check if the admin is logged in, redirect to login.php if not
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: ../login_form.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
    .table-container {
        padding-top: 20px;
        margin-left: 225px;
        /* Adjusted to match the width of the sidebar */
        transition: margin-left 0.5s ease;
        /* Added transition effect */
    }

    /* Added media query to adjust table-container margin when the screen width is smaller */
    @media (max-width: 768px) {
        .table-container {
            margin-left: 0;
        }
    }

    .course-detail {
        max-width: 200px;
        /* Adjust the width as per your preference */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
</head>

<?php require 'nav.php'; ?>
<div class="content">

    <div class="container table-container">
        <?php
        include '../conn.php';
        $sql = "SELECT * FROM `transaction`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) { ?>
        <table class="table table-striped">
            <thead>
          <tr>
            <th>ID</th>
            <th>Payment ID</th>
            <th>Amount</th>
            <th>Buyer Name</th>
            <th>Event Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>DateTime</th>
          </tr>
            </thead>
            <tbody>
            <?php

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['payment_id'] . "</td>
            <td>" . $row['amount'] . "</td>
            <td>" . $row['buyer_name'] . "</td>
            <td>" . $row['purpose'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['phone'] . "</td>
            <td>" . $row['DateTime'] . "</td>
          </tr>";
            }
            ?>
             </tbody>
        </table>
<?php
        } else {
            echo "No records found";
        }
        $conn->close();
        ?>
           
    </div>

</div>