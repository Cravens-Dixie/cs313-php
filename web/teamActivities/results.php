<?php

require('dbconnect.php');
var_dump($_POST);
?>

<!doctype html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="author" content="Dixie Cravens">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS 331 Team Activity</title>
</head>
<body>
<h2>Results</h2>
<?php

foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures WHERE book = ' .  $_POST['book']) AS $row) {
    echo '<b>' . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . "-" . '</b>';
    echo '"' . $row['content'] . '"' . "<br/>";
}


?>

</body>
</html>
