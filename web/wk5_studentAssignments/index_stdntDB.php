<?php

?>

<!doctype html>
<?php
include 'student_header.php';
?>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Courses and Assignments </h1>
        <p class="lead">Welcome students and teachers! Please select what you would like to do.</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h3>Students</h3>
            <p><b>Current Student</b> shows courses and assignments for a selected student.</p>
            <p><b>Add Student</b> allows a new student to be created.</p>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Current Students
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <!--  TODO code here to pull students from database, not hard coded like it is now-->
                    <li><a href="#">Catherine Cravens</a></li>
                    <li><a href="#">Seth Cravens</a></li>
                    <li><a href="#">Dixie Cravens</a></li>
                </ul>
                <a class="btn btn-primary btn-lg" href="new_student_form.php" role="button">Add Student</a>
            </div>

        </div>
        <div class="col-sm-6">
            <h3>Courses and Assignments</h3>
            <p><b>Current Courses and Assignments</b> allows assignments to be created and viewed at the course level.</p>
            <p><b>Add Course</b> allows a course to be created and then create related assignments.</p>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Current Courses & Assignments
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <!--  TODO code here to pull courses from database, not hard coded like it is now-->
                    <li><a href="#">Pre-Calculus</a></li>
                    <li><a href="#">CS 313</a></li>
                    <li><a href="#">Epsilon</a></li>
                    <li><a href="#">Spanish</a></li>
                </ul>
                <a class="btn btn-primary btn-lg" href="new_course_form.php" role="button">Add Course</a>
            </div>
        </div>
    </div>



</div>

</body>
</html>
