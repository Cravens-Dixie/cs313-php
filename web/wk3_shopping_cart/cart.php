<?php
session_start();
$name = $_SESSION['name'];
$pId = $_SESSION['pId'];
?>

<!doctype html>
<html lang="en">
<?php include('header-sc.php'); ?>
<body>
<div class="jumbotron text-center mb-0">
    <h1>BoardGamers</h1>
    <h4>Shopping Cart!</h4>
</div>
<?php include('nav-sc.php'); ?>
<?php
print_r($_SESSION);
echo $name;
echo $pId;
?>



<?php include('footer-sc.php'); ?>
</body>




</html>