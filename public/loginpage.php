<?php

require_once "../lib/functions.php";

include "templates/loginHeader.php";


if (isset($_POST['submit'])) {
    session_start();


    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $user1 = checkCred($email, $password);
    //var_dump($user1);
    //var_dump($_SESSION);


    if ($user1) {
        header("Location: index.php");
    }



}


?>

<form method="post">
    <label for="email">Email Address</label>
    <input type="text" name="email" id="email">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <input type="submit" name="submit" value="Login">
</form>
<a href="index.php">Back to home</a>

<?php require 'templates/footer.php';?>

