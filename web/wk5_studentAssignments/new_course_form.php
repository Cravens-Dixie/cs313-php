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
        <!--    TODO create correct form action-->
        <form action="#">
            <div class="form-group">
                <label for="course">Course Name:</label>
                <input type="text" class="form-control" id="course">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </div>
<!--    TODO maybe hide this until submit button is clicked-->
    <div class="container">
        <a class="btn btn-primary btn-lg" href="new_assignment_form.php" role="button">Add Assignment</a>
    </div>


    </body>
    </html>

