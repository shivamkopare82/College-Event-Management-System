<?php
session_start();
require_once 'conn.php';

// Retrieve the main events
$sql = "SELECT * FROM events INNER JOIN event_info ON events.event_id = event_info.event_id";
$all_events = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="instyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
        .hero-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/fest.jpg");

            /* Set a specific height */
            height: 90%;

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        /* Place text in the middle of the image */
        .hero-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }


        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FFB30E;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: #002200;
        }
        .container.text-center {
        padding-left: 150px;
        padding-right: 150px;
    }
    .rounded-image {
        border-radius: 20px;
    }
    </style>

</head>

<body>

    <?php include 'utils/nav.php' ?>

    <div class="hero-image">
        <div class="hero-text">
            <h1><b>CHECK THE EVENTS IN THE FEST</b></h1>
            <p>....</p>
            <a href="events.php"><button class="btn">VIEW ALL</button></a>

        </div>
    </div>
    <br>
    <?php
    // Retrieve the selected event type
    $selectedType = isset($_GET['type_id']) ? $_GET['type_id'] : '';

    // Generate the SQL query with the selected type
    $sql = "SELECT DISTINCT events.event_id, events.event_title, events.event_price,  events.img_link, events.type_id, event_info.Date, event_info.time, event_info.location FROM events JOIN event_info ON events.event_id = event_info.event_id";
    if (!empty($selectedType)) {
        $sql .= " WHERE events.type_id = '$selectedType'";
    }

    $all_events = $conn->query($sql);
    ?>


<div class="container text-center">
    <?php
    while ($row = mysqli_fetch_assoc($all_events)) {
    ?>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <br>
                <img src="<?php echo $row["img_link"]; ?>" class="img-fluid rounded-start rounded-image" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Title: <?php echo $row["event_title"]; ?></h5>
                    <p class="card-text">Price: <?php echo $row["event_price"]; ?></p>
                    <p class="card-text">Price: <?php echo $row["event_price"]; ?></p>
                    <p class="card-text">Date: <?php echo $row["Date"]; ?></p>
                    <p class="card-text">Location: <?php echo $row["location"]; ?></p>
                    <p class="card-text">Last updated 3 mins ago</p>
                </div>
                <br>
                <?php
                echo '<a class="btn" href="#" onclick="showPopup(\'' . $row["event_title"] . '\', \'' . $row["event_id"] . '\')">Register</a>';
                ?>
            </div>
        </div>
        <hr style="border-width: 2px;"> <!-- Add <hr> tag after each event -->
        <br>
    <?php
    }
    ?>
</div>



<?php include 'utils/footer.php' ?>

</body>

</html>