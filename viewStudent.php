<?php
include 'connection.php';

// Function to fetch all student records
function getAllStudents()
{
    global $con;
    $sql = "SELECT * FROM students";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return array();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Students</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .button-container {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            
        }

        .button-container button {
            padding: 5px 10px;
            cursor: pointer;
            
        }

        .button-container button.update {
            background-color: #4CAF50;
            color: white;
            border: none;
        }
    </style>
</head>

<body>
    <br>

<br>

    <div class="button-container">
        <button onclick="goToDashboard()">Go to Dashboard</button>
    </div>
    <h1>View Students</h1>
    <table>
        <thead>
            <tr>
                <th>Date of Birth</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $students = getAllStudents();

            foreach ($students as $student) {
                echo "<tr>";
                echo "<td>{$student['date_of_birth']}</td>";
                echo "<td>{$student['first_name']}</td>";
                echo "<td>{$student['last_name']}</td>";
                echo "<td>{$student['gender']}</td>";
                echo "<td>{$student['email']}</td>";
                echo "<td>{$student['phone_number']}</td>";
                echo "<td>{$student['address']}</td>";
                echo "<td class='button-container'>
                        <button class='update' onclick=\"updateStudent('{$student['date_of_birth']}')\">Update</button>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        function goToDashboard() {
            window.location.href = "dashboard.php";
        }

        function updateStudent(dob) {
            window.location.href = "updateStudent.php?dob=" + dob;
        }
    </script>
</body>

</html>
