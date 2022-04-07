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

    /**
     * Implement edit product logic tp run from class
     */
    function editProduct():void
    {

    }

    function deleteAccount(int $i)
    {
        $pdo = get_connections();
        $id = $i;
        $sql = "DELETE FROM user WHERE idUser = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

    }
}