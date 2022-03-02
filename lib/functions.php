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

    $query = 'SELECT * FROM game';
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
    $query = 'SELECT * FROM game WHERE id = :idVal';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('idVal',$id);
    $stmt->execute();

    return $stmt->fetch();
}