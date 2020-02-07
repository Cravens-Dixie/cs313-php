<?php

require('dbConnect.php');
$db = get_db();
$id = htmlspecialchars($_GET["id"]);
$query = 'SELECT c.student_name, s.assignment_id FROM student_assignment AS s JOIN students AS c
 ON s.student_id = c.student_id WHERE c.student_id=:id';
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$names = $stmt->fetchAll(PDO::FETCH_ASSOC);
$name = $names[0]['student_name'];
$asId = $names[1]['assignment_id'];
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
        <!--        TODO php tp pull student name into welcome statement-->
                <h1 class="display-4">Welcome <?php
                    echo $name;?>!</h1>
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
