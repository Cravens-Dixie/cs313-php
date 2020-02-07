<?php

require('dbConnect.php');
$db = get_db();
$query = 'SELECT course_id, course_name FROM courses';
$stmt = $db->prepare($query);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
#var_dump($_POST);
?>

<!doctype html>
<html lang="en">
<?php
include('student_header.php');
?>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Courses</h1>
        <p class="lead"> Listed are all courses. To see a full assignment list or to add an assignment, click on the course.</p>
        <p class="lead">To add a new course, click the "Add Course" button at the bottom of the screen.</p>
    </div>
</div>
<div class="container">
    <h3>Course List</h3>
    <div>
        <?php
        foreach ($courses as $course){
            $id = $course['course_id'];
            $name = $course['course_name'];
            echo "<p><a href=\"course_page.php?id=$id\">$name</a></p>";
        }

        ?>
    </div>
    <button type="button" class="btn btn-primary btn-lg">See Students</button>
    <a class="btn btn-primary btn-lg" href="new_course_form.php" role="button">Add Course</a>

</div>

</body>

</html>
