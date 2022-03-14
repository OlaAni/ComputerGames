<?php
require '../lib/functions.php';
$user =get_user(1);

?>

<?php require 'templates/header.php';  ?>

<?php echo $user['name']; ?> </br>
<?php echo $user['email']; ?></br>
<?php echo $user['password']; ?>

<?php require 'templates/footer.php';?>
