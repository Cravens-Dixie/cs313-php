
document.getElementById("seeStudents").onclick = showStudents;
function showStudents() {
    document.getElementById("studentsList").innerHTML =
        "<h3>Students:</h3>" +
        "<?php\n" +
        "        foreach ($names as $assignment){\n" +
        "            $students = $assignment['student_name'];\n" +
        "\n" +
        "\n" +
        "            echo \"<p><ul><li>$students</li></ul></p>\";\n" +
        "        }\n" +
        "        ?>" +
        "";

}