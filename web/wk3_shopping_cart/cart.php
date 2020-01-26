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
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Product Image</th>
        <th>Product Name</th>
        <th>Product Price</th>
      </tr>
    </thead>
    <tbody>';

//loop through session array to get ind.products
foreach($_SESSION['pId'] as $id => $product) {
    //echo $product;
    foreach ($productsArr as $pid => $prodarr) {
        if ($pid == $product) {
           echo ' <tr>
        <td>';
            echo $prodarr['image'];
            echo '</td>
        <td>';
            echo $prodarr['name'];
            echo '</td>
        <td>';
            echo $prodarr['price'];
            echo '</td>
      </tr>';


            }
        }
}

   echo' </tbody>
  </table>
</div>';

?>



<?php include('footer-sc.php'); ?>
</body>




</html>