<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connection.php';

    // Collect data from the form
    $courseName = $_POST['courseName'];
    $courseCode = $_POST['courseCode'];
    $courseDescription = $_POST['courseDescription'];
    $instructorName = $_POST['instructorName'];
    $department = $_POST['department'];
    $credits = $_POST['credits'];
    $courseStartDate = $_POST['courseStartDate'];
    $courseEndDate = $_POST['courseEndDate'];
    $location = $_POST['location'];

    // Insert data into the table
    $sql = "INSERT INTO courses (course_name, course_code, course_description, instructor_name, department, credits, course_start_date, course_end_date, location) VALUES ('$courseName', '$courseCode', '$courseDescription', '$instructorName', '$department', '$credits', '$courseStartDate', '$courseEndDate', '$location')";

    if ($con->query($sql) === TRUE) {
        echo "New course added successfully";
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
    <title>Add Course</title>
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
        }
    </style>
</head>

<body>
    <a href="dashboard.php" class="go-back-button">Go Back to Dashboard</a>
    <br>
    <form id="courseForm" method="post" onsubmit="event.preventDefault(); addCourse();">
        <div class="form-container">
            <label for="courseName">Course Name:</label>
            <input type="text" id="courseName" name="courseName" required>

            <label for="courseCode">Course Code:</label>
            <input type="text" id="courseCode" name="courseCode" required>

            <label for="courseDescription">Course Description:</label>
            <textarea id="courseDescription" name="courseDescription" rows="4" required></textarea>

            <label for="instructorName">Instructor Name:</label>
            <input type="text" id="instructorName" name="instructorName" required>

            <label for="department">Department:</label>
            <input type="text" id="department" name="department" required>

            <label for="credits">Credits:</label>
            <input type="number" id="credits" name="credits" required>

            <label for="courseStartDate">Course Start Date:</label>
            <input type="date" id="courseStartDate" name="courseStartDate" required>

            <label for="courseEndDate">Course End Date:</label>
            <input type="date" id="courseEndDate" name="courseEndDate" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <button type="submit">Add Course</button>
        </div>
    </form>

    <script>
        function addCourse() {
            // Collect form data
            var formData = new FormData(document.getElementById("courseForm"));

            // Make AJAX request to PHP backend
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "courses_add.php", true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert(xhr.responseText);
                    // You can redirect or perform additional actions here
                } else {
                    alert("Error: " + xhr.statusText);
                }
            };
            xhr.send(formData);
        }
    </script>
</body>

</html>
