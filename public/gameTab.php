<?php

session_start();

require '../src/functions.php';
require_once '../Product.php';
require_once '../Game.php';
require_once '../Part.php';
require '../Cart.php';



$test = array();
for($i=1;$i<=3;$i++)
{
    $prod = new Product($i);
    if($prod->getType()==1)
    {
        $id = $prod->getId();
        $prod = new Game($id);
        array_push($test,$prod);
    }}



?>

<?php require 'templates/headerlogged.php';  ?>

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

        <?php require 'templates/footer.php';?>
