<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['student_id'];
    $name = $_POST['student_name'];
    $branch = $_POST['branch'];
    $sem = $_POST['semester'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $college = $_POST['college'];
    $amount = $_POST['amount'];
    $purpose = $_POST['purpose'];

    $api_key = 'test_f4f5c1ba7dd4244de879137a1c1';
    $payload = [
        'purpose' => $purpose,
        'amount' => $amount,
        'buyer_name' => $name,
        'email' => $email,
        'phone' => $phone,
        'redirect_url' => 'http://localhost/project/report.php'
    ];

    // Send the payment request
    $ch = curl_init('https://test.instamojo.com/api/1.1/payment-requests/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'X-Api-Key: ' . $api_key,
        'X-Auth-Token: test_f525abef5eea47e6bb603b9915d',
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $json = json_decode($response);
        if ($json->success) {
            $payment_request_url = $json->payment_request->longurl;
            include 'conn.php';

            $stmt = $conn->prepare("INSERT INTO registrations (student_id, student_name, branch, semester, email, phone, college, amount, purpose) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssdss", $id, $name, $branch, $sem, $email, $phone, $college, $amount, $purpose);

            $stmt->execute();

            if ($stmt->errno) {
                echo "Error inserting data: " . $stmt->error;
            } else {
                // Update the participants column in the events table
                $stmt_update = $conn->prepare("UPDATE events SET participents = participents + 1, partcipent_name = ? WHERE event_title = ?");
                $stmt_update->bind_param("ss", $name, $purpose);
                $stmt_update->execute();
                $stmt_update->close();

                header("Location: $payment_request_url");
                exit();
            }

            $stmt->close();
            $conn->close();
        } else {
            $error_message = $json->message;
            echo "Error: $error_message";
        }
    } else {
        echo "Error creating payment request";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style3.css">

</head>

<body>
    <div class="form-container">
        <form method="POST">

            <!-- Add your form fields here -->
            <input type="text" name="student_id" class="form-control" required placeholder="Student ID"><br><br>

            <input type="text" name="student_name" required placeholder="Student Name"><br><br>


            <input type="text" name="branch" required placeholder="Branch"><br><br>

            <input type="text" name="purpose" required placeholder="Event Name"><br><br>


            <input type="text" name="semester" required placeholder="Semester"><br><br>


            <input type="text" name="email" required placeholder="Email"><br><br>


            <input type="text" name="phone" required placeholder="Phone"><br><br>


            <input type="text" name="college" required placeholder="College"><br><br>

            <input type="number" name="amount" required placeholder="Amount"><br><br>


            <input type="submit" name="update" class="form-btn" value="Submit">
            <a href="#"><u>Already registered ?</u></a>
        </form>
    </div>
</body>

</html>
