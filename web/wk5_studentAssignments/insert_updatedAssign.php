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
SET course_id = :courseId, 
due_date = :dueDate, 
assignment = :assignment
WHERE assignment_id = :assignmentId';
$stmt = $db->prepare($query);
$stmt->bindValue(':courseId', $courseId, PDO::PARAM_STR);
$stmt->bindValue(':dueDate', $dueDate, PDO::PARAM_STR);
$stmt->bindValue(':assignment', $assignment, PDO::PARAM_STR);
$stmt->bindValue(':assignmentId', $assignment_id, PDO::PARAM_STR);
$stmt->execute();
echo 'update was successful';

//return to page where all assignments are listed, including the updated one.
$new_page = "course_page.php?id=$courseId";

header("Location: $new_page");
die();
