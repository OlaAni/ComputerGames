<?php

require '../autoload.php';
$test = array();
$t = get_count();
for($i=1;$i<=$t;$i++)
{
    $prod = new Product($i);
    if($prod->getType()==0)
    {
        $id = $prod->getId();
        $prod = new Part($id);
        array_push($test,$prod);
    }
}

?>

<?php require 'templates/headerlogged.php';  ?>

<div class="container">
    <div class="row">
        <?php foreach ($test as $product) { ?>
            <div class="col-lg-4 pet-list-item">
                <h2>
                    <a class="productName" href="show.php?id=<?php echo $product->getID()?>">
                        <?php echo $product->getName(); ?></a>
                </h2>

                <img src="/images/<?php echo $product->getImage(); ?>" class="big">

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

                <p class="gameInfo">
                    <?php echo $product->getDescription(); ?>
                </p>

            </div>
        <?php } ?>
        <?php require 'templates/footer.php';?>
