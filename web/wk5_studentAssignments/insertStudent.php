<?php
require('dbConnect.php');
$db = get_db();
$studentName = htmlspecialchars($_POST['name']);
$courseIds = htmlspecialchars($_POST['chkCourses']);
$courseNames = htmlspecialchars($_POST['courseName']);

$query = 'INSERT INTO students(student_name) VALUES(:studentName)';
$stmt = $db->prepare($query);
$stmt->bindValue(':studentName', $studentName , PDO::PARAM_STR);
$stmt->execute();
$studentId = $db->lastInsertId("schema.students_student_id_seq");



foreach ($courseIds as $id) {
    $course_id = $id['chkCourses'];

    $aQuery = 'SELECT assignment_id FROM assignments
                WHERE course_id = :course_id';
    $astmt = $db->prepare($aQuery);
    $astmt->bindValue(':course_id', $course_id);
    $astmt->execute();
    $assignment_id = $astmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($assignment_id as $aId) {
        $assig_id = $aId['assignment_id'];
        $saQuery = 'INSERT INTO student_assignment(student_id, assignment_id)
                VALUES (:student_id, :assignment_id)';
        $sastmt = $db->prepare($aQuery);
        $sastmt->bindValue(':student_id', $studentId);
        $sastmt->bindValue(':assignment_id', $assig_id);
        $sastmt->execute();


    }
}
    $new_page = "all-students_page.php";

header("Location: $new_page");
die();






