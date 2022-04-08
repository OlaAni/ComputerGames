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

    function deleteAccount(int $id)
    {
        $pdo = get_connections();
        $sql = "DELETE FROM user WHERE idUser = ".$id;
        $statement = $pdo->prepare($sql);
        $statement->execute();

    }
}