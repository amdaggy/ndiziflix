<?php
// Assuming you have a database connection already established

// Check if the user is logged in and retrieve their user ID
// This could be done using session management or any other authentication method
$user_id = 1; // For example, replace with the actual user ID

// Query to fetch the user's purchase history from the database
$query = "SELECT purchase_id, movie_title, purchase_date FROM purchases WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if there are any results
if ($result->num_rows > 0) {
    $purchase_history = array();
    while ($row = $result->fetch_assoc()) {
        // Store each purchase record in an array
        $purchase_history[] = array(
            'purchase_id' => $row['purchase_id'],
            'movie_title' => $row['movie_title'],
            'purchase_date' => $row['purchase_date']
        );
    }
    // Return the purchase history as JSON
    echo json_encode(array('success' => true, 'purchaseHistory' => $purchase_history));
} else {
    // If no purchase history found for the user, return an error message
    echo json_encode(array('success' => false, 'message' => 'No purchase history found.'));
}
?>
