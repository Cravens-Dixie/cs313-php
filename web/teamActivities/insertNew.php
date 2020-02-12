<?php
require ('dbconnect.php');
$book = htmlspecialchars($_POST['book']);
$chapter = htmlspecialchars($_POST['chapter']);
$verse = htmlspecialchars($_POST['verse']);
$content = htmlspecialchars($_POST['content']);
$topicIds = htmlspecialchars($_POST['chkTopics']);
echo var_dump($topic);
//$query = 'INSERT INTO scriptures(book, chapter, verse, content)
//VALUES
//(:book, :chapter, :verse, :content);';
//$stmt = $db->prepare($query);
//$stmt->bindValue(':book', $book, PDO::PARAM_STR);
//$stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
//$stmt->bindValue(':verse', $verse, PDO::PARAM_INT);
//$stmt->bindValue(':content', $content, PDO::PARAM_STR);
//$stmt->execute();

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
<h2>Add was successful!</h2>


</body>
</html>
