<?php
require('dbConnect.php');
$db = get_db();

//course_id from all_courses_page
$id = htmlspecialchars($_GET["id"]);

//query database for all assignments in a course. Use course_id ($_GET)
$query = 'SELECT  
c.course_name, 
a.assignment, 
a.due_date,
a.assignment_id   
FROM courses c
JOIN assignments a 
ON a.course_id = c.course_id
WHERE courses.course_id=:id';
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$assignments = $stmt->fetchAll(PDO::FETCH_ASSOC);
$course_name = $assignments[0]['course_name'];

//echo 'assignments query results:';
//var_dump($assignments);
//echo 'course name';
//var_dump($course_name);

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
    <p>Click on an assignment to update it.
    </p>

    <p>
        <?php

        foreach ($assignments as $assignment){
//            $name = $assignment['course_name'];
            $stAssignment = $assignment['assignment'];
            $dueDate = $assignment['due_date'];
            $aid = $assignment['assignment_id'];

            //link to update_assignment page with a push of assignment_id ***also needs array of student_id(s)*Now in $_SESSION
            echo "<p><ul><li><a href='update_assignment.php?assign_id=$aid'>$course_name- $stAssignment- $dueDate</a></li></ul></p>";
        }

        ?>
    </p>

    <a class="btn btn-primary btn-lg" href="new_assignment_form.php?id=<?php echo $id;?>" role="button">Add Assignment</a>

    <div>
        <h3>Students in course:</h3>
        <p id="studentsList">
            <?php
            //query for student names that are assigned this course
            $query2 = 'SELECT
                    s.student_name
                    FROM students s
                    JOIN student_course c
                    ON s.student_id = c.student_id
                    WHERE c.course_id=:id';
            $stmt2 = $db->prepare($query2);
            $stmt2->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt2->execute();
            $names = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($names as $students){
                $student = $students;

                echo "<p><ul><li>$student</li></ul></p>";
            }

            ?>

        </p>
    </div>
</div>
<?php include('footer_assignmentTracker.php');?>
</body>

</html>

