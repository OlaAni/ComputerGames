<?php
require '../lib/functions.php';
$user =get_user(6);

?>

<?php require 'templates/headerlogged.php';  ?>

<?php echo $user['name']; ?> </br>
<?php echo $user['email']; ?></br>
<?php echo $user['password']; ?>

<?php require 'templates/footer.php';?>
