<?php

include "dbconnection.php";

header("Content-Type: application/json");
$stkCallbackResponse = file_get_contents('php://input');
$logFile = "Mpesastkresponse.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);

$data = json_decode($stkCallbackResponse);

$MerchantRequestID = $data->Body->stkCallback->MerchantRequestID;
$CheckoutRequestID = $data->Body->stkCallback->CheckoutRequestID;
$ResultCode = $data->Body->stkCallback->ResultCode;
$ResultDesc = $data->Body->stkCallback->ResultDesc;
$Amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$TransactionId = $data->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$UserPhoneNumber = $data->Body->stkCallback->CallbackMetadata->Item[3]->Value;

// CHECK IF THE TRANSACTION IS SUCCESSFUL
if ($ResultCode == 0) {
    // STORE THE TRANSACTION DETAILS IN THE DATABASE USING PREPARED STATEMENTS
    $stmt = $db->prepare("INSERT INTO transactions (MerchantRequestID, CheckoutRequestID, ResultCode, Amount, MpesaReceiptNumber, PhoneNumber) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $MerchantRequestID, $CheckoutRequestID, $ResultCode, $Amount, $TransactionId, $UserPhoneNumber);
    $stmt->execute();
    $stmt->close();
}
