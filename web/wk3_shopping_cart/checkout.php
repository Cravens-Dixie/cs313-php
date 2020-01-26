<?php
session_start();
$pId = $_SESSION['pId'];

// define variables and set to empty values
$name = $address = $city = $state = $zipcode = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $address = test_input($_POST["address"]);
    $city = test_input($_POST["city"]);
    $state = test_input($_POST["state"]);
    $zipcode = test_input($_POST["zipcode"]);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!doctype html>
<html lang="en">
<?php include('header-sc.php'); ?>
<body>
<div class="jumbotron text-center mb-0">
    <h1>BoardGamers</h1>
    <h4>Check Out</h4>
</div>
<?php include('nav-sc.php'); ?>
<?php

//create Product array
$products = file_get_contents('products.json');
$productsArr = json_decode($products, true);
echo '<div class="container">
  <h2>Checkout</h2>         
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["confirmpage.php"]);?>">

    <div class="form-group">
        <label for="custname">Full Name:</label>
        <input type="text" name="name" class="form-control" placeholder="Enter full name" id="custname">
    </div>
    <div class="form-group">
        <label for="custaddr">Customer address:</label>
        <input type="text" name="address" class="form-control" placeholder="Enter Street" id="custaddr">
        <label for="custcity">Customer city:</label>
        <input type="text" name="city" class="form-control" placeholder="Enter City" id="custcity">
        <label for="custstate">Customer state:</label>
        <input type="text" name="state" class="form-control" placeholder="Enter State" id="custstate">
        <label for="custzip">Customer zip code:</label>
        <input type="text" name="zipcode" class="form-control" placeholder="Enter Zip Code" id="custzip">
    </div>

        <input type="submit" name="submit" class="btn btn-info btn-block" value="Complete Purchase">
    </form>
    <
    <a href="index-sc.php" class="btn btn-info" role="button">Keep Shopping</a>
</form>





<?php include('footer-sc.php'); ?>
</body>
</html>

