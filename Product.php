<?php
class Product
{
    private string $name;
    private float $price;

    public function __construct($name,$price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function showDetails(): void
    {
        echo "Game name is ".$this->getName()." is €".$this->price;
    }


}