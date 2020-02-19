<?php
require ('dbconnect.php');
// Report all PHP errors (see changelog)
error_reporting(E_ALL);

//Get $_POST variables from sign_up.php
$name = htmlspecialchars($_POST['name']);
$password = htmlspecialchars($_POST['password']);
var_dump($_POST);//array(2) { ["name"]=> string(13) "Dixie Cravens" ["password"]=> string(8) "dingdong" }


//hash password before inserting into DB
$passwordHash = password_hash($password, PASSWORD_DEFAULT);


$query = 'INSERT INTO users07(user_name, password)
VALUES(:user_name, :password)';
$stmt = $db->prepare($query);
$stmt->bindValue(':user_name', $name, PDO::PARAM_STR);
$stmt->bindValue(':password', $passwordHash, PDO::PARAM_STR);
$stmt->execute();

$newPage = "sign_in.php";
header('Location: ', $newPage);

die();