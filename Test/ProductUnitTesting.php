<?php
require_once "../User.php";
require_once "../Cart.php";

require_once "../Product.php";

require_once "../Part.php";
require_once "../Game.php";
require_once "../Customer.php";
require_once "../Sale.php";
require_once "../Trade.php";

$game1 = new Game("DogWatch",50,"Action");
$game2 = new Game("ATG5",100,"Action");
$game3 = new Game("Creed",100,"Action");

echo $game1->showDetails();
echo $game2->showDetails();
echo $game3->showDetails();


$customer1 = new Customer("Ola","ola@gmail.com","password",18);
$cart = new Cart();
$arr = array($game1,$game2,$game3);
$cart->setProducts($arr);
$cart->calcFullPrice();

$trade1 = new Trade();
$cart->setTrade($trade1);
$trade1->calDiscount("Very");
echo "</br></br>".$trade1->getDiscount();

$cart->setNewPrice($cart->getFullPrice());

print "</br>".$cart->getFullPrice()."</br>";

$sale = new Sale();
$sale->setCustomer($customer1);
$sale->setCart($cart);
$sale->showCartDetails();
