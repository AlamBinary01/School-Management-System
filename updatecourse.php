<?php
include 'connection.php';

// Initialize variables
$courseId = $courseName = $courseCode = $courseDescription = $instructorName = $department = $credits = $courseStartDate = $courseEndDate = $location = '';

// Handle form submission for updating course information
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect updated data from the form
    $courseId = $_POST['courseId'];
    $updatedCourseName = $_POST['courseName'];
    $updatedCourseCode = $_POST['courseCode'];
    $updatedCourseDescription = $_POST['courseDescription'];
    $updatedInstructorName = $_POST['instructorName'];
    $updatedDepartment = $_POST['department'];
    $updatedCredits = $_POST['credits'];
    $updatedCourseStartDate = $_POST['courseStartDate'];
    $updatedCourseEndDate = $_POST['courseEndDate'];
    $updatedLocation = $_POST['location'];

    // Update data in the database
    $updateSql = "UPDATE courses SET
        course_name = '$updatedCourseName',
        course_code = '$updatedCourseCode',
        course_description = '$updatedCourseDescription',
        instructor_name = '$updatedInstructorName',
        department = '$updatedDepartment',
        credits = '$updatedCredits',
        course_start_date = '$updatedCourseStartDate',
        course_end_date = '$updatedCourseEndDate',
        location = '$updatedLocation'
        WHERE course_id = $courseId";

    if ($con->query($updateSql) === TRUE) {
        echo "Course updated successfully";
    } else {
        echo "Error updating course: " . $con->error;
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    // Fetch course details by ID
    $courseId = $_GET['id'];
    $sql = "SELECT * FROM courses WHERE course_id = $courseId";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Store fetched values into variables
        $courseName = $row['course_name'];
        $courseCode = $row['course_code'];
        $courseDescription = $row['course_description'];
        $instructorName = $row['instructor_name'];
        $department = $row['department'];
        $credits = $row['credits'];
        $courseStartDate = $row['course_start_date'];
        $courseEndDate = $row['course_end_date'];
        $location = $row['location'];
    } else {
        echo "Course not found";
        exit();
    }
} else {
    echo "Invalid request";
    exit();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
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

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        label {
            width: 48%;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        textarea,
        select {
            width: 48%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h2>Update Course</h2>

    <form method="post" action="">
        <!-- Hidden input field for course ID -->
        <input type="hidden" name="courseId" value="<?php echo $courseId; ?>">

        <!-- Your form fields with values fetched from the database -->
        <label for="courseName">Course Name:</label>
        <input type="text" id="courseName" name="courseName" value="<?php echo $courseName; ?>" required>

        <label for="courseCode">Course Code:</label>
        <input type="text" id="courseCode" name="courseCode" value="<?php echo $courseCode; ?>" required>

        <label for="courseDescription">Course Description:</label>
        <textarea id="courseDescription" name="courseDescription" rows="4" required><?php echo $courseDescription; ?></textarea>

        <label for="instructorName">Instructor Name:</label>
        <input type="text" id="instructorName" name="instructorName" value="<?php echo $instructorName; ?>" required>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" value="<?php echo $department; ?>" required>

        <label for="credits">Credits:</label>
        <input type="number" id="credits" name="credits" value="<?php echo $credits; ?>" required>

        <label for="courseStartDate">Course Start Date:</label>
        <input type="date" id="courseStartDate" name="courseStartDate" value="<?php echo $courseStartDate; ?>" required>

        <label for="courseEndDate">Course End Date:</label>
        <input type="date" id="courseEndDate" name="courseEndDate" value="<?php echo $courseEndDate; ?>" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo $location; ?>" required>

        <button type="submit">Update Course</button>
    </form>
</body>

</html>
