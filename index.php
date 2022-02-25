<?php

require 'lib/functions.php';

$products = get_products(3);
$products = array_reverse($products);
$pupCount = count($products);
?>

<?php require 'layout/header.php';  ?>

<div class="container">
        <div class="row">
            <?php foreach ($products as $game) { ?>
                <div class="col-lg-4 pet-list-item">
                    <h2>
                        <a href="show.php?id=<?php echo $game['gameID']?>">
                            <?php echo $game['name']; ?></a>
                    </h2>

                    <img src="/images/<?php echo $game['image']; ?>" class="img-rounded">

                    <blockquote class="game-details">
                        <span class="label label-info"><?php echo $game['name']; ?></span>
                        <?php
                        if (!array_key_exists('price', $game) || $game['price'] == '')
                        {
                            echo '50';
                        }
                        else
                        {
                            echo $game['price'];
                        }
                        ?>
                        <?php echo $game['genre']; ?> lbs
                    </blockquote>

                    <p>
                        <?php echo $game['description']; ?>
                    </p>
                </div>
            <?php } ?>

<?php require 'layout/footer.php';?>
