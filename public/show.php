<?php
//require '../src/functions.php';
require '../Product.php';

$id = $_GET['id'];
//$product = get_product($id);
$product =  new Product($id,"",0,"");

var_dump($product);

?>
<?php require 'templates/headerlogged.php'; ?>

<h1><?php echo $product->getName(); ?></h1>

<div class="container">
    <div class="row">
        <div class="col-xs-3 pet-list-item">
            <img src="../images/<?php echo $product->getImage(); ?>" class="pull-left img-rounded" />
        </div>
        <div class="col-xs-6">
            <p>
                <?php echo  $product->getDescription(); ?>
            </p>

            <table class="table">
                <tbody>
                <tr>
                    <th>Name</th>
                    <td><?php echo $product->getName(); ?></td>
                </tr>
                <tr>
                    <th>Genre</th>
                    <td><?php echo  $product->getName(); ?></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>€<?php echo $product->getPrice(); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-success">Buy</button>



<?php require 'templates/footer.php'; ?>
