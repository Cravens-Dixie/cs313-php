<?php

?>

<!doctype html>
<html lang="en">
<?php
include 'student_header.php';
?>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Course (PHP course name)</h1>
        <p class="lead"> All assignments for a course are listed. </p>
        <p class="lead"> To see which students are in the course, click the "See Students" button. </p>
        <p class="lead">To add a new assignment, click the "Add Assignment" button at the bottom of the screen.</p>

    </div>
</div>
<div class="container">
    <!--           TODO php to pull assignments table for specified course-->
    <a class="btn btn-primary btn-lg" href="#" role="button">See Students</a>
    <a class="btn btn-primary btn-lg" href="new_assignment_form.php" role="button">Add Assignment</a>
<!--could add or drop a student here-->
</div>

</body>

</html>

