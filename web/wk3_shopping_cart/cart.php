<?php
session_start();
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

//create Product array
$products = file_get_contents('products.json');
$productsArr = json_decode($products, true);
print_r($_SESSION);
echo '<pre>';
print_r($productsArr);
echo '</pre>';
//loop through session array to get ind.products
foreach($_SESSION['pId'] as $id => $product) {
    echo $product;
    foreach ($productsArr as $pid => $key) {
        if ($pid == $product){
            echo $pid;
            foreach ($key as $subkey => $subval) {
                echo "<b>" . $subkey, $subval. "<b>";
            }

        }
    }
}

?>



<?php include('footer-sc.php'); ?>
</body>




</html>