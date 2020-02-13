<?php
require('dbConnect.php');
$db = get_db();
if (!isset($_GET['course_id'])) {
    die("Error, course id not specified");
}
$courseId = htmlspecialchars($_GET['course_id']);
$studentId = htmlspecialchars($_GET['student_id']);

//var_dump($courseId);

//use courseId($_GET) to get assignment(s) as assignment_id from assignments table
// use assignment_id and $studentId($_GET) to INSERT into student_assignment table

$query = 'INSERT INTO students(student_name) VALUES(:studentName) ';
$stmt = $db->prepare($query);
$stmt->bindValue(':studentName', $studentName , PDO::PARAM_STR);
$stmt->execute();
$studentId = $db->lastInsertId("students_student_id_seq");

var_dump($studentId);//returns string(2) "25"

