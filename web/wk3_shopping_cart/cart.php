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

            echo '<img class="img-fluid" src="' . $prodarr['image'] . '" alt="product">';
            echo '</td>
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
      <td></td>
      <td><b>Total</b></td>
      <td> $';
      echo $total;
       echo '</td>
    </tr>
      </tbody>
  </table>
</div>
<div class="container">
  <a href="index-sc.php" class="btn btn-info" role="button">Keep Shopping</a>
  <form method="post" action="checkout.php" class="form-submit">
  <input type="submit" class="btn btn-info" value="Checkout">
  </form>
  </div>';

?>



<?php include('footer-sc.php'); ?>
</body>




</html>