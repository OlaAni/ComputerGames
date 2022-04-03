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
}