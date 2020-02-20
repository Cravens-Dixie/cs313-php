<?php
require('dbConnect.php');
$db = get_db();
$courseName = htmlspecialchars($_POST['course']);

//insert course name into courses table
$query = 'INSERT INTO courses(course_name) VALUES(:courseName) ';
$stmt = $db->prepare($query);
$stmt->bindValue(':courseName', $courseName, PDO::PARAM_STR);
$stmt->execute();
$courseId = $db->lastInsertId("courses_course_id_seq");

//alert and return to page where all courses are listed, including the newly added one.
echo "<script>
alert('Student Added');
window.location.href='all-courses_page.php';
</script>";
//$new_page = "all-courses_page.php";
//
//header("Location: $new_page");
die();
