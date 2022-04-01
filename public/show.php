<?php
//require '../src/session.php';
//killSession();

require '../Test/autoload.php';

$id = $_GET['id'];
//$product = get_product($id);
$product =  new Product($id);

//var_dump($product);


?>
<?php require 'templates/headerlogged.php'; ?>

<h1><?php echo $product->getName(); ?></h1>

<?php
if($product->getType()==1)
{
    $product = new Game($id);?>

<div class="container">
    <div class="row">
        <div class="col-xs-3 pet-list-item">
            <img src="/images/<?php echo $product->getImage(); ?>" class="pull-left img-rounded" />
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
                    <td><?php echo  $product->getGenre(); ?></td>
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
<?php }
else
{
    $product = new Part($id);?>

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
                    <th>Type</th>
                    <td><?php echo  $product->getPartType(); ?></td>
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
<?php }

?>

<form method="post" class="form-signin">
    <input type="number" name="quantity" value="quantity">
    <input type="submit" name="BUY" value="BUY"  class="btn btn-success">
</form>

<?php
if(isset($_POST['BUY']))
{

    addItemToCart($product->getId());
    //increaseCartQuantity($product->getId());
}
?>
<?php require 'templates/footer.php'; ?>
