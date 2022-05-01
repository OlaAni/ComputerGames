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
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">ComputerGames</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <div class="dropdown">
                    <button class="dropbtn">Tabs</button>
                    <div class="dropdown-content">
                        <a href="gameTab.php">Games</a>
                        <a href="partTab.php">Parts</a>
                    </div>
                </div>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="tradein.php">Trade</a></li>
                <li><a href="Profile.php">Profile</a></li>



            </ul>

            <form action="search.php" method="post"  class="navbar-form navbar-right">
                <input type="text" id="search" name="search">
                <input type="submit" name="submit" class="buttonLog" value="View Results">
            </form>
        </div>



    </div>
</div>