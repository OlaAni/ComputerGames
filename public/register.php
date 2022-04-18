<?php
require_once "../autoload.php";
?>
<?php include "templates/registerHeader.php"; ?>

    <form method="post">
        <div class="container">
            <p>Please fill in this form to create an account.</p>
            <hr>
            <label for="name">First Name</label>
            <input type="text" placeholder="Enter First Name" name="name" id="name" required>
            <label for="email">Email Address</label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>
            <label for="password">Password</label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>
            <label for="location">Location</label>
            <input type="text" placeholder="Enter Location" name="location" id="location">
            <input type="submit" name="submit"  class="button" value="Submit" required>
            <hr>
        </div>
    </form>

    <form action="loginpage.php" method="post" class="navbar-form navbar-right">
        <button name="login" value="login" class="button" type="submit">Login</button>
    </form>


<?php include "templates/footer.php"; ?>


<?php if (isset($_POST['submit'])) {
    $validEmail = validateEmail($_POST["email"]);
    if($validEmail)
    {
        $check = checkIfUserExists($_POST['email']);
        if ($check) {
            echo '<script>alert("EMAIL IS IN USE")</script>';
        }
        else
        {
            $user = new Customer(0);
            $user->Register();
        }
    }
    else
    {
        echo '<script>alert("EMAIL SYNTAX WRONG")</script>';

    }


} ?>

