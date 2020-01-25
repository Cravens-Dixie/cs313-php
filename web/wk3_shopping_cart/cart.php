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
    foreach ($productsArr as $pid => $key) {
        if ($pid == $product){
            //echo $pid;

            foreach ($key as $subkey => $subval) {
                foreach ($subval as list($name, $image, $price))
                //echo "<b>" . $subkey, $subval. "<b>";
                //echo $subkey . " = " . $subval . "\n";
                echo ' <tbody>
                          <tr>
                            <td><?php echo $subval[$image]; ?></td>
                            <td><?php echo $subval[$name]; ?></td>
                            <td><?php echo $subval[$price]; ?></td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>

                ';
            }

        }
    }
}

?>



<?php include('footer-sc.php'); ?>
</body>




</html>