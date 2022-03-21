<?php
require_once "autoload.php";



$customer = new Customer("Ola","ola@gmail.com","password",18);
$customer->setFavGenre("Action");
$customer->showDetails();


$pdo = get_connections();
//$sql = sprintf("INSERT INTO user (name,email,password) values (%s,%s,%s)", $customer->getName(),$customer->getEmail(),$customer->getPassword());
//$pdo->query($sql);




$admin = new Admin("AdminOla","ola@gmail.com","password");
$admin->showDetails();


//classes finished and erd done
//read products from product class
//