<?php
require('dbConnect.php');
$db = get_db();

$courseId = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<?php
include 'student_header.php';
?>
    <body>

    <div class="container">
        <h2>Create a new Assignment</h2>
        <p>Select a course from the menu. Note, the course must exist before any assignments are created.</p>
        <p>Click on the desired course and the fields will become available.</p>

        <form action='insertAssignment.php' method="post">
            <div class="dropdown">
                <label for="courses" id="mytext"></label>
                <select id="dropdownOp" name="courses">
                    <?php
                    $query = 'SELECT course_id, course_name FROM courses';
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($courses as $course) {
                        $name = $course['course_name'];
                        $course_Id = $course['course_id'];

                        echo '<option value="' . $name . '" ' . 'id="' . $name. '"'.
                             (($course_Id == $courseId) ? 'selected = "selected"' : "") . '>' . $name . '</option>';

                    }
                    ?>

            </div>
            <div class="form-group">
                <label for="dueDate">Due Date:</label>
                <input type="date" name="dueDate" class="form-control" id="dueDate">
            </div>
            <div class="form-group">
                <label for="assignment">Assignment Instructions:</label>
                <textarea class="form-control" rows="5" id="assignment"></textarea>
            </div>
<!--            submit button should stay on this page (give a button or navigation to change pages?)-->
            <button type="submit" class="btn btn-default">Submit</button>

        </form>
    </div>

    </body>
</html>
