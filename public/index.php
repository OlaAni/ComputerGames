<?php
session_start();

//require '../lib/functions.php';
require '../Product.php';
$products = get_products(3);
//$products = array_reverse($products);

//var_dump($_SESSION['email']);
?>

<?php require 'templates/headerlogged.php';  ?>

<div class="container">
        <div class="row">
            <?php foreach ($products as $product) { ?>
                <div class="col-lg-4 pet-list-item">
                    <h2>
                        <a href="show.php?id=<?php echo $product['idProduct']?>">
                            <?php echo $product['name']; ?></a>
                    </h2>

                    <img src="../images/<?php echo $product['image']; ?>" class="img-rounded">

                    <blockquote class="game-details">
                        <span class="label label-info"><?php echo $product['name']; ?></span>
                        <?php
                        if (!array_key_exists('price', $product) || $product['price'] == '')
                        {
                            echo '50';
                        }
                        else
                        {?>
                           € <?php echo $product['price'];
                        }
                        ?>
                        <?php echo $product['genre']; ?>
                    </blockquote>

                    <p>
                        <?php echo $product['description']; ?>
                    </p>
                </div>
            <?php } ?>

<?php require 'templates/footer.php';?>
