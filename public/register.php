<?php


require '../lib/functions.php';


?>
<?php include "templates/registerHeader.php"; ?>


<?php if (isset($_POST['submit'])) { ?>
    <?php echo $_POST['name']; ?> successfully added.
    <?php set_user(); ?>

<?php } ?>

    <h1>Register your Account:</h1>
    <form method="post">
        <label for="name">First Name</label>
        <input type="text" name="name" id="name">
        <label for="email">Email Address</label>
        <input type="text" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" name="submit" value="Submit">
    </form>
    <a href="index.php">Back to home</a>
<?php include "templates/footer.php"; ?>
