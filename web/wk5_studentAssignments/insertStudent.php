<?php
require('dbConnect.php');
$db = get_db();
$studentName = htmlspecialchars($_POST['name']);
$courseIds = $_POST['chkCourses'];//coming from check boxes on previous page
//$courseNames = htmlspecialchars($_POST['courseName']);//not working AND not needed
var_dump($courseIds);//returns array(2) { [0]=> string(1) "2" [1]=> string(1) "3" }

//insert student name into students table
//**working
$query = 'INSERT INTO students(student_name) VALUES(:studentName) ';
$stmt = $db->prepare($query);
$stmt->bindValue(':studentName', $studentName , PDO::PARAM_STR);
$stmt->execute();
$studentId = $db->lastInsertId("students_student_id_seq");

var_dump($studentId);//returns string(2) "25"

//get courseIds out of array collected by checkboxes on form page
foreach ($courseIds as $id) {
    var_dump($courseIds);//returns an array of numbers in string format...{[0]=>string(1)"2", [1]=>string(1)"3"}

    $course_id = $id;
    var_dump($id);//returns string(1)"2"

    //for each courseId, get related assignments in format of assignment_id.
    // May return 1 or more ids in an array.
    //**Not sure if this is working, but I am getting a single assignment_id for
    // the foreach loop below (I tested the query with real values and it works)
    $aQuery = 'SELECT assignment_id FROM assignments
                WHERE course_id = :course_id';
    $astmt = $db->prepare($aQuery);
    $astmt->bindValue(':course_id', $course_id);
    $astmt->execute();
    $assignment_id = $astmt->fetchAll(PDO::FETCH_ASSOC);

    //loops through the array of assignment_ids from above query and uses it to INSERT INTO student_assignment table.
    //student_assignment table links the student to courses, by way of an assignment.
    // $studentId comes from first query that inserted a student into students table.
    foreach ($assignment_id as $aId) {
        $assig_id = $aId['assignment_id'];

        echo "student_id: $studentId, assignment_id: $assig_id ";//returns student_id: 25, assignment_id: 1 (should also iterate through a 2, and 3 for this course_id)
        //**this is NOT working
        $saQuery = 'INSERT INTO student_assignment(student_id, assignment_id)
                VALUES (:student_id, :assignment_id)';
        $sastmt = $db->prepare($saQuery);
        $sastmt->bindValue(':student_id', $studentId);
        $sastmt->bindValue(':assignment_id', $assig_id );
        $sastmt->execute();


    }
}
//**program is not making it this far
//return to page where all students are listed, including the newly added one.
$new_page = "all-students_page.php";

header("Location: $new_page");
die();






