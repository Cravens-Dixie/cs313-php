<?php
session_start();
require('dbConnect.php');
print_r($_SESSION);

var_dump($_GET);
$_SESSION['student_id'] = (int)$_GET["id"];
?>

<!doctype html>
<html lang="en">
<?php
include 'student_header.php';
?>
    <body>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
        <!--        TODO php tp pull student name into welcome statement-->
                <h1 class="display-4"><?php
                    $db->query('SELECT student_name FROM students WHERE student_id = $_SESSION[\'student_id\']');
                    echo 'Welcome' . ' ' .  students.student_name . '!'; ?></h1>
                <p class="lead"> Listed are courses and related assignments for the next 7 days. To see a full assignment list, click on the course.</p>
                <p class="lead">To add a new course, click the "Add Course" button at the bottom of the screen.</p>
            </div>
        </div>
        <div class="container">
<!--           TODO php to pull student-assignment table for selected student-->
            <a class="btn btn-primary btn-lg" href="new_course_form.php" role="button">Add Course</a>
<!--could drop a course or edit student here-->
        </div>

    </body>

</html>
