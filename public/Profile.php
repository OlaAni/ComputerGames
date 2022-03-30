<?php
//require '../src/functions.php';
require '../Test/autoload.php';

?>

<?php require 'templates/headerlogged.php';  ?>
<?php

$user = new Customer($_SESSION['id']);
//var_dump($_SESSION['id']);

?>

<?php echo $user->getName(); ?> </br>
<?php echo $user->getEmail(); ?></br>
<?php echo $user->getPassword(); ?>

<?php require 'templates/footer.php';?>
