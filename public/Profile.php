<?php
require '../lib/functions.php';
$user =get_user(4);

?>

<?php require '../templates/header.php';  ?>

<?php echo $user['name']; ?>
<?php echo $user['email']; ?>
<?php echo $user['password']; ?>
<?php require '../templates/footer.php';?>
