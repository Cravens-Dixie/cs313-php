<?php

require('dbConnect.php');
$db = get_db();
$id = htmlspecialchars($_GET["id"]);
$stmt = $db->prepare('SELECT course_name FROM courses WHERE course_id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$names = $stmt->fetchAll(PDO::FETCH_ASSOC);
$name = $names[0]['course_name'];
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
        <h1 class="display-4">Course <?php
            echo $name;?>!</h1>
        <p class="lead"> All assignments for a course are listed. </p>
        <p class="lead"> To see which students are in the course, click the "See Students" button. </p>
        <p class="lead">To add a new assignment, click the "Add Assignment" button at the bottom of the screen.</p>

    </div>
</div>
<div class="container">

    <a class="btn btn-primary btn-lg" href="#" role="button">See Students</a>
    <a class="btn btn-primary btn-lg" href="new_assignment_form.php" role="button">Add Assignment</a>
<!--could add or drop a student here-->
</div>

</body>

</html>

