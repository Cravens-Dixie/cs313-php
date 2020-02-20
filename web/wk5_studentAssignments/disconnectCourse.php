<?php
require('dbConnect.php');
$db = get_db();
if (!isset($_GET['course_id'])) {
    die("Error, course id not specified");
}
$courseId = htmlspecialchars($_GET['course_id']);
$studentId = htmlspecialchars($_GET['student_id']);

//var_dump($courseId);

//coming from student_page to delete a course from a student. Passing course_id and student_id.
$query = 'DELETE FROM student_course
WHERE student_id = :student_id AND course_id = :course_id';
$stmt = $db->prepare($query);
$stmt->bindValue(':student_id', $studentId, PDO::PARAM_INT);
$stmt->bindValue(':course_id', $courseId, PDO::PARAM_INT);
$stmt->execute();


$new_page = "student_page.php?id=$studentId";

header("Location: $new_page");
die();
