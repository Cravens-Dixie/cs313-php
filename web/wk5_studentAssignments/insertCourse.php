<?php
require('dbConnect.php');
$db = get_db();
$courseName = htmlspecialchars($_POST['course']);

//insert course name into courses table
$query = 'INSERT INTO courses(course_name) VALUES(:courseName) ';
$stmt = $db->prepare($query);
$stmt->bindValue(':studentName', $studentName , PDO::PARAM_STR);
$stmt->execute();
$courseId = $db->lastInsertId("courses_course_id_seq");


