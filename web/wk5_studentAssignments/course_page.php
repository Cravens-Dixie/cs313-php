<?php

require('dbConnect.php');
$db = get_db();
$id = htmlspecialchars($_GET["id"]);//course_id
$query = 'SELECT 
students.student_name, 
courses.course_name, 
assignments.assignment, 
assignments.due_date,
assignments.assignment_id    
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
include('student_header.php');
?>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Course <?php echo $course_name;?>!</h1>
        <p class="lead"> All assignments for a course are listed. </p>
        <p class="lead"> All students assigned to a course are listed.</p>
        <p class="lead">To add a new assignment, click the "Add Assignment" button at the bottom of the screen.</p>

    </div>
</div>

<div class="container">
    <h3>All Assignments for <?php echo $course_name;?> </h3>
    <p>Click on an assignment to update it.</p>
    <p>
        <?php
        foreach ($names as $assignment){
            $name = $assignment['course_name'];
            $stAssignment = $assignment['assignment'];
            $dueDate = $assignment['due_date'];
            $aid = $assignment['assignment-id'];

            //link to update_assignment page with a push of course_id
            echo "<p><ul><li><a href='update_assignment.php?id=$aid'>$course_name- $stAssignment- $dueDate</a></li></ul></p>";
        }

        ?>
    </p>

    <a class="btn btn-primary btn-lg" href="new_assignment_form.php?id=<?php echo $id ?>" role="button">Add Assignment</a>

<!--could add or drop a student here-->
    <div>
        <h3>Students in course:</h3>
        <p id="studentsList">
            <?php
            foreach ($names as $students){
                $student = $students['student_name'];

                echo "<p><ul><li>$student</li></ul></p>";
            }

            ?>

        </p>
    </div>
</div>
<?php include('footer_assignmentTracker.php');?>
</body>

</html>

