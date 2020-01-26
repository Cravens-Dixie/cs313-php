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
echo '<div class="container">
                      <h2>Shopping Cart</h2>            
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                          </tr>
                        </thead>';
//loop through session array to get ind.products
foreach($_SESSION['pId'] as $id => $product) {
    //echo $product;
    foreach ($productsArr as $pid => $prodarr) {
        if ($pid == $product) {
            //echo $pid;

            foreach ($prodarr as $prodelem) {
                foreach ($prodelem as list($name, $image, $price)) {

                    echo "<b>" . $prodelem . "<b>";
                    //echo $subkey . " = " . $subval . "\n";
                    echo ' <tbody>
                          <tr>
                            <td>';
                    echo $prodelem['image']; //todo this needs to be inside <img src="">
                    echo '</td>
                            <td>';
                    echo $prodelem['name'];
                    echo '</td>
                            <td>';
                    echo $prodelem['price'];
                    echo '</td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>

                ';
                }

            }
        }
    }
}

?>



<?php include('footer-sc.php'); ?>
</body>




</html>