<?php
session_start();
require('dbConnect.php');
#var_dump($_POST);
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
        <h1 class="display-4">Students Page</h1>
        <p class="lead"> Click on a student to see info for that student.</p>
        <p class="lead">To add a new student, click the "Add Student" button.</p>
    </div>
</div>
<div class="container">
    <!--           TODO php to pull ALL student as links-->
    <h3>Students</h3>
    <div>
        <?php

        foreach ($db->query('SELECT student_id, student_name FROM students') AS $row) {

            echo '<a href="student_page.php?id=' . $row['student_id'] . '">' .  $row['student_name'] . '</a>';
        }
        ?>
    </div>
    <a class="btn btn-primary btn-lg" href="new_student_form.php" role="button">Add Student</a>

</div>

</body>

</html>
