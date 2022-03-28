<?php

session_start();

require '../src/functions.php';
require '../src/session.php';
require_once '../Product.php';
require_once '../Game.php';
require_once '../Part.php';


$productsin = new Product(1);
$products = $productsin->get_products(3);

$arr = array(1);
$pdo = get_connections();
$sth = $pdo->query("SELECT * FROM product");
$sth->setFetchMode(PDO::FETCH_CLASS, 'Product',$arr);
$person = $sth->fetch();



var_dump($person);

//var_dump($_SESSION);
//killSession();
//print session_id();
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

        <form action="" method="post" name="Logout_Form" class="form-signin">
            <button type="submit" class="btn btn-success">Buy</button>
        </form>

    </div>
            <?php } ?>

<?php require 'templates/footer.php';?>
