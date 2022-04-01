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


