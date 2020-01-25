<?php
// Start the session
session_start();
?>


<!doctype html>
<html lang="en">

<?php include('header-sc.php');?>

<body>
<?php
if (isset($_POST['submit'])) {
    $pId = $_POST['pId'];
    $name = $_POST['name'];

    $_SESSION[$pId] = true;
    echo "Session variable set";
    echo "Hello $name";
}
?>

<div class="jumbotron text-center mb-0">
    <h1>BoardGamers</h1>
    <p>Bring Back Game Night!</p>
</div>


<?php include('nav-sc.php');?>

<div class="card-deck mt-2 mx-md-1 mx-lg-1">
    <div class="card">
        <img src="cs331-games/catan.webp" class="card-img-top" alt="Settlers of Catan game">
        <div class="card-body">
            <h5 class="text-center">Settlers of Catan</h5>
            <h6 class="text-center">$29.99</h6>
            <p class="card-text"> This is a fun game that no one will play with me. Feel free to
                make up your own rules (like rearranging the resource tiles once the game gets going--badly).</p>
        </div>
        <div class="card-footer">
            <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]);?>" class="form-submit">
                <input type="hidden" name="pId" class="pId" value="1">
                <input type="hidden" name="name" value="Bozo">
                <input type="submit" name="submit" class="btn btn-info btn-block" id="addItemBtn" value="Add to Cart">
            </form>
        </div>
    </div>
    <div class="card">
        <img src="cs331-games/seafarers.jpg" class="card-img-top" alt="Seafarers game">
        <div class="card-body">
            <h5 class="text-center">Catan-Seafarers Expansion</h5>
            <h6 class="text-center">$24.99</h6>
            <p class="card-text"> I really want this expansion pack. It looks like fun.</p>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-info btn-block" id="item2">Add To Cart</button>
        </div>
    </div>
    <div class="card">
        <img src="cs331-games/dominion.webp" class="card-img-top" alt="Dominion game">
        <div class="card-body">
            <h5 class="text-center">Dominion</h5>
            <h6 class="text-center">$27.99</h6>
            <p class="card-text"> This is an adventure game, similar to Magic. There is a lot of
            strategy that I don't understand. The virtual gamers like this game a lot.</p>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-info btn-block" id="item3">Add To Cart</button>
        </div>
    </div>
    <div class="card">
        <img src="cs331-games/tickettoride.webp" class="card-img-top" alt="Ticket to Ride game">
        <div class="card-body">
            <h5 class="text-center">Ticket To Ride</h5>
            <h6 class="text-center">$31.99</h6>
            <p class="card-text"> This is a terrific game to play with nice people. Blocking other
                player's tracks is not nice. </p>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-info btn-block" id="item4">Add To Cart</button>
        </div>
    </div>
</div>

<div class="card-deck mt-2 mx-md-1 mx-lg-1">
    <div class="card">
        <img src="cs331-games/pandemic.webp" class="card-img-top" alt="Pandemic game">
        <div class="card-body">
            <h5 class="text-center">Pandemic</h5>
            <h6 class="text-center">$19.99</h6>
            <p class="card-text"> This is a fun game. Everyone is on the same team,
                playing against the game.</p>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-info btn-block" id="item5">Add To Cart</button>
        </div>
    </div>
    <div class="card">
        <img src="cs331-games/rummikub.webp" class="card-img-top" alt="Rummikub game">
        <div class="card-body">
            <h5 class="text-center">Rummikub</h5>
            <h6 class="text-center">$14.99</h6>
            <p class="card-text"> This is a great game to see patterns.
                If you like math, you will like this game. If you like cards,
                you will like this game.</p>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-info btn-block" id="item6">Add To Cart</button>
        </div>
    </div>
    <div class="card">
        <img src="cs331-games/yamslam.webp" class="card-img-top" alt="Yam Slam game">
        <div class="card-body">
            <h5 class="text-center">Yam Slam</h5>
            <h6 class="text-center">$22.99</h6>
            <p class="card-text"> This looks like a really fun game. It's on my wish list.</p>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-info btn-block" id="item7">Add To Cart</button>
        </div>
    </div>
    <div class="card">
        <img src="cs331-games/quadrillion.webp" class="card-img-top" alt="Quadrillion game">
        <div class="card-body">
            <h5 class="text-center">Quadrillion</h5>
            <h6 class="text-center">$17.99</h6>
            <p class="card-text">This is a great one-person or family challenge game. This is a great
            game for  puzzle lovers.</p>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-info btn-block" id="item8">Add To Cart</button>
        </div>
    </div>
</div>

 <?php include('footer-sc.php');?>

</body>
</html>