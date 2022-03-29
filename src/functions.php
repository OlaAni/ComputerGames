<?php

function get_connections()
{
    $config = require  'config.php';

    $pdo = new PDO(
        $config['database_dsn'],
        $config['database_user'],
        $config['database_pass']
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

function get_products($limit = null)
{
    $pdo = get_connections();

    $query = 'SELECT * FROM product';
    if($limit)
    {
        $query = $query.' LIMIT :resultLimit';
    }
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('resultLimit',$limit, PDO::PARAM_INT);
    $stmt->execute();
    $proudcts = $stmt->fetchAll();

    return $proudcts;
}

function get_product($id)
{
    $pdo = get_connections();
    $query = 'SELECT * FROM product WHERE idProduct = :idVal';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('idVal',$id);
    $stmt->execute();

    return $stmt->fetch();
}

function set_user()
{
    $pdo = get_connections();
    if (isset($_POST['submit'])) {
        try {
            $new_user = array(
                "name" => $_POST['name'],
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "favgenre" => 'Blank',
                "tradeamo" => 0,
            );
            $sql = "INSERT INTO customer (" . implode(', ', array_keys($new_user)) .")
            values (:". implode(', :', array_keys($new_user)).")";

            $statement = $pdo->prepare($sql);
            $statement->execute($new_user);
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
}

function setTestUser()
{
    $pdo = get_connections();

}

function checkCred($email,$password)
{
    $pdo = get_connections();
    $query = 'SELECT * FROM customer WHERE email = :emailVal AND password = :passwordVal';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('emailVal', $email);

    $stmt->bindParam('passwordVal', $password);

    $stmt->execute();

    return $stmt->fetch();
}


function get_user($id)
{
    $pdo = get_connections();
    $query = 'SELECT * FROM user WHERE userID = :idVal';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('idVal',$id);
    $stmt->execute();

    return $stmt->fetch();
}


function getShoppingCart()
{
    $cartItems = [];
    if (isset($_SESSION['cart'])){
        $cartItems = $_SESSION['cart'];
    }
    return $cartItems;

}

function addItemToCart($id)
{
    $cartItems = getShoppingCart();
    $cartItems[$id] = $id;
    $_SESSION['cart'] = $cartItems;
}
