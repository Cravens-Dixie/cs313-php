<?php
session_start();
require('dbconnect.php');
?>

<!doctype html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="author" content="Dixie Cravens">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS 331 Team Activity</title>
</head>
<body>
<?php

echo($db->query('SELECT id, book, chapter, verse, content FROM scriptures WHERE id = \'' . $_GET['id'] . '\';') AS $row) {

    echo $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . "- " . $row['content'];


?>

</body>
</html>