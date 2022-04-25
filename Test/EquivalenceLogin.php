
<?php
session_start();
require_once "../autoload.php";
?>


<form method="post">
    <div class="container">
        <p>Please login to your account.</p>
        <hr>
        <label for="email">Email Address</label>
        <input type="text" placeholder="Enter Email" name="email" id="email" >
        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" name="password" id="password" >
        <input type="submit" name="submit" class="button" value="Login">
        <hr>
    </div>
</form>

<?php
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user1 = checkCred($email, $password);
    if(!$user1 ||  strlen($email) <5)
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
        echo "Correct Credentials";
        //$user->Login();
    }
}
?>
