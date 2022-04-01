<?php

session_start();

require '../autoload.php';



$test = array();
for($i=1;$i<=3;$i++)
{
    $prod = new Product($i);
    array_push($test,$prod);
}
?>

<?php
require 'templates/headerlogged.php';  ?>

<div class="container">
        <div class="row">
            <?php foreach ($test as $product) { ?>
    <div class="col-lg-4 pet-list-item">
                    <h2>
                        <a href="show.php?id=<?php echo $product->getID()?>">
                            <?php echo $product->getName(); ?></a>
                    </h2>

                    <img src="/images/<?php echo $product->getImage(); ?>" class="img-rounded">

                    <blockquote class="game-details">
                        <span class="label label-info"><?php echo $product->getName(); ?></span>
                        <?php
                        if ($product->getPrice() == 0)
                        {
                            echo '50';
                        }
                        else
                        {?>
                           € <?php echo $product->getPrice();
                        }
                        ?>
                        <?php echo $product->getName(); ?>
                    </blockquote>

                    <p>
                        <?php echo $product->getDescription(); ?>
                    </p>

    </div>
            <?php } ?>
<?php


session_start();
//require_once __DIR__ . '/../../src/functions.php';
// try to find "action" in query-string variables
$action = filter_input(INPUT_GET, 'action');
switch ($action) {
    case 'cart':
        displayCart();
        break;
    case 'addToCart':
        $id = filter_input(INPUT_GET, 'id');
        addItemToCart($id);
        displayCart();
        break;
    case 'removeFromCart':
        $id = filter_input(INPUT_GET, 'id');
        removeItemFromCart($id);
        displayCart();
        break;
    case 'changeCartQuantity':
        $id = filter_input(INPUT_GET, 'id');
        $amount = filter_input(INPUT_POST, 'amount');
        if ($amount == 'increase') {
            increaseCartQuantity($id);
        } else {
            reduceCartQuantity($id);
        }
        displayCart();
        break;
    default:
}


?>
<?php require 'templates/footer.php';?>

