<?php
session_start();
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

<form action="confirmpage.php">
    <div class="form-group">
        <label for="custname">Full Name:</label>
        <input type="text" class="form-control" placeholder="Enter full name" id="custname">
    </div>
    <div class="form-group">
        <label for="custaddr">Customer address:</label>
        <input type="text" class="form-control" placeholder="Enter Street" id="custaddr">
        <label for="custcity">Customer city:</label>
        <input type="text" class="form-control" placeholder="Enter City" id="custcity">
        <label for="custstate">Customer state:</label>
        <input type="text" class="form-control" placeholder="Enter State" id="custstate">
        <label for="custzip">Customer zip code:</label>
        <input type="text" class="form-control" placeholder="Enter Zip Code" id="custzip">
    </div>
<!--    <div class="container">-->
<!--        <a href="index-sc.php" class="btn btn-info" role="button">Keep Shopping</a>-->
<!--        <form method="post" action="checkout.php" class="form-submit">-->
<!--            <input type="submit" class="btn btn-info" value="Checkout">-->
<!--        </form>-->
<!--    </div>-->
    <button type="submit" class="btn btn-primary">Complete Purchase</button>
    <a href="index-sc.php" class="btn btn-info" role="button">Keep Shopping</a>
</form>





<?php include('footer-sc.php'); ?>
</body>
</html>

