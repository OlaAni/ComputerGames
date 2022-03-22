<?php

class Part extends Product
{
    public string $PartType;

    public function __construct($id, $name, $price,$part,$rarity)
    {
        parent::__construct($id, $name, $price,$rarity);
        $this->setPartType($part);
    }

    public function getPartType(): string
    {
        return $this->PartType;
    }

    public function setPartType(string $PartType): void
    {
        $part = $this->getProduct();
        $this->PartType = $part['part'];
    }



}