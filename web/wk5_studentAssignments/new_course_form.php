<?php

?>
    <!DOCTYPE html>
    <html>
<?php
include 'student_header.php';
?>
    <body>

    <div class="container">
        <h2>Create a new course</h2>
        <p>Type the new course title in the box below.</p>
        <form action="insertCourse.php" method="post">
            <div class="form-group">
                <label for="course">Course Name:</label>
                <input type="text" name="course" class="form-control" id="course">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </div>

    </body>
    </html>

