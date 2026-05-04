<?php
// Database configuration
$servername = "localhost"; // Usually "localhost"
$username = "root";        // MySQL username
$password = "";            // MySQL password
$dbname = "restaurant";  // Name of the database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $username = $conn->real_escape_string($_POST['login-username']);
    $review = $conn->real_escape_string($_POST['textarea']);
    
    // SQL query to insert data into the database
    $sql = "INSERT INTO reviews (username, review) VALUES ('$username', '$review')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>