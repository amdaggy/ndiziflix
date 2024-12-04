<?php

// Function to retrieve access token
include "accessToken.php";
include "dbconnection.php";


// Function to initiate STK push
function initiateSTKPush($amount, $phone)
{
    // MPESA STK Push URL
    $push_url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";

    // MPESA Business Details
    $BusinessShortCode = '174379';
    $Timestamp = date('YmdHis');

    // Generate password
    $Passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    $Password = base64_encode($BusinessShortCode . $Passkey . $Timestamp);

    // Access token
    $access_token = getAccessToken();

    // STK push request body
    $request_body = [
        "BusinessShortCode" => $BusinessShortCode,
        "Password" => $Password,
        "Timestamp" => $Timestamp,
        "TransactionType" => "CustomerPayBillOnline",
        "Amount" => $amount,
        "PartyA" => $phone,
        "PartyB" => $BusinessShortCode,
        "PhoneNumber" => $phone,
        "CallBackURL" => "https://www.rafikipesa.emmanuel-mwendwa.xyz/lnmo-callback",
        "AccountReference" => "Reference",
        "TransactionDesc" => "STK Push"
    ];

    // Headers for the request
    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $access_token
    ];

    // Initiate CURL request
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $push_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($request_body));

    // Execute CURL request
    $response = curl_exec($curl);
    curl_close($curl);

    // echo $response;
    return $response;
}


// Function to check transaction status
function checkTransactionStatus($CheckoutRequestID)
{
    $query_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query';
    $BusinessShortCode = '174379';
    $Timestamp = date('YmdHis');
    $Passkey = "your_passkey";
    $Password = base64_encode($BusinessShortCode . $Passkey . $Timestamp);
    $access_token = getAccessToken();

    $curl_post_data = [
        "BusinessShortCode" => $BusinessShortCode,
        "Password" => $Password,
        "Timestamp" => $Timestamp,
        "CheckoutRequestID" => $CheckoutRequestID
    ];

    $queryheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $query_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $queryheader);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));
    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response, true);
}


$phone = "254113213302";  // Example phone number
$amount = "1";          // Example amount

 //Initiate STK Push
 $stkResponse = initiateSTKPush($amount, $phone);
 if (isset($stkResponse['CheckoutRequestID'])) {
     $checkoutRequestID = $stkResponse['CheckoutRequestID'];
     sleep(15);  // Delay to wait for MPESA to process the transaction, not recommended for real-time handling but fine for testing.
     $statusResponse = checkTransactionStatus($checkoutRequestID);
     echo "Transaction Status Response: " . json_encode($statusResponse);
 } else {
     echo "Failed to initiate STK Push. Response was: " . json_encode($stkResponse);
 }
