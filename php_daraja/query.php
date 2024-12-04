<?php

include 'accessToken.php';
// Function to check transaction status
function checkTransactionStatus($CheckoutRequestID)
{
    // MPESA STK Push Query URL
    $query_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query';

    // MPESA Business Details
    $BusinessShortCode = '174379';
    $Timestamp = date('YmdHis');

    // Generate password
    $Passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    $Password = base64_encode($BusinessShortCode . $Passkey . $Timestamp);

    // Access token
    $access_token = getAccessToken();

    // STK push query request body
    $request_body = [
        "BusinessShortCode" => $BusinessShortCode,
        "Password" => $Password,
        "Timestamp" => $Timestamp,
        "CheckoutRequestID" => $CheckoutRequestID
    ];

    // Headers for the request
    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $access_token
    ];

    // Initiate CURL request for STK push query
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $query_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($request_body));

    // Execute CURL request for STK push query
    $response = curl_exec($curl);
    curl_close($curl);

    // Decode the response
    $response_data = json_decode($response, true);

    // Echo the query result
    echo "Query Result: " . json_encode($response_data);

    // Return the response data
    return $response_data;
}
