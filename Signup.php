<?php
include 'connection.php';

$message = '';

if(isset($_POST['submit'])) {
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $fullName = $_POST['fullName'];
    $fatherName = $_POST['fatherName'];
    $city = $_POST['city'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];

    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM `authentication` WHERE `username`='$username'";
    $checkUsernameResult = mysqli_query($con, $checkUsernameQuery);

    if (mysqli_num_rows($checkUsernameResult) > 0) {
        $message = "Username already exists. Please choose a different username.";
    } else {
        // If the username is unique, insert the data into the database
        $insertQuery = "INSERT INTO `authentication` (username, password, full_name, father_name, city, dob, email) 
                        VALUES ('$username', '$password', '$fullName', '$fatherName', '$city', '$dob', '$email')";
        
        $insertResult = mysqli_query($con, $insertQuery);

        if($insertResult) {
            $message = "Data inserted successfully";
            header('location: success.php');
        } else {
            $message = mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
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

        input[type="date"] {
            /* For date input, you may want to adjust the style as needed */
            width: calc(100% - 16px);
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
            color: #4caf50;
            margin-top: 10px;
        }

        .error-message {
            color: #ff3333;
            text-align: center;
            margin-top: 10px;
        }

        @media (max-width: 600px) {
            .card {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <div class="card" >
        <h2>User Signup</h2>

        <form action="Signup.php" method="post">
            <label for="userName">Username:</label>
            <input type="text" id="userName" name="userName" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>

            <label for="fatherName">Father's Name:</label>
            <input type="text" id="fatherName" name="fatherName" required>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>

            <label for="dob">Date of Birth (DOB):</label>
            <input type="date" id="dob" name="dob" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <input type="submit" name="submit" value="Sign Up">

            <p class="message"><?php echo $message; ?></p>
        </form>
    </div>

    <!-- Optional: Add FontAwesome icons for a more modern look -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
