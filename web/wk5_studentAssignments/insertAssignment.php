<?php
require('dbConnect.php');
$db = get_db();
$courseId = htmlspecialchars($_POST['courses']);
$assignment = htmlspecialchars($_POST['assignment']);
$dueDate = htmlspecialchars($_POST['dueDate']);
var_dump($_POST);
//insert course name into courses table
$query = 'INSERT INTO assignments(course_id, assignment, due_date) VALUES(:courseId, :assignment, :dueDate) ';
$stmt = $db->prepare($query);
$stmt->bindValue(':courseId', $courseId, PDO::PARAM_INT);
$stmt->bindValue(':assignment', $assignment, PDO::PARAM_STR_CHAR);
$stmt->bindValue(':dueDate', $dueDate, PDO::PARAM_STR);
$stmt->execute();
//$assignmentId = $db->lastInsertId("assignments_assignment_id_seq");

//return to page where all courses are listed, including the newly added one.
$new_page = "new_assignment_form.php?course_id=<?php echo $courseId ?>";

header("Location: $new_page");
die();
