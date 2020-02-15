<?php
require('dbConnect.php');
$db = get_db();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'student_header.php';
?>
<body>

<div class="container pt-4">
    <h2 class="pt-5">New Student</h2>
    <p>Type in the new student's full name in the box below.</p>

    <form action="insertStudent.php" method="post">
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <h2>Select Courses</h2>
        <p>Check every course student is taking:</p>
        <?php
        $stmt = $db->prepare('SELECT course_id, course_name FROM courses');
        $stmt->execute();
        $courses =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($courses AS $course)
        {
            $id = $course['course_id'];
            $name = $course['course_name'];
            echo '<div class="form-check">';
            echo "<input class='form-check-input' type='checkbox' name='chkCourses[]' id='defaultCheck$id' value='$id'>";
            echo "<label class='form-check-label' for='defaultCheck$id'>$name</label></div>";

        }
        ?>

        <button type="submit" class="btn btn-primary">Add Student</button>
    </form>
</div>
<?php
include('footer_assignmentTracker.php');
?>
</body>
</html>