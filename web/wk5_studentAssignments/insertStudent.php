<?php
require('dbConnect.php');
$db = get_db();
$studentName = htmlspecialchars($_POST['name']);
$courseIds = $_POST['chkCourses'];//coming from check boxes on previous page

//var_dump($courseIds);//returns array(2) { [0]=> string(1) "2" [1]=> string(1) "3" }

//insert student name into students table
$query = 'INSERT INTO students(student_name) VALUES(:studentName) ';
$stmt = $db->prepare($query);
$stmt->bindValue(':studentName', $studentName , PDO::PARAM_STR);
$stmt->execute();
$studentId = $db->lastInsertId("students_student_id_seq");

//var_dump($studentId);//returns string(2) "25"

//get courseIds out of array collected by checkboxes on form page
foreach ($courseIds as $id) {
    var_dump($courseIds);//returns an array of numbers in string format...{[0]=>string(1)"2", [1]=>string(1)"3"}

    $course_id = $id;
//    var_dump($id);//returns string(1)"2"

    //for each course_id, add the studentId and insert to student_course table
    $aQuery = 'INSERT INTO student_course(student_id, course_id)
                VALUES (:student_id, :course_id)';
    $astmt = $db->prepare($aQuery);
    $astmt->bindValue(':student_id', $studentId);
    $astmt->bindValue(':course_id', $course_id);
    $astmt->execute();


}

echo "<script>
alert('Student Added');
window.location.href='all-students_page.php';
</script>";
//return to page where all students are listed, including the newly added one.
//$new_page = "all-students_page.php";
//
//header("Location: $new_page");
die();






