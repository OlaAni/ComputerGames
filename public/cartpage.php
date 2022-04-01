<?php require 'templates/headerlogged.php';  ?>

<?php
require "../src/functions.php";
require '../autoload.php';
?>

<table>
    <th>Image</th>
    <th>Product</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Subtotal</th>
    <th>Action</th>
<?php

//var_dump($_SESSION["cart"]);

$cartItems = $_SESSION["cart"];
foreach($cartItems as $id => $quantity):
    $product = new Product($id);
    $price = $product->getPrice();
    $subtotal = $quantity * $price;
    // update total
    $total += $subtotal;
    // format prices to 2 d.p.
    $price = number_format($price, 2);
    $subtotal = number_format($subtotal, 2);
    ?> <tr>
        <td>
            <img src="/images/<?= $product->getImage() ?>"
                 alt="<?= $product->getImage() ?> " class="small">
        </td>
        <td>
            <h4><?= $product->getName(); ?></h4>
            <?= $product->getDescription() ?>
        </td>
        <td>
            $ <?= $price ?>
        </td>
        <td>
            <form action="/?action=changeCartQuantity&id=<?= $id ?>"
                  method="post">
                 <button type="submit" name="amount" value="reduce"
                          class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-minus"></span>
                </button>
                <?= $quantity ?>
                <button type="submit" name="amount" value="increase"
                        class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </form>
        </td>
        <td>
            $ <?= $subtotal ?>
        </td>
        <td>
            <form action="/?action=removeFromCart&id=<?= $id ?>"
                  method="post">
                <button class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-remove"></span>
                    Remove
                </button>
            </form>
        </td>
</tr>
<?php endforeach; ?>
</table>
        <?php
        $total = number_format($total, 2);
        ?>
        $ <?= $total ?>
        Total
<?php
$sale = new Sale();
if (isset($_POST['submit'])) {
    $sale->Submit($total);
}
?>
<form method="post">
    <input type="submit" name="submit" value="Submit">
</form>

