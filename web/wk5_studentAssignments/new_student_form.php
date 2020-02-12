<?php
require('dbConnect.php');
$db = get_db();
?>
<!DOCTYPE html>
<html>
<?php
include 'student_header.php';
?>
<body>

<div class="container">
    <h2>Create a new student</h2>
    <p>Type in the new student's full name in the box below.</p>
<!--    TODO create correct form action-->
    <form action="#">
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" class="form-control" id="name">
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
            $name = $course['name'];
            echo '<div class="checkbox">';
            echo "<input type='checkbox' name='chkTopics[]' id='chkTopics$id' value='$id'>";
            echo "<label for='chkTopics$id'>$name</label></div>";

        }

        ?>
<!--        <div class="checkbox">-->
<!--            <label><input type="checkbox" value="">Course 1</label>-->
<!--        </div>-->
<!--        <div class="checkbox">-->
<!--            <label><input type="checkbox" value="">Course 2</label>-->
<!--        </div>-->
<!--        <div class="checkbox">-->
<!--            <label><input type="checkbox" value="">Course 3</label>-->
<!--        </div>-->
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
</div>


</body>
</html>