<?php
require "Product.php";
class Cart
{
    private float $fullPrice;
    private $products = array();
    private  $arr = array();

    public function getFullPrice(): string
    {
        return $this->fullPrice;
    }

    public function setFullPrice(string $fullPrice): void
    {
        $this->fullPrice = $fullPrice;
    }

    public function calcFullPrice():float
    {
        foreach ($this->products as $product)
        {
            $this->fullPrice = $product->getPrice() + $this->fullPrice;
        }

        return $this->fullPrice;
    }

    public function getCarName():void
    {
        foreach ($this->products as $product)
        {
            array_push($arr,$product->getName());
        }
    }


}