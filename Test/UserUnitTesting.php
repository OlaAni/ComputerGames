<?php
require_once "../autoload.php";



$customer = new Customer(5);
$customer->showDetails();




$admin = new Admin(4);
$admin->showDetails();

