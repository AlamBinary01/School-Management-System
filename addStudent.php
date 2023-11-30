<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connection.php';

    // Collect data from the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];

    // Insert data into the table
    $sql = "INSERT INTO students (first_name, last_name, gender, email, phone_number, address) VALUES ('$firstName', '$lastName',  '$gender', '$email', '$phoneNumber', '$address')";

    if ($con->query($sql) === TRUE) {
        $message = "New student added successfully";
        // Redirect to the dashboard after successful addition
        header("Location: dashboard.php?message=" . urlencode($message));
        exit();
    } else {
        $errorMessage = "Error: " . $sql . "<br>" . $con->error;
        echo "Error: " . $errorMessage;
    }

    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-container label {
            width: 48%;
            margin-bottom: 8px;
            color: #333;
        }

        .form-container input,
        .form-container select {
            width: 48%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-container button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        .go-back-button {
            margin: 20px;
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
</head>

<body>
    <br>
    <h1>Add Students</h1>
    <a href="dashboard.php" class="go-back-button">Go Back to Dashboard</a>
    <br>


    <div id="successMessage" style="color: green;"></div>
    <br>
    <br>
    <div id=" errorMessage" style="color: red;"></div>
    <br>
   
    
    <form id="studentForm" method="post" onsubmit="event.preventDefault(); addStudent();">
        <div class="form-container">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>

           

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber">

            <label for="address">Address:</label>
            <input type="text" id="address" name="address">

            <button type="submit">Add Student</button>
        </div>
    </form>

    <script>
        function addStudent() {
            // Collect form data
            var formData = new FormData(document.getElementById("studentForm"));

            // Make AJAX request to PHP backend
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "addStudent.php", true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Student added successfully, display success message
                    document.getElementById("successMessage").innerHTML = "Student Successfully Added";
                } else {
                    document.getElementById("errorMessage").innerHTML = "Error";
                }
            };
            xhr.send(formData);
        }
    </script>

</body>

</html>
