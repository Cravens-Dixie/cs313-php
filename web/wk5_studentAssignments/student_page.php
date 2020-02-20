<?php
require('dbConnect.php');
$db = get_db();

//get student_id from $_GET. coming from all-student_page
$id = htmlspecialchars($_GET["id"]);

//get and display student name using student_id.
$query = 'SELECT 
student_name   
FROM students 
WHERE student_id=:id';
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$names = $stmt->fetchAll(PDO::FETCH_ASSOC);
$name = $names[0]['student_name'];

?>

<!doctype html>
<html lang="en">
<?php
include 'student_header.php';
?>
    <body>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Welcome <?php echo $name;?>!</h1>
                <p class="lead"> Listed are your courses and related assignments.</p>
                <p class="lead">To add a new course, click the "Add Course" button at the bottom of the screen.</p>
            </div>
        </div>

        <div class="container">
            <?php
            //select all assignments for a student, ordered by course. Use student_id. Display.
            $query2 = 'SELECT 
                        c.course_name,
                        a.assignment,
                        a.due_date
                        FROM courses c 
                        INNER JOIN assignments a ON a.course_id = c.course_id
                        INNER JOIN student_course t ON t.course_id = c.course_id
                        INNER JOIN students s ON s.student_id = t.student_id
                        WHERE s.student_id= :id
                        ORDER BY c.course_name';
            $stmt2 = $db->prepare($query2);
            $stmt2->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt2->execute();
            $assignments = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                foreach ($assignments as $assignment) {
                    $course_name = $assignment['course_name'];
                    $asmt = $assignment['assignment'];
                    $due_date = $assignment['due_date'];
                    echo "<p><ul><li>$course_name: $asmt --$due_date </li></ul></p>";
                }
            ?>
<!--            To add a course Link a course to a student using a drop down menu link-->
            <div class="dropdown show">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add Course</a><br><br>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
<!--                get all courses as a dropdown menu, send courseId and studentId to connectCourse-->
                <?php
                $query3 = 'SELECT course_id, course_name FROM courses';
                $stmt3 = $db->prepare($query3);
                $stmt3->execute();
                $courses = $stmt3->fetchAll(PDO::FETCH_ASSOC);
                foreach ($courses as $course){
                    $name = $course['course_name'];
                    $courseId = $course['course_id'];
                    echo "<a class='dropdown-item' href='connectCourse.php?course_id=$courseId&student_id=$id'>$name</a>";
//                    echo "<li><a href='connectCourse.php?course_id=$courseId&student_id=$id'>$name</a></li>";
                }
                ?>
                </div>
            </div>


            <!-- To drop a course, Link a course to a student using a drop down menu link-->
            <div class="dropdown show">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Delete Course</a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
<!--                    get all courses as a dropdown menu, send courseId and studentId to connectCourse-->
                    <?php
                    $query4 = 'SELECT course_id, course_name FROM courses';
                    $stmt4 = $db->prepare($query4);
                    $stmt4->execute();
                    $courses = $stmt4->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($courses as $course){
                        $name = $course['course_name'];
                        $courseId = $course['course_id'];
                        echo "<a class='dropdown-item' href='disconnectCourse.php?course_id=$courseId&student_id=$id'>$name</a>";
//                    echo "<li><a href='connectCourse.php?course_id=$courseId&student_id=$id'>$name</a></li>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include('footer_assignmentTracker.php');?>
    </body>

</html>
