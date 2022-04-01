<?php require 'templates/headerlogged.php';  ?>

<?php
//require '../src/functions.php';
require '../Test/autoload.php';
$products = array();
foreach($_SESSION['cart'] as $key=>$value)
{
    $prod = new Product($value);
    //$prod->showDetails();
    array_push($products,$prod);
    $products[$key]->showDetails();


    ?>
    <form method="post">
        <input type="submit" name="remove" value="Remove">
    </form>
    <?php
}
var_dump($_SESSION['cart']);

$cart = new Cart();
$cart->setProducts($products);


$cart->calcFullPrice();
print "Full price is ".$cart->getFullPrice()."</br>";

$sale = new Sale();
$sale->setCart($cart);
?>


<?php

if (isset($_POST['submit'])) {
    $pdo = get_connections();
    $query = 'INSERT INTO sale(fullPrice,CustomerID) VALUES (:price,:id)';
    $stmt = $pdo->prepare($query);
    $id = $_SESSION["id"];
    $price = $cart->getFullPrice();
    $stmt->bindParam(':price',$price);
    $stmt->bindParam(':id',$id);
    $stmt->execute();

    return $stmt->fetch();
}


if (isset($_POST['remove'])) {

    unset($products[$key]);
}

?>
<form method="post">
    <input type="submit" name="submit" value="Submit">
</form>
