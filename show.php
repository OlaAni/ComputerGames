<?php
require 'lib/functions.php';

$id = $_GET['gameID'];
$product = get_product($id);
?>
<?php require 'layout/header.php'; ?>

<h1><?php echo $product['name']; ?></h1>

<div class="container">
    <div class="row">
        <div class="col-xs-3 pet-list-item">
            <img src="/images/<?php echo $product['name'] ?>" class="pull-left img-rounded" />
        </div>
        <div class="col-xs-6">
            <p>
                <?php echo $product['description']; ?>
            </p>

            <table class="table">
                <tbody>
                <tr>
                    <th>Name</th>
                    <td><?php echo $product['name']; ?></td>
                </tr>
                <tr>
                    <th>Genre</th>
                    <td><?php echo $product['genre']; ?></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><?php echo $product['price']; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require 'layout/footer.php'; ?>
