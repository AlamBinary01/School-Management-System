<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connection.php';

    // Collect data from the form
    $dob = $_POST['dob'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];

    // Update data in the table
    $sql = "UPDATE students SET 
            first_name='$firstName', 
            last_name='$lastName', 
            gender='$gender', 
            email='$email', 
            phone_number='$phoneNumber', 
            address='$address' 
            WHERE date_of_birth='$dob'";

    if ($con->query($sql) === TRUE) {
        echo "Student updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
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

        .go-back-button {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            position: absolute;
            top: 10px;
            left: 10px;
        }
    </style>
</head>

<body>
    <br>

    <button class="go-back-button" onclick="goToDashboard()">Go Back to Dashboard</button>
    <br>
  
    <form id="updateStudentForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <h1 style="display:center">Update Student</h1>
        <div class="form-container">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

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

            <button type="submit">Update Student</button>
        </div>
    </form>
    <script>
        function goToDashboard() {
            // You can customize the URL to the dashboard page
            window.location.href = 'dashboard.php';
        }
    </script>
</body>

</html>
