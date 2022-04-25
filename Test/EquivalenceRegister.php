<?php
require_once "../autoload.php";
?>
<form method="post">
    <div class="container">
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label for="name">First Name</label>
        <input type="text" placeholder="Enter First Name" name="name" id="name" >
        <label for="email">Email Address</label>
        <input type="text" placeholder="Enter Email" name="email" id="email" >
        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" name="password" id="password" >
        <label for="location">Location</label>
        <input type="text" placeholder="Enter Location" name="location" id="location">
        <input type="submit" name="submit"  class="button" value="Submit" >
        <hr>
    </div>
</form>

<?php if (isset($_POST['submit'])) {
    $validEmail = validateEmail($_POST["email"]);
    if($validEmail)
    {
        $check = checkIfUserExists($_POST['email']);
        if ($check)
        {
            echo 'EMAIL IS IN USE';
        }
        else
        {
            if(strlen($_POST["password"])<3)
            {
                var_dump(strlen($_POST["password"]));
                echo 'PASSWORD TOO SHORT';
            }
            else
            {
                echo 'Registered';
            }
        }
    }
    else
    {
        echo 'EMAIL SYNTAX WRONG';
    }
} ?>

