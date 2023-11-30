<?php
include 'connection.php';

// Fetch all courses from the database
$sql = "SELECT * FROM courses";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Courses</title>
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

        .course-table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .course-table th,
        .course-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .course-table th {
            background-color: #4CAF50;
            color: white;
        }

        .edit-button {
            background-color: #3498db;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-button {
            background-color: #e74c3c;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <h2>Update Courses</h2>

    <table class="course-table">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Instructor Name</th>
                <th>Department</th>
                <th>Credits</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['course_name'] . "</td>";
                    echo "<td>" . $row['course_code'] . "</td>";
                    echo "<td>" . $row['instructor_name'] . "</td>";
                    echo "<td>" . $row['department'] . "</td>";
                    echo "<td>" . $row['credits'] . "</td>";
                    echo "<td>" . $row['course_start_date'] . "</td>";
                    echo "<td>" . $row['course_end_date'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>";
                    echo "<a class='edit-button' href='updatecourse.php?id=" . $row['course_id'] . "'>Edit</a>";
                    echo "<a class='delete-button' href='deletecourse.php?id=" . $row['course_id'] . "'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No courses found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>
