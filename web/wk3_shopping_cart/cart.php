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
foreach($_SESSION as $prodId) {
    foreach ($productsArr as $key => $value) {
        if ($prodId == $key){
            echo $key;
//            foreach ($value as $sub_key => $sub_val) {
//                echo "{$sub_key} \"=\" {$sub_val}.\"\n\"";
            }
        }


    }





}

?>



<?php include('footer-sc.php'); ?>
</body>




</html>