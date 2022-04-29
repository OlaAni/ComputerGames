<?php
/**
 * Admin class, creates admin object
*/
class  Admin extends User
{

    public function __construct($id)
    {
        parent::__construct($id);
    }


    //delete Account from database
    function deleteAccount(int $id)
    {
        $pdo = get_connections();
        $sql = "DELETE FROM user WHERE idUser = ".clean($id);
        $statement = $pdo->prepare($sql);
        $statement->execute();

    }

    function editProduct()
    {
        if (isset($_POST['submit'])) {
            try {
                require_once '../src/functions.php';
                $product =[
                    "idProduct" => clean($_POST['idProduct']),
                    "name" => clean($_POST['name']),
                    "price" => clean($_POST['price']),
                    "genre" => clean($_POST['genre']),
                    "part" => clean($_POST['part']),
                    "image" => clean($_POST['image']),
                    "description" => clean($_POST['description']),
                    "rarity" => clean($_POST['rarity']),
                    "type" => clean($_POST['type'])
                ];
                $sql = "UPDATE product SET idProduct = :idProduct, name = :name, price = :price, 
                   genre = :genre, part = :part, image = :image,
                   description = :description, rarity = :rarity, type = :type WHERE idProduct = :idProduct";
                $pdo = get_connections();
                $statement = $pdo->prepare($sql);
                $statement->execute($product);
            } catch(PDOException $error) {
                echo $sql . "<br>" . $error->getMessage();
            }
        }
    }
}