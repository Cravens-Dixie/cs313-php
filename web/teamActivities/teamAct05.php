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
            Topic/s: <br><?php
                        foreach ($db->query('SELECT name FROM topic;') AS $topics)
                        {
                            echo '<input type="checkbox" name="topic[]" value="' . $topics['name'] .
                                '"><label for="' . $topics['name'] . '">' . $topics['name']. '</label> <br>';

                            
//                            This doesn't work as is because $topicName ($topicName = $topics['name'];)is still an array
//                            echo "<input type='checkbox' name='$topicName' value='$topicName'><label for='$topicName>
//                                    $topicName'</label><br>";
                        }

            ?>
            <input type="submit" value="Add Scripture">
        </form>
<!---->
<!--        <form action="test.php" method="post">-->
<!--            <input type="checkbox" name="check_list[]" value="value 1">-->
<!--            <input type="checkbox" name="check_list[]" value="value 2">-->
<!--            <input type="checkbox" name="check_list[]" value="value 3">-->
<!--            <input type="checkbox" name="check_list[]" value="value 4">-->
<!--            <input type="checkbox" name="check_list[]" value="value 5">-->
<!--            <input type="submit" />-->
<!--        </form>-->
<!--        --><?php
//        if(!empty($_POST['check_list'])) {
//            foreach($_POST['check_list'] as $check) {
//                echo $check; //echoes the value set in the HTML form for each checked checkbox.
//                //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
//                //in your case, it would echo whatever $row['Report ID'] is equivalent to.
//            }
//        }
//        ?>


    </body>

</html>