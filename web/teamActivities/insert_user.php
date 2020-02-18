<?php
require ('dbconnect.php');
//Get $_POST variables from sign_up.php
$name = htmlspecialchars($_POST['name']);
$password = htmlspecialchars($_POST['password']);



//hash password before inserting into DB
$passwordHash = password_hash($password, 'PASSWORD_DEFAULT');


$query = 'INSERT INTO users07(user_name, password)
VALUES(:name, :password)';
$stmt = $db->prepare($query);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':password', $passwordHash, PDO::PARAM_STR);
$stmt->execute();

$newPage = "sign_in.php";
header('Location: ', $newPage);
