<?php
session_start();
$pId = $_SESSION['pId'];
?>

<!doctype html>
<html>
<?php include('header-sc.php'); ?>
<div class="jumbotron text-center mb-0">
    <h1>BoardGamers</h1>
    <h4>Sale Completed</h4>
</div>
<?php include('nav-sc.php'); ?>
<?php

//create Product array
$products = file_get_contents('products.json');
$productsArr = json_decode($products, true);
echo '<div class="container">
  <h2>Sales Complete!</h2>         
  <table class="table">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Product Price</th>
      </tr>
    </thead>
    <tbody>';
$total = 0;
//loop through session array to get ind.products
foreach($_SESSION['pId'] as $id => $product) {
    //echo $product;
    foreach ($productsArr as $pid => $prodarr) {
        if ($pid == $product) {
            echo ' <tr>
        <td>';
            echo $prodarr['name'];
            echo '</td>
        <td>';
            echo $prodarr['price'];
            $total += floatval($prodarr['price']);
            echo '</td>
      </tr>';

        }
    }
}

echo'<tr>
      <td><b>Total</b></td>
      <td> $';
echo $total;
echo '</td>
    </tr>
      </tbody>
  </table>
</div>';
?>
<body>
<p><b>Good job! Now go play some games!</b></p>
<?php include('footer-sc.php'); ?>
</body>
</html>