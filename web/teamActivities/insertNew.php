<?php
require ('dbconnect.php');
$book = htmlspecialchars($_POST['book']);
$chapter = htmlspecialchars($_POST['chapter']);
$verse = htmlspecialchars($_POST['verse']);
$content = htmlspecialchars($_POST['content']);
$topicIds = htmlspecialchars($_POST['chkTopics']);

$query = 'INSERT INTO scriptures(book, chapter, verse, content)
VALUES(:book, :chapter, :verse, :content)';
$stmt = $db->prepare($query);
$stmt->bindValue(':book', $book, PDO::PARAM_STR);
$stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
$stmt->bindValue(':verse', $verse, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->execute();

$scriptureId = $db->lastInsertId("scriptures_id_seq");

foreach ($topicIds as $topicId) {
    echo "scripture_id: $scriptureId, topic_id: $topicId";
    $query = 'INSERT INTO scripture_link(scripture_id, topic_id)
                VALUES (:scriptureId, :topicId)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':scriptureId', $scriptureId);
    $stmt->bindValue(':topicId', $topicId);
    $stmt->execute();
}

//$new_page = "all_scriptures.php";

//header("Location: $new_page");
//die();
?>

<!doctype html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="author" content="Dixie Cravens">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS 331 Team Activity</title>
</head>
<body>
<h1>Scripture and Topic List</h1>

<?php

try {
    $query = 'SELECT book,
     chapter, 
     verse,
     content, 
     t.name
     FROM scriptures s
    INNER JOIN scripture_link sl ON s.id = sl.scripture_id
    INNER JOIN topic t ON sl.topic_id = t.id';
    $stmt = $db->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<p>';
        echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
        echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
        echo '<br/>';
        echo 'Topics: ';



//    $topicQuery =
//    $stmtTopics =
    }
}
catch (PDOException $ex) {
    echo "Error with DB. Details: $ex";
    die();
}






?>

</body>
</html>
