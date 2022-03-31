<?php
//require '../src/functions.php';
require '../Test/autoload.php';

?>

<?php require 'templates/headerlogged.php';  ?>
<?php

$user = new Customer($_SESSION['id']);
$product = new Game(1);

?>
<h1>Game of the Month</h1>
<h2><?php echo $product->getName(); ?></h2>
<h3><?php echo $product->getRarity(); ?></h3>
<p>Trade in to get a percent off on your profile</p>



<?php require 'templates/footer.php';?>
