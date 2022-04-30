<?php

/**
 * extends products
 */
class Part extends Product
{
    public string $PartType;

    public function __construct($id)
    {
        parent::__construct($id);
        $this->setPartType();
    }


    public function getPartType(): string
    {
        return $this->PartType;
    }

    //gets part from database
    public function setPartType(): void
    {
        $part = $this->getProduct();
        $this->PartType = $part['part'];
    }



}