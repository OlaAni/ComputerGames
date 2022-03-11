<?php
class  Admin extends User
{
    private String $jobTitle;
    private int $id;
    private Product $product;

    public function __construct($name, $email, $password)
    {
        parent::__construct($name, $email, $password);
        $this->setEmployee(true);
    }

    function editProduct():void
    {

    }
}