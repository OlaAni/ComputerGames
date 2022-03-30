<?php

//require_once "../src/functions.php";
require_once "../Test/autoload.php";



if (isset($_POST['submit'])) {

    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];


    $user1 = checkCred($email, $password);
    $user2 = $user1['idUser'];




    $user = new User($user2);
    $_SESSION['id'] = $user->getId();
    $_SESSION['email'] = $user->getEmail();
    $_SESSION['password'] = $user->getPassword();
    $_SESSION['employee'] = $user->getEmployee();
    $user->Login();



}


?>

<?php require "templates/loginHeader.php"; ?>

<form method="post">
    <label for="email">Email Address</label>
    <input type="text" name="email" id="email">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <input type="submit" name="submit" value="Login">
</form>
<?php echo $user->getName();
?>

<?php require 'templates/footer.php';?>

