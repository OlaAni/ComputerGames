<?php
class Product
{
    private string $name;
    private float $price;
    private RarityType $rarity;
    private int $id;

    public function __construct($name,$price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @param RarityType $rarity
     */
    public function setRarity(RarityType $rarity): void
    {
        $this->rarity = $rarity;
    }

    /**
     * @return RarityType
     */
    public function getRarity(): RarityType
    {
        return $this->rarity;
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
        echo "Product name is ".$this->getName()." is €".$this->price."</br>";
    }


}