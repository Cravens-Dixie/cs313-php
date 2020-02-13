<?php

require('dbConnect.php');
$db = get_db();
$query = 'SELECT student_id, student_name FROM students';
$stmt = $db->prepare($query);
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<?php include('student_header.php');?>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <!--        TODO php tp pull student name into welcome statement-->
        <h1 class="display-4">Students Page</h1>
        <p class="lead"> Click on a student to see courses and assignments for that student.</p>
        <p class="lead">To add a new student, click the "Add Student" button.</p>
    </div>
</div>
<div class="container">
    <!--           TODO php to pull ALL student as links-->
    <h3>Students</h3>
    <div>
        <?php
                foreach ($students as $student){
                    $id = $student['student_id'];
                    $name = $student['student_name'];
                    echo "<p><a href='student_page.php?id=$id'>$name</a></p>";
                }

        ?>
    </div>
    <a class="btn btn-primary" href="new_student_form.php" role="button">Add Student</a>

</div>

</body>

</html>

