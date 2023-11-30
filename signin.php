<?php
include 'connection.php';

$message = '';

if(isset($_POST['submit'])) {
    $username = $_POST['userName'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `authentication` WHERE `username`='$username' AND `password`='$password'";
    
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0) {
        // User found, redirect to a welcome page or perform other actions
        header('location: dashboard.php');
    } else {
        $message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            width: 80%;
            max-width: 500px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #45a049;
        }

        .message {
            text-align: center;
            color: #ff3333;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="card">
        <h2>User Signin</h2>

        <form action="signin.php" method="post">
            <label for="userName">Username:</label>
            <input type="text" id="userName" name="userName" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" name="submit" value="Sign In">

            <p class="message"><?php echo $message; ?></p>
        </form>
    </div>

    <!-- Optional: Add FontAwesome icons for a more modern look -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
