<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agric";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$username = $_POST['username'];
$location = $_POST['location'];
$question = $_POST['question'];

// Insert data into the forum_posts table
$sql = "INSERT INTO forum_posts (username, location, question) VALUES ('$username', '$location', '$question')";

if ($conn->query($sql) === TRUE) {
    echo "Question posted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
