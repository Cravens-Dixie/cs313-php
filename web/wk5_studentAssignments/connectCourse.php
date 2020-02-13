<?php
require('dbConnect.php');
$db = get_db();
if (!isset($_GET['course_id'])) {
    die("Error, course id not specified");
}
$courseId = htmlspecialchars($_GET['course_id']);
$studentId = htmlspecialchars($_GET['student_id']);

//var_dump($courseId);

//use courseId($_GET) to SELECT assignment(s) as assignment_id from assignments table
// use assignment_id and $studentId($_GET) to INSERT into student_assignment table

$query = 'SELECT assignment_id FROM assignments WHERE course_id = :course_id';
$stmt = $db->prepare($query);
$stmt->bindValue(':course_id', $courseId, PDO::PARAM_INT);
$stmt->execute();
$assignments = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($assignments as $assignment) {
    $asgnmt = $assignment['assignment_id'];

    echo "student_id: $studentId, assignment_id: $asgnmt ";

    $query = 'INSERT INTO student_assignment(student_id, assignment_id) VALUES (:student_id, :assignment_id)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':student_id', $studentId, PDO::PARAM_INT);
    $stmt->bindValue(':assignment_id', $asgnmt, PDO::PARAM_INT);
    $stmt->execute();
}
//"student_page.php?id=$id\"
$new_page = "student_page.php?id=$studentId";

header("Location: $new_page");
die();



