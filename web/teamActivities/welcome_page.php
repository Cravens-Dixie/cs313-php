<?php
session_start();
if (isset($_SESSION['name'])) {
    echo "log in successful";

}else {
    $newPage = "sign_in.php";
    header('Location: ', $newPage);
}


// Report all PHP errors (see changelog)
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome week 07</title>
</head>
<body>
<h2> Welcome <?php echo $_SESSION['name'] ?>!</h2>
<div> You are now logged in!</div>

</body>
</html>