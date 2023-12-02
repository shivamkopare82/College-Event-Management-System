<?php
session_start();
require_once 'conn.php';
$sql = "SELECT * FROM events INNER JOIN event_info ON events.event_id = event_info.event_id";
$all_events = $conn->query($sql);
?>

<?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Retrieve form data
//     $id = $_POST['id'];
//     $name = $_POST['name'];
//     $branch = $_POST['branch'];
//     $sem = $_POST['sem'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $college = $_POST['college'];
//     $amount = $_POST['amount'];
//     $purpose = $_POST['purpose'];

//     // Perform any necessary validation and sanitization of the data

//     // Prepare payment request parameters
//     $api_key = 'test_f4f5c1ba7dd4244de879137a1c1';
//     $payload = [
//         'purpose' => $purpose,
//         'amount' => $amount,
//         'buyer_name' => $name,
//         'email' => $email,
//         'phone' => $phone,
//         // Add any other relevant parameters
//     ];

//     // Send the payment request to Instamojo
//     $ch = curl_init('https://test.instamojo.com/api/1.1/payment-requests/');
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
//     curl_setopt($ch, CURLOPT_HTTPHEADER, [
//         'X-Api-Key: ' . $api_key,
//         'X-Auth-Token: test_f525abef5eea47e6bb603b9915d',
//     ]);

//     $response = curl_exec($ch);
//     curl_close($ch);

//     // Handle the response from Instamojo
//     if ($response) {
//         $json = json_decode($response);
//         if ($json->success) {
//             // Payment request created successfully, retrieve the long URL and redirect to it
//             $payment_request_url = $json->payment_request->longurl;
//             //    header("Location: $payment_request_url");
//             exit();
//         } else {
//             // Handle error
//             $error_message = $json->message;
//             echo "Error: $error_message";
//         }
//     } else {
//         echo "Error creating payment request";
//     }
// }
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


        html {
            scroll-behavior: smooth;
        }

        .paragraph {
            font-size: large;

            margin: 1.5rem 0;
        }


        @media (min-width: 53em) {
            main {
                grid-template-columns: repeat(2, 1fr);
            }
        }

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

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .info-box .flow {
            display: grid;
            grid-template-rows: auto 1fr auto;
            gap: 1rem;
        }

        .image-top {
            display: flex;
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

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 400px;
            max-width: 90%;
        }

        .close-btn {
            color: #FFB30E;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .form-container {
            text-align: center;
        }

        form {
            margin-top: 50px;
        }

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

        .form-container button[type="submit"] {
            background-color: #FFB30E;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button[type="submit"]:hover {
            background-color: #FFB30E;
        }

        .form-container p {
            margin-top: 15px;
        }

        .form-container p a {
            color: #4CAF50;
        }

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
            background-image: url('images/filter.png');
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
    require 'utils/nav.php';
    ?>

    <div class="filter-container">
        <form method="GET" action="">
            <select name="type_id" onchange="this.form.submit()">
                <option value="">Filter</option>
                <option value="1">Technical</option>
                <option value="2">Gaming</option>
                <option value="3">OnStage</option>
                <option value="4">OffStage</option>
            </select>
        </form>
    </div>
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
    <main style="margin-top: 20px;">
        <?php
        while ($row = mysqli_fetch_assoc($all_events)) {
        ?>

            <article class="info-box">

                <div class="image-top">
                    <img src="<?php echo $row["img_link"]; ?>">
                </div>
                <div class="flow">
                    <a href="in.php" style="color: black;"> <?php echo $row["event_title"]; ?> </a>
                    <div>
                        <span style="color:#6abecd;"><b>TECHNICAL</b></span>
                    </div>
                    <div>
                        <p class="paragraph">
                            Lorem ipsum dolor sit amet consectetur,
                        </p>
                        <p class="paragraph"> Price:
                            <?php echo $row["event_price"]; ?>
                        </p>
                        <p class="paragraph"> Date:
                            <?php echo $row["Date"]; ?>
                        </p>
                        <p class="paragraph"> Time:
                            <?php echo $row["time"]; ?>
                        </p>
                        <p class="paragraph"> Location:
                            <?php echo $row["location"]; ?>
                        </p>
                        <a class="register-btn" href="register.php?usn=<?php echo $_SESSION['username']; ?>">
                            <p class="btn">Register</p>
                        </a>
                        <!-- <a id="register" href="">
                            <p class="btn">Register</p>
                            <hid id="hid"><?php // echo $_SESSION['username'] ?></hid>
                        </a> -->
                    </div>
                    <Script>
                        document.getElementById("register").setAttribute("href", "register.php?usn=" + document.getElementById("hid").innerHTML);
                    </script>
                </div>
            </article>
        <?php
        }
        ?>

    </main>
    <a href="" id="post" class="btn" style="margin-left: 220px;">
        <p>Post Event</p>
        <hid id="hid"><?php $_SESSION['username'] ?></hid>
    </a>
    <script>
        document.getElementById("post").setAttribute("href", "post.php?usn=" + document.getElementById("hid").innerHTML);
    </script>
    <br>
    <?php include_once 'utils/footer.php' ?>
</body>
<!-- <script>
    function showPopup() {
        document.getElementById("popupOverlay").style.visibility = "visible";
        document.getElementById("popupOverlay").style.opacity = "1";
    }

    function hidePopup() {
        document.getElementById("popupOverlay").style.visibility = "hidden";
        document.getElementById("popupOverlay").style.opacity = "0";
    }
</script> -->



</html>