<?php
require('dbConnect.php');
$db = get_db();

$courseId = htmlspecialchars($_POST['course_id']);
$courseName = htmlspecialchars($_POST['course']);
$dueDate = htmlspecialchars($_POST['dueDate']);
$assignment = htmlspecialchars($_POST['assignment']);
$assignment_id = htmlspecialchars($_POST['assignment_id']);


//update assignment in assignments table
$query = 'UPDATE assignments 
SET course_id = :courseId, due_date = :dueDate, assignment = :assignment
WHERE assignment_id = :assignmentId';
$stmt = $db->prepare($query);
$stmt->bindValue(':courseId', $courseId, PDO::PARAM_STR);
$stmt->bindValue(':dueDate', $dueDate, PDO::PARAM_STR);
$stmt->bindValue(':assignment', $assignment, PDO::PARAM_STR);
$stmt->bindValue(':assignment_id', $assignment_id, PDO::PARAM_STR);
$stmt->execute();


//return to page where all courses are listed, including the newly added one.
//$new_page = "new_assignment_form.php?id=$courseId";
$new_page = "course_page.php?id=$courseId";

header("Location: $new_page");
die();
