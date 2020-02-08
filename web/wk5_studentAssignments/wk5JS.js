
document.getElementById("seeStudents").onclick = showStudents;
function showStudents() {
    document.getElementById("studentsList").innerHTML =
        "<h3>Students:</h3>" +
        "<?php\n" +
        "        foreach ($names as $student){\n" +
        "            $students = $student['student_name'];\n" +
        "            echo \"<p><ul><li>$students</li></ul></p>\";\n" +
        "        }\n" +
        "        ?>";

}
<?php
    foreach ($names as $assignment){
    $name = $assignment['course_name'];
    $stAssignment = $assignment['assignment'];
    $dueDate = $assignment['due_date'];


    echo "<p><ul><li>$course_name- $stAssignment- $dueDate</li></ul></p>";
}

    ?>