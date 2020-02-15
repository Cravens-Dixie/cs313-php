<?php

?>
    <!DOCTYPE html>
    <html>
<?php
include 'student_header.php';
?>
    <body>

    <div class="container pt-4">
        <h2 class="pt-5">New Course</h2>
        <p>Type the new course title in the box below.</p>
        <form action="insertCourse.php" method="post">
            <div class="form-group">
                <label for="course">Course Name:</label>
                <input type="text" name="course" class="form-control" id="course">
            </div>
            <button type="submit" class="btn btn-primary">Add Course</button>
        </form>

    </div>
    <?php include('footer_assignmentTracker.php');?>
    </body>
    </html>

