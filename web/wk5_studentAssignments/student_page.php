<?php

require('dbConnect.php');
$db = get_db();
$id = htmlspecialchars($_GET["id"]);
$query = 'SELECT 
students.student_name, 
courses.course_name, 
assignments.assignment, 
assignments.due_date    
FROM students
INNER JOIN student_assignment ON student_assignment.student_id = students.student_id
INNER JOIN assignments ON student_assignment.assignment_id = assignments.assignment_id
INNER JOIN courses ON assignments.course_id = courses.course_id
WHERE students.student_id=:id
ORDER BY courses.course_name';
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$names = $stmt->fetchAll(PDO::FETCH_ASSOC);
$name = $names[0]['student_name'];
$course_name = $names[1]['course_name'];
$asmt = $names[2]['assignment'];
$due_date = $names[3]['due_date'];
#print_r($_SESSION);
#var_dump($_GET);
?>

<!doctype html>
<html lang="en">
<?php
include 'student_header.php';
?>
    <body>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Welcome <?php
                    echo $name;?>!</h1>
                <p class="lead"> Listed are your courses and related assignments.</p>
                <p class="lead">To add a new course, click the "Add Course" button at the bottom of the screen.</p>
            </div>
        </div>
        <div class="container">
            <?php
                foreach ($names as $assignment) {
                    $course_name = $assignment['course_name'];
                    $asmt = $assignment['assignment'];
                    $due_date = $assignment['due_date'];
                    echo "<p><ul><li>$course_name: $asmt --$due_date </li></ul></p>";
                }
            ?>

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Add Course
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
<!--                    TODO add ability to list all courses, not just ones associated with student-->
                <?php
                $query = 'SELECT course_name FROM courses';
                $stmt = $db->prepare($query);
                $stmt->execute();
                $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($courses as $course){
                    $name = $course['course_name'];
                    echo "<li><a href=\"#\">$name</a></li>";
                }
                ?>
                </ul>
            </div>
            <!--could drop a course or edit student here-->
        </div>

    </body>

</html>
