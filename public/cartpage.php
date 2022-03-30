<?php require 'templates/headerlogged.php';  ?>

<?php
require '../src/functions.php';
require '../Test/autoload.php';
$products = array();
removeItemFromCart(3);

foreach($_SESSION['cart'] as $key=>$value)
{
    //echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
    $prod = new Product($value);
    //$prod->showDetails();
    array_push($products,$prod);
}
//var_dump($products);


$cart = new Cart();
$cart->setProducts($products);
$cart->calcFullPrice();
print "Full price is ".$cart->getFullPrice()."</br>";

$sale = new Sale();
$sale->setCart($cart);
$sale->showCartDetails();
?>


<?php

if (isset($_POST['submit'])) {
    $pdo = get_connections();
    $query = 'INSERT INTO sale(fullPrice) VALUES (:price)';
    $stmt = $pdo->prepare($query);
    $price = $cart->getFullPrice();
    $stmt->bindParam(':price',$price);
    $stmt->execute();

    return $stmt->fetch();
}
?>
<form method="post">
    <input type="submit" name="submit" value="Submit">
</form>
