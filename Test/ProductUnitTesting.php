<?php
require_once "../Product.php";
require_once "../Part.php";
require_once "../Game.php";
require_once "../Cart.php";
require_once "../Customer.php";

$game1 = new Game("DogWatch",50,"Action");
$game2 = new Game("ATG5",100,"Action");
$game3 = new Game("Creed",100,"Action");

echo $game1->showDetails();
echo $game2->showDetails();
echo $game3->showDetails();


$customer = new Customer("Ola","ola@gmail.com","password",18);
$cart = new Cart();
$arr = array($game1,$game2,$game3);
$cart->setProducts($arr);
$cart->getFullPrice();