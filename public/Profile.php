<?php
require '../autoload.php';

?>

<?php require 'templates/headerlogged.php';  ?>
<?php

$user = new User($_SESSION['id']);
//var_dump($_SESSION['id']);

?>

Name: <?php echo $user->getName(); ?> </br>
Email: <?php echo $user->getEmail(); ?></br>

<?php
if($user->getEmployee()=="false"){
    $user = new Customer($_SESSION['id']);
?>
Discount: <?php echo $user->getDiscountAmount();?></br>
Age: <?php echo $user->getAge();?></br>
Genre: <?php echo $user->getFavGenre();?>

<form action="tradein.php" method="post" >
    <button name="Submit" value="cart" class="button" type="submit">Trade In</button>
</form>
<?php }
else{
    $user = new Admin($_SESSION['id']);?>

    <form action="adminpage.php" method="post" >
        <button name="Submit" value="cart" class="button" type="submit">Edit</button>
    </form>
<?php }?>
<?php require 'templates/footer.php';?>
