<?php
session_start();

require '../lib/functions.php';

$products = get_products(3);
$products = array_reverse($products);

var_dump($_SESSION['email']);
?>

<?php require 'templates/headerlogged.php';  ?>

<div class="container">
        <div class="row">
            <?php foreach ($products as $game) { ?>
                <div class="col-lg-4 pet-list-item">
                    <h2>
                        <a href="show.php?id=<?php echo $game['id']?>">
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
                        {?>
                           € <?php echo $game['price'];
                        }
                        ?>
                        <?php echo $game['genre']; ?>
                    </blockquote>

                    <p>
                        <?php echo $game['description']; ?>
                    </p>
                </div>
            <?php } ?>

<?php require 'templates/footer.php';?>
