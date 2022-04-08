<?php
require_once "../autoload.php";


$customer1 = new Customer(101);
$customer1->showDetails();




$admin = new Admin(4);
$admin->showDetails();


$game4 = new Game(1);
$game2 = new Game(2);
$part1 = new Part(3);

$game4->showDetails();
$game2->showDetails();
$part1->showDetails();

$cart = new Cart();
$arr = array($game4,$game2,$part1);
$cart->setProducts($arr);
$cart->calcFullPrice();
print "Full price is ".$cart->getFullPrice()."</br>";
$trade1 = new Trade();
$cart->setCustomer($customer1);
$trade1->calDiscount($game2->getRarity());
$cart->setNewPrice($cart->getFullPrice());
echo "</br></br> The discount is ".$trade1->getDiscount(). "</br>Your new price is ".$cart->getFullPrice()."</br>" ;

$sale = new Sale();
$sale->setCustomer($customer1);
$sale->setCart($cart);
$sale->showCartDetails();




