<?php
require('dbConnect.php');
$db = get_db();

//get $_POST info from new_assignment_form
$courseId = htmlspecialchars($_POST['courses']);
$assignment = htmlspecialchars($_POST['assignment']);
$dueDate = htmlspecialchars($_POST['dueDate']);

try {
    //insert course name into courses table
    $query = 'INSERT INTO assignments(course_id, due_date, assignment) VALUES(:courseId, :dueDate, :assignment) ';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':courseId', $courseId, PDO::PARAM_STR);
    $stmt->bindValue(':dueDate', $dueDate, PDO::PARAM_STR);
    $stmt->bindValue(':assignment', $assignment, PDO::PARAM_STR);
    $stmt->execute();
    //get new assignment_id for next query
    $assignmentId = $db->lastInsertId("assignments_assignment_id_seq");
    echo "assignment id: $assignmentId";

}
catch (PDOException $e) {
    echo "connection failed";
}

//return to page where all courses are listed, including the newly added one.
$new_page = "course_page.php?id=$courseId";

header("Location: $new_page");
die();
