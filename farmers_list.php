<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "agric";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password for security
    $type = $_POST["type"];

    $sql = "INSERT INTO users (username, name, surname, password, type) VALUES ('$username', '$name', '$surname', '$password', '$type')";

    if ($conn->query($sql) === TRUE) {
        echo "Sign-up successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Sign-Up</title>

    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 40px;
    width: 400px;
    text-align: center;
}

h1 {
    color: #333;
    margin-bottom: 20px;
}

form {
    text-align: left;
}

input,
select {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button a {
    color: white;
    text-decoration: none;
}

button:hover {
    background-color: #0056b3;
}

/* Responsive design for smaller screens */
@media (max-width: 480px) {
    .container {
        width: 90%;
        padding: 20px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1>User Sign-Up</h1>
        <form id="signup-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="surname" placeholder="Surname" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="type" required>
                <option value="" disabled selected>Select Type</option>
                <option value="farmer">Farmer</option>
            </select>
            <button type="submit">Sign Up</button> <br> <br>
        </form>
        <button type="submit"><a href="login.php">Login</a></button>
    </div>
    <script src="script.js"></script>
</body>
</html>
