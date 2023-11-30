<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        #sidebar {
            width: 200px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        .dashboard {
            flex: 1;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            display: block;
            padding: 10px;
            background-color: #444;
            border-radius: 5px;
        }

        #logout {
            margin-top: auto;
            cursor: pointer;
            padding: 10px;
            background-color: #e74c3c;
            border: none;
            border-radius: 5px;
            color: #fff;
        }

        .initial-image {
            text-align: center;
            margin-top: 50px;
        }

        .initial-image img {
            display: block;
            margin: 0 auto;
            max-width: 500px;
            max-height: 500px;
            width: auto;
            height: auto;
        }

        h1 {
            color: #333;
        }
    </style>
    <title>Student Dashboard</title>
</head>

<body>
    <div id="sidebar">
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="addStudent.php" onclick="openTab('addStudent')">Add Student</a></li>
            <li><a href="updateStudent.php" onclick="openTab('updateStudent')">Update Student</a></li>
            <li><a href="viewStudent.php" onclick="openTab('vieweStudent')">View Student</a></li>
            <li><a href="courses_add.php" onclick="openTab('addCourse')">Add course</a></li>
            <li><a href="courses_update.php" onclick="openTab('updateCourse')">Update Course</a></li>
            <li><a href="courses_view.php" onclick="openTab('viewCourses')">View Course</a></li>
        </ul>
        <button id="logout" onclick="logout()">Logout</button>
    </div>

    <div class="dashboard">
        <h1>Admin Dashboard</h1>

        <div class="initial-image">
            <img src="school.png" alt="Initial Image">
           
        </div>
    </div>

    <script>
        function openTab(tabName) {
            var i;
            var tabContent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabContent.length; i++) {
                tabContent[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
            document.querySelector('.initial-image').style.display = 'none';
        }

        function logout() {
            var confirmLogout = confirm("Are you sure you want to logout?");
            if (confirmLogout) {
                alert("Logout successful. Thank you!");
                // You can redirect or perform additional logout actions here
            }
        }
    </script>
</body>
</html>
