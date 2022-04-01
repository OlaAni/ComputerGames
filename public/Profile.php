<?php
require '../autoload.php';

?>

<?php require 'templates/headerlogged.php';  ?>
<?php

$user = new Customer($_SESSION['id']);
//var_dump($_SESSION['id']);

?>

Name: <?php echo $user->getName(); ?> </br>
Email: <?php echo $user->getEmail(); ?></br>
Discount: <?php echo $user->getDiscountAmount(); ?>
<form action="tradein.php" method="post" >
    <button name="Submit" value="cart" class="button" type="submit">Trade In</button>
</form>
<?php require 'templates/footer.php';?>
