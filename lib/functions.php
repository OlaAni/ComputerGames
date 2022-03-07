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

function set_user()
{
    $pdo = get_connections();
    if (isset($_POST['submit'])) {
        try {
            $new_user = array(
                "firstname" => $_POST['firstname'],
                "email" => $_POST['email'],
                "age" => $_POST['age'],
            );
            $sql = "INSERT INTO users (" . implode(', ', array_keys($new_user)) .")
            values (:". implode(', :', array_keys($new_user)).")";

            $statement = $pdo->prepare($sql);
            $statement->execute($new_user);
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
}