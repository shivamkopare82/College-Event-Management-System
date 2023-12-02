<?php
// Retrieve the form data
$id = $_POST['id'];
$name = $_POST['name'];
$branch = $_POST['branch'];
$sem = $_POST['sem'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$college = $_POST['college'];
$amount = $_POST['amount'];
$purpose = $_POST['purpose'];

// Set your Instamojo API key
$api_key = $_POST['test_f4f5c1ba7dd4244de879137a1c1'];

// Create the Instamojo payment request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'purpose' => $purpose,
    'amount' => $amount,
    'buyer_name' => $name,
    'email' => $email,
    'phone' => $phone,
    'send_email' => true,
    'send_sms' => true,
    'allow_repeated_payments' => false,
    'redirect_url' => 'https://india-at-trading.in/instamojo/result.php', // Replace with your success URL
    'webhook' => 'https://india-at-trading.in/instamojo/webhook.php' // Replace with your webhook URL
]));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'X-Api-Key: ' . $api_key,
    'X-Auth-Token: ' . '<test_f525abef5eea47e6bb603b9915d>' // Replace with your Instamojo auth token
]);

// Execute the API call
$response = curl_exec($ch);
curl_close($ch);

// Process the API response
if ($response === false) {
    // Handle error
    echo json_encode(['error' => 'An error occurred during the payment request.']);
} else {
    $json_response = json_decode($response, true);
    if ($json_response['success'] === true) {
        // Payment request created successfully
        echo json_encode(['payment_request' => $json_response['payment_request']]);
    } else {
        // Handle error
        echo json_encode(['error' => $json_response['message']]);
    }
}
?>
