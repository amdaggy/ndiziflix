<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
</head>
<body>
    <?php
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "flixmovies";

    // Create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM purchases";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table align="center" border="2" style="width:300px; line-height:30px;">';
        echo '<tr><th colspan="2"><h2>History</h2></th></tr>';
        echo '<tr><th>ID</th><th>Title</th></tr>';

        // Fetch and display the results
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['title'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No records found</p>';
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>
