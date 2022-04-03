<?php
require_once "../autoload.php";



?>
<?php include "templates/registerHeader.php"; ?>


<?php if (isset($_POST['submit'])) {?>
        <?php $user = new Customer(0);
        $user->Register();
} ?>

    <form method="post">
        <label for="name">First Name</label>
        <input type="text" name="name" id="name" required>
        <label for="email">Email Address</label>
        <input type="text" name="email" id="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <label for="location">Location</label>
        <input type="text" name="location" id="location">
        <input type="submit" name="submit" value="Submit" required>
    </form>

<form action="loginpage.php" method="post" class="navbar-form navbar-right">
    <button name="login" value="login" class="button" type="submit">Login</button>
</form>


<?php if (isset($_POST['submit'])) {
    $check = checkIfUserExists($_POST['email']);
    if ($check) {
        echo '<script>alert("EMAIL IS IN USE")</script>';

    }

} ?>
<?php include "templates/footer.php"; ?>
