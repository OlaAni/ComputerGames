<?php
require_once "autoload.php";

//$game1 = new Game(0,"DogWatch",50,"Action");

$game4 = new Game(1,"",50," ");
$game2 = new Game(2,"",100,"Action");
$part1 = new Part(3," ",0,"");


//$game1->showDetails();
//$game2->showDetails();
//$part1->showDetails();

$game4->showDetails();
$game2->showDetails();
$part1->showDetails();

$customer1 = new Customer("Ola","ola@gmail.com","password",18);
$cart = new Cart();
$arr = array($game4,$game2,$part1);
$cart->setProducts($arr);
$cart->calcFullPrice();
print "Full price is ".$cart->getFullPrice()."</br>";
$trade1 = new Trade();
$cart->setTrade($trade1);
$trade1->calDiscount('VERY');
$cart->setNewPrice($cart->getFullPrice());
echo "</br></br> The discount is ".$trade1->getDiscount(). "</br>Your new price is ".$cart->getFullPrice()."</br>" ;

$sale = new Sale();
$sale->setCustomer($customer1);
$sale->setCart($cart);
$sale->showCartDetails();
/*
$customer1 = new Customer("Ola","ola@gmail.com","password",18);
$cart = new Cart();
$arr = array($game1,$game2,$part1);
$cart->setProducts($arr);
$cart->calcFullPrice();
print "Full price is ".$cart->getFullPrice()."</br>";

$trade1 = new Trade();
$cart->setTrade($trade1);
//$trade1->calDiscount(RarityType::COMMON);
$cart->setNewPrice($cart->getFullPrice());

echo "</br></br> The discount is ".$trade1->getDiscount(). "</br>Your new price is ".$cart->getFullPrice()."</br>" ;



$sale = new Sale();
$sale->setCustomer($customer1);
$sale->setCart($cart);
$sale->showCartDetails();*/



