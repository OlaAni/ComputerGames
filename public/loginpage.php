<?php require "templates/loginHeader.php"; ?>

<?php
require_once "../autoload.php";



if (isset($_POST['submit'])) {

    $email = clean($_POST['email']);
    $password = clean($_POST['password']);


    $user1 = checkCred($email, $password);
    if(!$user1)
    {
        header("Location: loginFailPage.php");
    }
    else
    {
        $user2 = $user1['idUser'];

        $user = new User($user2);
        $_SESSION['id'] = $user->getId();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['password'] = $user->getPassword();
        $user->Login();
    }




}


?>


<form method="post">
    <div class="container">
    <p>Please login to your account.</p>
    <hr>
    <label for="email">Email Address</label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>
    <label for="password">Password</label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>
    <input type="submit" name="submit" class="button" value="Login">
    <hr>
    </div>
</form>
<form action="register.php" method="post" class="navbar-form navbar-right">
    <button name="register" value="register" class="button" type="submit">Register</button>
</form>

<?php require 'templates/footer.php';?>

