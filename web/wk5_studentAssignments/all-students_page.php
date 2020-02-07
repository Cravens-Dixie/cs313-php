<?php
session_start();
require('dbConnect.php');
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
        <!--        TODO php tp pull student name into welcome statement-->
        <h1 class="display-4">Students Page</h1>
        <p class="lead"> Click on a student to see info for that student.</p>
        <p class="lead">To add a new student, click the "Add Student" button.</p>
    </div>
</div>
<div class="container">
    <!--           TODO php to pull ALL student as links-->
    <h3>Students</h3>
    <div>
        <?php
        $statement = $db->prepare('SELECT student_id, student_name FROM students');
        $statement->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $name = $row['student_name'];
            $id = $row['student_id'];
            #$_SESSION['student_name'] = $name;
            $_SESSION['student_id'] = $_GET["id"];


            echo '<p><a href=\"student_page.php?id=$id\">$name</a></p>';
        }
        ?>
    </div>
    <a class="btn btn-primary" href="new_student_form.php" role="button">Add Student</a>

</div>

</body>

</html>

