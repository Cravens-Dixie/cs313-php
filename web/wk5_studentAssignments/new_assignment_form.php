<?php

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
        <!--    TODO create correct form action-->
        <form action="#">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Courses
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <!--  TODO code here to pull courses from database, not hard coded like it is now-->
                    <li><a href="#">Pre-Calculus</a></li>
                    <li><a href="#">CS 313</a></li>
                    <li><a href="#">Epsilon</a></li>
                    <li><a href="#">Spanish</a></li>
                </ul>
            </div>
            <div class="form-group">
                <label for="dueDate">Due Date:</label>
                <input type="date" class="form-control" id="dueDate">
            </div>
            <div class="form-group">
                <label for="assignment">Assignment Instructions:</label>
                <textarea class="form-control" rows="5" id="assignment"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>

        </form>
    </div>

    </body>
</html>
