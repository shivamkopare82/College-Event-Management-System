<?php
include 'conn.php';
if (isset($_GET['payment_request_id'])) {
    $payment_request_id = $_GET['payment_request_id'];

    $api_key = 'test_f4f5c1ba7dd4244de879137a1c1';
    $auth_token = 'test_f525abef5eea47e6bb603b9915d';
    $ch = curl_init("https://test.instamojo.com/api/1.1/payment-requests/$payment_request_id/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'X-Api-Key: ' . $api_key,
        'X-Auth-Token: ' . $auth_token,
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $json = json_decode($response);
        if ($json->success) {
            $payment_id = $json->payment_request->payments[0]->payment_id;
            $amount = $json->payment_request->amount;
            $buyer_name = $json->payment_request->buyer_name;
            $purpose = $json->payment_request->purpose;
            $email = $json->payment_request->email;
            $phone = $json->payment_request->phone;

            echo '<table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
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
                <tr>
                    <td>' . $payment_id . '</td>
                    <td>' . $amount . '</td>
                    <td>' . $buyer_name . '</td>
                    <td>' . $purpose . '</td>
                    <td>' . $email . '</td>
                    <td>' . $phone . '</td>
                    <td>' . $DateTime . '</td>

                </tr>
            </tbody>
        </table>';
            $stmt = $conn->prepare("INSERT INTO transaction (payment_id, amount, buyer_name, purpose, email, phone, DateTime ) VALUES (?, ?,?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $payment_id, $amount, $buyer_name, $purpose, $email, $phone, $DateTime);

            if ($stmt->execute()) {
                echo "Payment details inserted into the database";
            } else {
                echo "Error inserting payment details: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $error_message = $json->message;
            echo "Error: $error_message";
        }
    } else {
        echo "Error retrieving payment details";
    }
} else {
    echo "Invalid request";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <button><a href="index.php">GO BACK</a></button>
</body>
</html>