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
<form action="tradein.php" method="post" >
    <button name="Submit" value="cart" class="button" type="submit">Trade In</button>
</form>
<?php require 'templates/footer.php';?>
