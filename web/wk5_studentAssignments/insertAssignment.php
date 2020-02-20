<?php
session_start();
require('dbConnect.php');
$db = get_db();

//get $_POST info from new_assignment_form
$courseId = htmlspecialchars($_POST['courses']);
$assignment = htmlspecialchars($_POST['assignment']);
$dueDate = htmlspecialchars($_POST['dueDate']);
//var_dump($_POST);
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


    //insert new assignment_id and student_id(s) into student_assignment, linking course assignments to students
    //get student id array from course_page query with $_SESSION
var_dump($_SESSION);
    if(isset($_SESSION['students'])){
        foreach ($_SESSION['students'] as $studentId) {
//            $sid = $studentId['students'];
            echo "student_id: $sid assignment_id: $assignmentId";
            try {
            $query = 'INSERT INTO student_assignment(student_id, assignment_id) VALUES(:student_id, :assignment_id) ';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':student_id', $studentId, PDO::PARAM_INT);
            $stmt->bindValue(':assignment_id', $assignmentId, PDO::PARAM_INT);
            $stmt->execute();
            }
            catch (PDOException $e) {
                echo "connection failed";
            }
        }
    }


//return to page where all courses are listed, including the newly added one.
//$new_page = "course_page.php?id=$courseId";
//
//header("Location: $new_page");
//die();
