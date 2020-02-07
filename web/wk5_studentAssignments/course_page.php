<?php

require('dbConnect.php');
$db = get_db();
$id = htmlspecialchars($_GET["id"]);
$stmt = $db->prepare('SELECT c. course_name, a.assignment, a.due_date FROM assignments AS a JOIN courses AS c
 ON a.course_id = c.course_id WHERE c.course_id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$names = $stmt->fetchAll(PDO::FETCH_ASSOC);
$course_name = $names[0]['course_name'];
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
        <h1 class="display-4">Course <?php echo $course_name;?>!</h1>
        <p class="lead"> All assignments for a course are listed. </p>
        <p class="lead"> To see which students are in the course, click the "See Students" button. </p>
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
            $id = $assignment['course_id'];

            echo "<p><ul><li>$course_name- $stAssignment- $dueDate</li></ul></p>";
        }

        ?>

    </p>
    <a class="btn btn-primary btn-lg" href="#" role="button">See Students</a>
    <a class="btn btn-primary btn-lg" href="new_assignment_form.php" role="button">Add Assignment</a>
<!--could add or drop a student here-->
</div>

</body>

</html>

