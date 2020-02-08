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
WHERE courses.course_id=:id';
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$names = $stmt->fetchAll(PDO::FETCH_ASSOC);
$course_name = $names[0]['course_name'];
#var_dump($names);
#var_dump($course_name);
?>

<!doctype html>
<html lang="en">
<?php
include 'student_header.php';
?>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Course <?php echo $course_name;?>!</h1>
        <p class="lead"> All assignments for a course are listed. </p>
        <p class="lead"> To see which students are in the course, click the "See Students" button. Maybe. It's tricky.</p>
        <p class="lead">To add a new assignment, click the "Add Assignment" button at the bottom of the screen.</p>

    </div>
</div>
<div class="container">
    <h3>All Assignments for <?php echo $course_name;?> </h3>
    <p>
        <?php
        foreach ($names as $assignment){
            $name = $assignment['course_name'];
            $stAssignment = $assignment['assignment'];
            $dueDate = $assignment['due_date'];


            echo "<p><ul><li>$course_name- $stAssignment- $dueDate</li></ul></p>";
        }

        ?>

    </p>
    <button type="button" class="btn btn-primary btn-lg" id="seeStudents">See Students</button>
<!--    <a class="btn btn-primary btn-lg" href="#" role="button">See Students</a>-->
    <a class="btn btn-primary btn-lg" href="new_assignment_form.php" role="button">Add Assignment</a>
<!--could add or drop a student here-->
    <div id="studentsList">
    </div>
</div>

</body>

</html>

