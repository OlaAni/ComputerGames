<?php
require_once "../autoload.php";



?>
<?php include "templates/registerHeader.php"; ?>


<?php if (isset($_POST['submit'])) {?>
        <?php $user = new Customer(0);
        $user->Register();

        ?>
<!--    --><?php //echo $_POST['name']; ?><!-- successfully added.-->
<!--    --><?php //set_user(); ?>

<?php } ?>

    <form method="post">
        <label for="name">First Name</label>
        <input type="text" name="name" id="name">
        <label for="email">Email Address</label>
        <input type="text" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <label for="location">Location</label>
        <input type="text" name="location" id="location">
        <input type="submit" name="submit" value="Submit">
    </form>
    <a href="index.php">Back to home</a>
<?php include "templates/footer.php"; ?>
