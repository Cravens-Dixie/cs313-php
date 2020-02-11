<?php
require ('dbconnect.php');
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="author" content="Dixie Cravens">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS 331 Team Activity</title>
</head>
    <body>
        <h2> Scripture Resources</h2>
        <p><?php
            foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures')AS $row)
            {
                echo '<b>' . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . "-" . '</b>';
                echo '"' . $row['content'] . '"'. "<br/>";
            }
            ?>
        </p>

         <form action="results.php" method="post">
            Book: <input type="text" name="book"><br>
            <input type="submit">
        </form><br>

        <h2>New Scripture</h2>
        <form action="insertNew.php" method="post">
            Book: <input type="text" name="book"><br>
            Chapter: <input type="text" name="chapter"><br>
            Verse: <input type="text" name="verse"><br>
            Content: <textarea name="content"></textarea><br>
            Topic/s: <?php
                        foreach ($db->query('SELECT name FROM topic;') AS $topics)
                        {
                            echo '<input type="checkbox" name="' . $topics['name'] . '" value="' . $topics['name'] . '"><br>';
                        }

            ?>
            <input type="submit">
        </form>


    </body>

</html>