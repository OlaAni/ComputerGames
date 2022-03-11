<?php

class Part extends Product
{
    public string $PartType;

    public function __construct($name, $price)
    {
        parent::__construct($name, $price);
    }

    public function getPartType(): string
    {
        return $this->PartType;
    }

    public function setPartType(string $PartType): void
    {
        $this->PartType = $PartType;
    }



}