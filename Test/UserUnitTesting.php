<?php
require_once "../autoload.php";



$customer = new Customer(2);
$customer->setFavGenre("Action");
$customer->showDetails();




$admin = new Admin(4);
$admin->showDetails();

