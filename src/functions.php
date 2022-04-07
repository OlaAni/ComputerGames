<?php

function get_connections()
{
    $config = require 'config.php';

    $pdo = new PDO(
        $config['database_dsn'],
        $config['database_user'],
        $config['database_pass']
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $pdo;
}




function get_count()
{
    $pdo = get_connections();

    $query = 'SELECT count(idProduct) as total FROM product';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $count = $stmt->fetch();

    return $count['total'];
}

function checkCred($email,$password)
{
    $pdo = get_connections();
    $query = 'SELECT * FROM user WHERE email = :emailVal AND password = :passwordVal';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('emailVal', $email);

    $stmt->bindParam('passwordVal', $password);

    $stmt->execute();

    return $stmt->fetch();
}

function checkIfUserExists($email)
{
    $pdo = get_connections();
    $query = 'SELECT * FROM user WHERE email = :emailVal';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('emailVal', $email);
    $stmt->execute();
    return $stmt->fetch();
}

function getShoppingCart()
{
    // default is empty shopping cart array
    $cartItems = [];
    if (isset($_SESSION['cart'])) {
        $cartItems = $_SESSION['cart'];
    }
    return $cartItems;
}

function addItemToCart($id)
{
    $cartItems = getShoppingCart();
    $cartItems[$id] = 1;
    $_SESSION['cart'] = $cartItems;
}


function removeItemFromCart($id)
{
    $cartItems = getShoppingCart();
    unset($cartItems[$id]);
    $_SESSION['cart'] = $cartItems;
}

function getQuantity($id, $cart)
{
    if (isset($cart[$id])) {
        return $cart[$id];
    } else {
        return 0;
    }
}

function increaseCartQuantity($id)
{
    $cartItems = getShoppingCart();
    $quantity = getQuantity($id, $cartItems);
    $newQuantity = $quantity + 1;
    $cartItems[$id] = $newQuantity;
    $_SESSION['cart'] = $cartItems;

}


function reduceCartQuantity($id)
{
    $cartItems = getShoppingCart();
    $quantity = getQuantity($id, $cartItems);
    $newQuantity = $quantity - 1;
    if ($newQuantity < 1) {
        unset($cartItems[$id]);
    } else {
        $cartItems[$id] = $newQuantity;
    }
    $_SESSION['cart'] = $cartItems;
}


function displayCart()
{
    $cartItems = getShoppingCart();
    if(!empty($cartItems))
    {
        require_once __DIR__.'/../public/cartpage.php';
    }

}

//function get_products($limit = null)
//{
//    $pdo = get_connections();
//
//    $query = 'SELECT * FROM product';
//    if($limit)
//    {
//        $query = $query.' LIMIT :resultLimit';
//    }
//    $stmt = $pdo->prepare($query);
//    $stmt->bindParam('resultLimit',$limit, PDO::PARAM_INT);
//    $stmt->execute();
//    $proudcts = $stmt->fetchAll();
//
//    return $proudcts;
//}


