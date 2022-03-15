<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">

    <title>ComputerGames</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
            </ul>
                <form class="navbar-form navbar-center" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Email" name="email" class="form-control" id="email"  required>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password"  name="password" class="form-control" id="password" required>
                </div>
                    <input type="submit" name="submit" value="Submit">

            </form>
        </div>
        <!--/.navbar-collapse -->
    </div>
</div>

<?php
require_once "../lib/functions.php";
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    //echo $email, $password;
    $user1 = checkCred($email,$password);
    var_dump($user1);

    if($user1)
    {
        header("Location: index.php");
    }
}
?>