<?php require 'templates/headerlogged.php'; ?>

<?php
//require '../src/functions.php';
require '../autoload.php';

$id = $_GET['id'];
//$product = get_product($id);
$product =  new Product($id);

//var_dump($product);


?>

<h1 class="productName"><?php echo $product->getName(); ?></h1>

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
            <p class="gameInfo">
                <?php echo  $product->getDescription(); ?>
            </p>

            <table class="table">
                <tbody>
                <tr>
                    <th class="gameInfo">Name</th>
                    <td class="gameInfo" ><?php echo $product->getName(); ?></td>
                </tr>
                <tr>
                    <th class="gameInfo">Genre</th>
                    <td class="gameInfo"><?php echo  $product->getGenre(); ?></td>
                </tr>
                <tr>
                    <th class="gameInfo">Price</th>
                    <td class="gameInfo">€<?php echo $product->getPrice(); ?></td>
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

<form action= "/?action=addToCart&id=<?=$product->getId()?>" method="post" class="form-signin">
    <button>Add to Cart</button>
</form>



<?php require 'templates/footer.php'; ?>
