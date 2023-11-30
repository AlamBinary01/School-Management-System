<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $courseId = $_GET['id'];

    // Delete the course from the database
    $sql = "DELETE FROM courses WHERE course_id = $courseId";
    
    if ($con->query($sql) === TRUE) {
        echo "Course deleted successfully";
    } else {
        echo "Error deleting course: " . $con->error;
    }

    $con->close();
}

header("Location: courses_update.php"); // Redirect back to the courses_update.php page
exit();
?>
