<?php
 $host = "localhost";
 $dbUsername = "root";
 $dbPassword = "";
 $dbName = "flixmovies";

 $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

 if (mysqli_connect_error()) {
     die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
 }// Assume you have already connected to your database

// Retrieve the user's purchased movies from the database
$user_id = $_SESSION['user_id']; // Assuming you have a user session
$sql = "SELECT title, price FROM purchases WHERE user_id = $user_id";
$result = $conn->query($sql);

// Check if the user has purchased any movies
if ($result->num_rows > 0) {
    // Begin generating the HTML invoice
    $html = <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice</title>
        <style>
            /* Add your CSS styles here */
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h2>Invoice for Purchased Movies</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Price</th>
            </tr>;

    // Loop through the user's purchased movies and add them to the invoice
    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $row['title'] . '</td>';
        $html .= '<td>' . $row['price'] . '</td>';
        $html .= '</tr>';
    }

    // Close the HTML table and body
    $html .= '</table></body></html>';

    // Output the HTML invoice
    echo $html;
} else {
    // If the user has not purchased any movies, display a message
    echo '<p>No movies purchased yet.</p>';
}
?>
