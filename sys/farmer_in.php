<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .login-box {
            width: 300px;
            padding: 40px;
            position: relative;
            background: #fff;
            text-align: center;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
        }

        .textbox {
            position: relative;
            margin-bottom: 30px;
        }

        .textbox input {
            width: 100%;
            padding: 10px;
            background: #f2f2f2;
            border: none;
            outline: none;
            color: #333;
            font-size: 18px;
            border-radius: 5px;
        }

        .btn {
            width: 100%;
            background: #333;
            border: none;
            padding: 10px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="textbox">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="textbox">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <input type="submit" class="btn" value="Login">
        </form>
    </div>
</body>
</html>

<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "agric";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create a database connection
    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check user credentials
    $query = "SELECT * FROM farmers_list WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Successful login
        mysqli_close($conn);
        header("Location: dashboard.php"); // Redirect to the dashboard page
        exit();
    } else {
        // Failed login
        echo "Invalid credentials. Please try again.";
        mysqli_close($conn);
    }
}
?>
