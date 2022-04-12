<?php
require_once "../autoload.php";



if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $user1 = checkCred($email, $password);
    if(!$user1)
    {
        echo "Wrong Credentials";
    }
    else
    {
        $user2 = $user1['idUser'];

        $user = new User($user2);
        $_SESSION['id'] = $user->getId();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['password'] = $user->getPassword();
        $_SESSION['employee'] = $user->getEmployee();
        $user->Login();
    }




}


?>

<?php require "templates/loginHeader.php"; ?>

<form method="post">
    <label for="email">Email Address</label>
    <input type="text" name="email" id="email" required>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
    <input type="submit" name="submit" value="Login">
</form>
<form action="register.php" method="post" class="navbar-form navbar-right">
    <button name="register" value="register" class="button" type="submit">Register</button>
</form>

<?php require 'templates/footer.php';?>

