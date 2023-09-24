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

// Retrieve data from the forum_posts table
$sql = "SELECT * FROM forum_posts ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="post">';
        echo '<p class="post-info"><span class="username">' . $row['username'] . '</span> - ' . $row['location'] . '</p>';
        echo '<p class="question">' . $row['question'] . '</p>';
        echo '</div>';
    }
} else {
    echo "No questions yet.";
}

$conn->close();
?>
